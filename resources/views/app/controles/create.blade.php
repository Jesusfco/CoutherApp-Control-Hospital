@extends('blades.app')

@section('title', 'Crear Control')

@section('css')
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<h5><a href="{{ url('app/control') }}">Control </a> / Crear Control</h5>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()">
    {{ csrf_field() }}    

    <input type="hidden" name="paciente_id" id="paciente_id" value="{{ old('paciente_id') }}">
    <input type="hidden" name="medico_id" value="{{ Auth::id() }}">
    
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Paciente</label>
      <input type="text" name="search" class="form-control" id="search" value="{{ old('search') }}"  placeholder="Nombre" required autofocus>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Doctor</label>
      <input class="form-control" value="{{ Auth::user()->fullname() }}" disabled>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Teléfono</label>
      <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}"  placeholder="961-122-1222" required>
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Alergias</label>
      <input type="text" name="alergias" class="form-control" value="{{ old('alergias') }}" required>
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">TA</label>
      <input type="text" name="TA" class="form-control" value="{{ old('TA') }}" required>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Peso</label>
      <input type="number" name="peso" class="form-control" value="{{ old('peso') }}" required>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Talla</label>
      <input type="number" name="talla" class="form-control" value="{{ old('talla') }}" required>
    </div>

    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">IMC</label>
      <input type="number" name="IMC" class="form-control" value="{{ old('IMC') }}" required>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Temperatura</label>
      <input type="number" name="temperatura" class="form-control" value="{{ old('temperatura') }}" required>
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">SPO2</label>
      <input type="number" name="SPO2" class="form-control" value="{{ old('SPO2') }}" required>
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">FC</label>
      <input type="number" name="FC" class="form-control" value="{{ old('FC') }}" required>
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">FR</label>
      <input type="number" name="FR" class="form-control" value="{{ old('FR') }}" required>
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">DXTX</label>
      <input type="number" name="DXTX" class="form-control" value="{{ old('DXTX') }}" required>
    </div>
    
    <div class="form-group col l12">
      <label for="exampleInputEmail1">P</label>
      <textarea type="number" name="p" class="form-control" required>{{ old('p') }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">S</label>
      <textarea type="number" name="s" class="form-control" required>{{ old('s') }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">O</label>
      <textarea type="number" name="o" class="form-control" required>{{ old('o') }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">A</label>
      <textarea type="number" name="a" class="form-control" required>{{ old('a') }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Diagnóstico</label>
      <textarea type="number" name="diagnostico" class="form-control" required>{{ old('diagnostico') }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Pronóstico</label>
      <textarea type="number" name="pronostico" class="form-control" required>{{ old('pronostico') }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Plan</label>
      <textarea type="number" name="plan" class="form-control" required>{{ old('plan') }}</textarea>
    </div>
    
    <div class="col l12"><br>
      <button type="submit" class="btn blue">Actualizar Control</button>
    </div>
  </form>

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js" ></script>  
<script>

  function submitForm() {
    var id = document.getElementById('paciente_id').value  
    if(id > 0) return true
    alert('Seleccione un paciente de las sugerencias para poder continuar')
    return false
  }

$(document).ready(function() {          
    
    $('#search').autocomplete({

    source: function(request, response) {
        $.ajax({
        method: 'GET',
        url: window.location.origin + "/app/sugest/pacientes",
        dataType: "json",
        data: {term: request.term },
        success: function(data) {                                                                        
            response(data);
        }

        });                               
    },               
    select: function(event, ui) {                      
        
        var x = {
            id: ui.item.data,
            name: ui.item.value,
        }

        $("#paciente_id").val(x.id)
        $("#search").val(x.name)

    }

});
})

</script>
@endsection