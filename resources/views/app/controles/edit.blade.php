@extends('blades.app')

@section('title', 'Crear Nota Clínica')

@section('css')
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<h5><a href="{{ url('app/control') }}">Notas Clínica </a> / Actualizar Nota Clínica</h5>

<form class="row" role="form" 
  id="form2"
  method="POST" 
  enctype="multipart/form-data" 
  action="{{ url('app/control', $obj->id) }}"
  onsubmit="return submitForm()">
    {{ csrf_field() }}    

    <input type="hidden" name="paciente_id" id="paciente_id" value="{{ $obj->paciente_id }}">
    <input type="hidden" name="medico_id" value="{{ $obj->medico_id }}">
    @method('PUT')
    
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Paciente</label>
      <input type="text" name="search" class="form-control" id="search" value="{{ $obj->paciente->fullname() }}" required autofocus>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Médico</label>
      <input class="form-control" value="{{ $obj->medico->fullname() }}" disabled>
    </div> 

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Teléfono</label>
      <input type="text" name="telefono" class="form-control" value="{{ $obj->telefono }}"  placeholder="961-122-1222" required onkeypress="return onlyNumberIntegersKey(event)" maxlength="10"> 
    </div>
    
    <div class="form-group col l12 row">
      <div class="form-group col l2">
        <br>
        <div class="switch">
        <label>        
          <input type="checkbox" v-model="have_alergias" v-on:click="toggleHaveAlergias">
          <span class="lever"></span>
            Tiene alergía
          </label>
        </div>      
      </div>

      <input type="hidden" name="alergias" class="form-control" v-model="alergias"  v-if="!have_alergias"> 
      <div class="form-group col l12" v-else>
        <label for="exampleInputEmail1">Alergías</label>
        <input type="text" name="alergias" class="form-control" v-model="alergias" required onkeypress="return onlyAlphabeticCharacterKey(event)" maxlength="50">
      </div>    
            
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">TA/mm/hg</label>
      <input type="text" name="TA" class="form-control" value="{{ $obj->TA }}" required maxlength="6">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Peso (kg)</label>
      <input type="number" step="0.01" name="peso" class="form-control" value="{{ $obj->peso }}" required onkeypress="return onlyNumberKey(event)" max="999">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Talla (cm)</label>
      <input type="number" step="0.01" name="talla" class="form-control" value="{{ $obj->talla }}" required onkeypress="return onlyNumberKey(event)" max="400">
    </div>

    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">IMC</label>
      <input type="number" step="0.01" name="IMC" class="form-control" value="{{ $obj->IMC }}" required onkeypress="return onlyNumberKey(event)" max="100">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Temperatura °C</label>
      <input type="number" step="0.01" name="temperatura" class="form-control" value="{{ $obj->temperatura }}" required onkeypress="return onlyNumberKey(event)" max="70">
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">SPO2</label>
      <input type="number" step="0.01" name="SPO2" class="form-control" value="{{ $obj->SPO2 }}" required onkeypress="return onlyNumberKey(event)">
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">FC</label>
      <input type="number" step="0.01" name="FC" class="form-control" value="{{ $obj->FC }}" required>
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">FR</label>
      <input type="number" step="0.01" name="FR" class="form-control" value="{{ $obj->FR }}" required>
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">DXTX( mg/dl):</label>
      <input type="number" step="0.01" name="DXTX" class="form-control" value="{{ $obj->DXTX }}" required>
    </div>
    
    <div class="form-group col l12">
      <label for="exampleInputEmail1">P</label>
      <textarea oninput="auto_grow(this)"  name="p" class="form-control"  rows="20" required>{{ $obj->p }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">S</label>
      <textarea oninput="auto_grow(this)"  name="s" class="form-control" required>{{ $obj->s }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">O</label>
      <textarea oninput="auto_grow(this)" name="o" class="form-control" required>{{ $obj->o }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">A</label>
      <textarea oninput="auto_grow(this)" name="a" class="form-control" required>{{ $obj->a }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Diagnóstico</label>
      <textarea oninput="auto_grow(this)" name="diagnostico" class="form-control" required>{{ $obj->diagnostico }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Pronóstico</label>
      <textarea oninput="auto_grow(this)" name="pronostico" class="form-control" required>{{ $obj->pronostico }}</textarea>
    </div>
    <div class="form-group col l12">
      <label for="exampleInputEmail1">Plan</label>
      <textarea oninput="auto_grow(this)" name="plan" class="form-control" required>{{ $obj->plan }}</textarea>
    </div>
    
    <div class="col l12"><br>
      <button type="submit" class="btn blue">Actualizar Nota Clínica</button>
    </div>
  </form>

  <style>
    textarea {
      resize: none;
      overflow: hidden;
      min-height: 80px;
      
  }
  </style>

@endsection

@section('scripts')

<script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js" ></script>  
<script>

  var app = new Vue({
    el: '#form2',
    data: {

      alergias: '{{ $obj->alergias }}',
      have_alergias: true            
    }, created: function () {
      if(this.alergias == '') {
        this.have_alergias = false
      }
    },
    methods: {     
      toggleHaveAlergias() {
        this.have_alergias = !this.have_alergias
        this.alergias = ''
      }
    }
  })

function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

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