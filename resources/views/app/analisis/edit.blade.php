@extends('blades.app')

@section('title', 'Editar análisis')

@section('css')
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

  <div id="analisis-loader">
    <h3>Galería de Propiedad</h3>
    {{-- <p>{{images}}</p> --}}
    <p v-if="images.length == 0">Es necesario cargar una fotografía del lugar para que los visitantes puedan ver la propiedad</p>
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