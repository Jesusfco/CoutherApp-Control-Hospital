@extends('blades.app')

@section('title', 'Editar análisis')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/myDropzone/dropzone.css') }}">
<style>
  textarea {
    resize: none;
    overflow: hidden;
    min-height: 80px;
    
}
</style>
@endsection

@section('content')
<h5><a href="{{ url('app/analisis') }}">Análisis </a> / Crear Analisis</h5>

  <form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()" action="{{url('app/analisis')}}">
    {{ csrf_field() }}    
    
    <input type="hidden" name="register_id" id="register_id" value="{{ $analisis->id  }}">    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Paciente</label>
      <input type="text" name="search" class="form-control" id="search_pacient" value="{{ $analisis->paciente->nombre_completo  }}"  placeholder="Nombre" required  autofocus>
      <input type="hidden" name="paciente_id" id="paciente_id" value="{{ $analisis->paciente_id  }}">    
    </div>     
    <div class="form-group col s6">
      <label for="">Tipo de análisis</label>
      <input type="text" name="tipo" class="form-control"  value="{{ $analisis->tipo  }}"  placeholder="Tipo de analisis" required >
    </div>
    <div class="form-group col s6">
      <label for="">Fecha</label>
      <input type="date" name="fecha" class="form-control"  value="{{ $analisis->fecha  }}"   required >
    </div>
    <div class="form-group col s12">
      <label for="">Descripción</label>
      <input type="text" name="descripcion" class="form-control"  value="{{ $analisis->descripcion  }}"   required >
    </div>
    <div class="form-group col s12">
      <label for="">Observación</label>
      <textarea name="observacion" class="form-control">{{ $analisis->observacion  }}</textarea>
    </div>
    
    <div class="col s12"><br>
      <button type="submit" class="btn blue">Actualizar Análisis</button>
    </div>
  </form>

  <div id="analisis-loader" class="drop">
    <h3>Galería de Análisis</h3>
    <div class="col l12">
      <div  id="drop" >
        <div class="dropInputContainer">
            <input id="files" type="file" multiple name="files" v-on:change="handleInputFile" >
            <i class="material-icons">add_photo_alternate</i>
        </div>            

        <div v-if="files.length > 0" >
          <button  v-on:click="startUploadImages" class="btn orange"> Cargar Imagenes</button>
          <div class="filePreviewContainer" v-if="files.length > 0" >

            <div v-for="file in files" class="fileDiv" v-bind:class="{ activeDrop: file.status == 1, 
            'errorUpload': file.status < 0 }">
                <img :src=file.bits :id=file.id>

                <div class="iconsDiv">
                  <i class="material-icons" v-on:click="deleteFile(file)">delete</i>
                  <i class="material-icons" v-on:click="setPrincipalFile(file)" v-bind:class="{ heartActive: file.principal}">favorite</i>
                </div>
                
                <div v-if="file.status == 1" class="progress">
                  <div class="percent" id="percent"></div>
                </div>
                <div v-if="file.status == -1" class="alertDrop">
                    <p>Error en la carga</p>
                </div>                  
            </div>

          </div>    
        </div>    

      </div>
    </div>
    
    <p v-if="images.length == 0">Aun no se ha cargado ninguna imagen</p>
    <div class="row imagesGrid" v-if="images.length > 0">

      <div v-if="image_principal " class="fileDiv col l8">
        <img :src=image_principal.file>
          <div class="iconsDiv">
            <i class="material-icons" v-on:click="deleteImg(image_principal)">delete</i>            
            <i class="material-icons heartActive">favorite</i>
          </div>
      </div>
      
      <div v-for="img in images" v-if="!isSameImgThanPrincipal(img)" class="fileDiv col l4">
        <img :src=img.file>
        <div class="iconsDiv">
          <i class="material-icons" v-on:click="deleteImg(img)">delete</i>
          <i class="material-icons" v-on:click="setPrincipalImg(img)">favorite</i>
        </div>
      </div>      
      
    </div>
  </div>

@endsection

@section('scripts')
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
<script src="{{ url('js/admin/autocomplete_pacient.js') }}"></script>
<script src="{{ url('js/admin/analisis_loader_images.js') }}"></script>
<script>

  function auto_grow(element) {
      element.style.height = "5px";
      element.style.height = (element.scrollHeight)+"px";
  }

  function submitForm() {
    var id = document.getElementById('paciente_id').value  
    if(id > 0) {
      return true
    }
    alert('Seleccione un paciente de las sugerencias para poder continuar')
    return false
  }
 

</script>
@endsection