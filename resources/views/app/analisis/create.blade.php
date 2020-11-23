@extends('blades.app')

@section('title', 'Crear análisis')

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

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()" id="form2" action="{{url('app/analisis')}}">
    {{ csrf_field() }}    
    <input type="hidden" name="paciente_id" id="paciente_id" value="{{ old('paciente_id') }}">    
    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Paciente</label>
      <input type="text" name="search" class="form-control" id="search_pacient" value="{{ old('search') }}"  placeholder="Nombre" required  autofocus>
    </div>     
    <div class="form-group col s6">
      <label for="">Tipo de análisis</label>
      <input type="text" name="tipo" class="form-control"  value="{{ old('tipo') }}"  placeholder="Tipo de analisis" required >
    </div>
    <div class="form-group col s6">
      <label for="">Fecha</label>
      <input type="date" name="fecha" class="form-control"  value="{{ old('fecha') }}"   required >
    </div>
    <div class="form-group col s12">
      <label for="">Descripción</label>
      <input type="text" name="descripcion" class="form-control"  value="{{ old('descripcion') }}"   required >
    </div>
    <div class="form-group col s12">
      <label for="">Observación</label>
      <textarea name="observacion" class="form-control">{{ old('observacion') }}</textarea>
    </div>
    
    <div class="col s12"><br>
      <button type="submit" class="btn blue">Crear Análisis</button>
    </div>
  </form>


@endsection

@section('scripts')
<script src="{{ url('js/admin/autocomplete_pacient.js') }}"></script>
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