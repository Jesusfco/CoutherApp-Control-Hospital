//BASE URL
var homePath = window.location.origin;

setInterval(() => {
    document.getElementsByTagName("body")[0].style.overflow = '';
},1000);
var app = new Vue({
    el: '#app',
    data: {
        formats: ['image/png', 'image/jpeg', 'image/jpg'],
        uploading: false,
        mark: false,
        files: [],
        photos: [],
    },

    created: function() {

        let url = homePath;      
        let id = $('#register_id').val();  
        url = url + '/app/articles/getPhotos/' + id ;
        

        axios.get(url)

        .then((response) => {

            for (let pho of response.data) {
                pho.name = pho.name.split(' ').join('%20');
                
                pho.path = homePath + '/img/articles/' + id + '/' + pho.name;
                
                this.photos.push(pho);

            }


            this.setBackground();

        }).catch(function(error) {

            console.log(error);

        });

    },

    methods: {

        check: function() {
            console.log(this.mark);
        },
        getFile: function() {

            var input = document.getElementById('files');
            var momentFiles = input.files;

            for (let i = 0; i < momentFiles.length; i++) {

                if (this.validateImageFile(momentFiles[i].type)) continue;

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

            let jso = {
                formData: file,
                bits: null,
                status: 0,
                id: 0,
            };


            let reader = new FileReader();
            reader.onload = function(e) {
                jso.bits = e.target.result;
                app.pushFile(jso);
            };

            reader.readAsDataURL(file);


        },

        pushFile: function(x) {

            this.files.push(x);
            this.chekId();
            // setTimeout(this.setImagesPreview(), 50);
            this.nextFileToSend();
        },

        seeFiles: function() {
            console.log(this.files);
        },

        chekId: function() {

            for (let i = 0; i < this.files.length; i++) {
                this.files[i].id = 'imagePreview' + i;
            }

        },

        nextFileToSend: function() {
            for (let i = 0; i < this.files.length; i++) {

                if (this.files[i].status == 0) {
                    this.sendFile(i);
                    break;
                }

            }
        },



        sendFile: function(i) {

            if (this.uploading == true) return;

            if(this.photos.length >= 10) {//limite de fotos
                alert('El limite de fotos por articulo es de 10. Ya se alcanzo este limite.');
                return;
            }
            this.uploading = true;

            this.files[i].status = 1;
            var formD = new FormData();
            formD.append('image', this.files[i].formData);
            formD.append('mark', this.mark);


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

            axios.post('uploadPhotos', formD, config)

            .then(function(response) {

                app.uploading = false;
                app.successUpload(response, i);

            }).catch(function(error) {

                app.uploading = false;
                app.errorHandler(error, i);

            });
        },        

        successUpload: function(response, i) {

            response = response.data;

            app.files.splice(i, 1);
            response.name = response.name.split(' ').join('%20');
            app.photos.unshift(response);

            app.setBackground();
            setTimeout(app.nextFileToSend(), 200);
        },

        errorHandler: function(response, i) {

            if (this.files[i] == undefined) return;
            if (response.status == 403) {
                this.files[i].status = -2;
            } else {
                this.files[i].status = -1;
            }

            console.log(response);
            setTimeout(this.nextFileToSend(), 500);

        },

        retryFiled: function() {

            for (let i = 0; i < this.files.length; i++) {
                if (this.files[i].status == -1) {
                    this.files[i].status = 0;
                }
            }

            this.nextFileToSend();
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

        deletePhoto: function(photo) {

            event.preventDefault();
            event.stopPropagation();

            axios.post('deletePhoto', photo)

            .then((response) => {

                for (var i = 0; i < app.photos.length; i++) {

                    if (app.photos[i].id == photo.id) {

                        app.photos.splice(i, 1);
                        break;

                    }

                }

                this.setBackground();


            }).catch(function(error) {

                console.log(error);

            });

        }

    }

});