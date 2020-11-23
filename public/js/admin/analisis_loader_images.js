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
      let id
      try {
        id = document.getElementById('idInput').value  
        console.log("ID", id)
      } catch (error) {
        //ESTAMOS EN COMPONENTE CREATE
        return
      }
              
      
       
        
      axios.get(baseUrl + '/app/analisis/' + this.id)
  
        .then( (response) => {
          
          for(let element in this.property) {
            this.property[element] = response.data[element]
          }
  
          this.property.property_type = response.data.type.name          
          this.property.property_type_id = response.data.type.id          
          
          CKEDITOR.instances['editor1'].insertHtml(this.property.description);
  
          response.data.images.forEach(element => {
            element.file = baseUrl  + "/img/propiedades/" + this.property.id + "/" + element.file
              if(element.principal == 1)
                  element.principal = true
              else
                  element.principal = false
          });        
  
          this.images = response.data.images
          this.image_principal = response.data.image_principal
          this.image_principal.file = baseUrl  + "/img/propiedades/" + this.property.id + "/" + this.image_principal.file
                     
        }).catch((error) => {
          this.uploading = false            
        });
  
    },
    methods: {
  
      easyViewNumber (number) {
        if(number == null) return ""      
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      },
      submit: function(e) {    
  
        e.preventDefault()    
        
        this.property.description = CKEDITOR.instances.editor1.getData()                   
  
        if (this.uploading == true) return;            
  
        this.uploading = true;        
  
        this.property.property_type = (this.property.property_type + "").toUpperCase()
        let cloneProperty =  JSON.parse( JSON.stringify(this.property)   )
        cloneProperty.imgFile = null;                            
        
        var formData = new FormData();          
        formData.append("dataProperty", JSON.stringify(cloneProperty))
        
        const config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            progress: (progressEvent) => {
                var percent = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                let element = document.getElementById('progressBar1');
                element.style.width = percent + "%";                
            }
        }
  
        axios.post(baseUrl + '/app/propiedades/store-update', formData, config)
        .then( (response) => {
          
            this.uploading = false
            
            if(this.property.id == null){
              window.location.replace("administrar/" + response.data.id);                                    
              localStorage.setItem('created_property', '1')
            }
            else 
              M.toast({html: 'La propiedad ha sido actualizada', classes: 'green', displayLength: 4500})        
  
        }).catch((error) => {
  
            this.uploading = false
            M.toast({html: 'Los datos no pudieron ser actualizados, verifique su conexión a internet, si el problema persiste contacte al administrador', classes: 'red', displayLength: 10000})        
  
        });
      },
  
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
  
          if (this.uploading == true || this.files.length == 0) return;
  
          this.uploading = true;        
  
          this.property.property_type = (this.property.property_type + "").toUpperCase()
          let cloneProperty =  JSON.parse( JSON.stringify(this.property)   )
          cloneProperty.imgFile = null;                            
          
          var formData = new FormData();  
          formData.append("imgFile", this.files[i].file)          
          formData.append("principal", this.files[i].principal)          
          
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
  
        axios.post(baseUrl + '/app/propiedades/store-images/' + this.property.id, formData, config)
  
          .then( (response) => {            
  
              console.log(response)
              this.uploading = false          
              this.deleteFile(this.files[i])
  
              response.data.file =  baseUrl  + "/img/propiedades/" + this.property.id + "/" + response.data.file
  
              if(response.data.principal) {
                  this.images.forEach((element) => {
                      element.principal = false
                  })
  
                  this.image_principal = response.data
              }
  
              this.images.push(response.data)  
              setTimeout(() => this.nextFileToSend(),200)        
              
  
        }).catch((error) => {
            console.log(error)
            this.files[i].status = -1
            this.uploading = false
            setTimeout(() => this.nextFileToSend(),200)        
            // app.errorHandler(error, i);
  
        });
  
      },
  
      getFile: function() {
  
        var input = document.getElementById('files');
        var momentFiles = input.files;
        
        for (let i = 0; i < momentFiles.length; i++) {
  
          if (this.validateImageFile(momentFiles[i].type)) continue;
  
          this.getElementsFromFile(momentFiles[i], i);            
  
        }                
        setTimeout(() => this.checkIfThereIsAPrincipalImg(), 200)        
        
        input.value = null;
  
      },
  
      checkIfThereIsAPrincipalImg: function () {
        var thereIsPrincipal = false;
        
        if(this.files.length > 0) {          
  
          for(let img of this.images){
              
            if(img.principal == true){
              thereIsPrincipal = true
              console.log("Hay principal")
              break
            }
          }
  
          this.files.forEach((element) => {
            if(element.principal)
              thereIsPrincipal  = true
          })
  
          if(!thereIsPrincipal) 
            this.files[0].principal = true
          
        }
  
  
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
            principal: false
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