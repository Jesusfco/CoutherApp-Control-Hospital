var appForm = new Vue({
    el: '#analisis-loader',
    data: { 
        id: "",
        images: [],
        image_principal: null,  
        formats: ['image/png', 'image/jpeg', 'image/jpg'],
        uploading: false,
        files: [],
        fileCharging: 0,            
    }, created: function() {
      this.id = document.getElementById('register_id').value    
      axios.get(window.location.origin + '/app/analisis/' + this.id)  
        .then( (response) => {
          console.log(response)
          for(let element in this.property) {
            this.property[element] = response.data[element]
          } 
          response.data.images.forEach(element => {
            element.file = element.full_path             
          });        
  
          this.images = response.data.images          
                     
        }).catch((error) => {
          
        });
  
    },
    methods: {
   
      startUploadImages: function() {
        this.files.forEach((element) => {
            element.status = 0
        })
  
        this.nextFileToSend()
      },
  
      nextFileToSend: function() {
        for (let i = 0; i < this.files.length; i++) {
          if (this.files[i].status == 0) {
              this.sendImageFile(i);
              break;
          }
        }
      },
      sendImageFile: function(i) {                          
        if (this.uploading == true || this.files.length == 0) {
          return;
        }
  
        this.uploading = true;        
                              
        var formData = new FormData();  
        formData.append("img_file", this.files[i].file)                  
        formData.append("analisis_id", this.id)                  
        
        //charging
        this.files[i].status = 1
        const config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            progress: (progressEvent) => {
                var percent = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                let element = document.getElementById('percent');
                element.style.width = percent + "%";
            }
        }
  
        axios.post(window.location.origin  + '/app/analisis-photos', formData, config)  
          .then( (response) => {            
                
              this.uploading = false          
              this.deleteFile(this.files[i])  
              response.data.file = response.data.full_path                  
              this.images.push(response.data)  
              setTimeout(() => this.nextFileToSend(),200)        
                
        }).catch((error) => {
            console.log(error)
            this.files[i].status = -1
            this.uploading = false
            setTimeout(() => this.nextFileToSend(),200)                    
  
        });
  
      },
  
      handleInputFile: function() {  
        var input = document.getElementById('files');
        var momentFiles = input.files;        
        for (let i = 0; i < momentFiles.length; i++) {  
          if (this.validateImageFile(momentFiles[i].type)) {
            continue;
          }  
          this.getElementsFromFile(momentFiles[i], i);              
        }                                
        input.value = null;  
      }, 
  
      validateImageFile: function(type) {
        let validation = true;
  
        for (let i of this.formats) {
            if (i == type) {
                validation = false;
                break;
            }
        }
        return validation;
      },
  
      getElementsFromFile: function(file) {
  
        let fileData = {
            file: file,
            bits: null,
            status: 0,
            id: 0,            
        };
  
        let reader = new FileReader();
  
        reader.onload = (e) => {
            fileData.bits = e.target.result;            
            this.pushFile(fileData);
        };
  
        reader.readAsDataURL(file);
  
      },
  
      pushFile: function(file) {
  
        this.files.push(file);
        this.chekId();
        // setTimeout(this.setImagesPreview(), 50);
        // this.nextFileToSend();
      },
  
      chekId: function() {
  
        for (let i = 0; i < this.files.length; i++) {
            this.files[i].id = 'imagePreview' + i;
        }
  
      },
  
      setBackground: function() {
  
        setTimeout(() => {
  
            for (let pho of this.photos) {
  
                var doc = document.getElementById('pho-' + pho.id);                    
  
                doc.style.backgroundImage = 'url(' + homePath + '/img/articles/' + id + '/' + pho.name + ')';
                pho.path = homePath + '/img/articles/' + id + '/' + pho.name;
                
                var width = doc.offsetWidth;
                doc.parentElement.style.height = width + 'px';
  
            }
  
        }, 50);
  
  
      },
  
      deleteFile(file) {        
        this.files.splice(this.files.indexOf(file), 1)
      },
  
      setPrincipalFile(file) {        
        this.files.forEach(element => {
          element.principal = false
        });
  
        file.principal = true
      },
  
      setPrincipalImg(img) {
          axios.post(baseUrl + '/app/propiedades/principal-image', img)
          .then( (response) => {            
              img.principal = true
              this.image_principal = img
              this.images.forEach(element => {
                  if(img.id != element.id)
                      element.principal = false
                  else 
                      element.principal = true
              });
              
  
        }).catch((error) => {
            
  
        });
      },
  
      deleteImg(img)  {
          axios.get(baseUrl + '/app/propiedades/delete-image/' + img.id, )
          .then( (response) => {            
              
            const index = this.images.indexOf(img)
            this.images.splice(index, 1)
  
            if(img.principal) {
              if(this.images.length > 0){
                this.images[0].principal = true
                this.setPrincipalImg(this.images[0])
              }
            }
            
  
          }).catch((error) => {
            
  
          });
      },
  
      isSameImgThanPrincipal(img) {
        if(this.image_principal == null)
          return false;
        if(this.image_principal.id == img.id )
          return true
        return false
      },
  
  
  
  
    }
  })