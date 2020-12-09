@extends('blades.app')
@section('title', ' Actualizar Expediente Clínico')

@section('css')
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<h5><a href="{{ url('app/antecedentes') }}">Expediente  </a> /  Actualizar Expediente Clínico</h5>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()" id="form2" action="{{url('app/antecedentes/' . $obj->id)}}">
    {{ csrf_field() }}    
    @method('PUT')
    <input type="hidden" name="paciente_id" id="paciente_id" value="{{ $obj->paciente_id }}">
    <input type="hidden" name="medico_id" value="{{ $obj->medico_id }}">
    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Paciente</label>
      <input type="text" name="search" class="form-control" id="search" value="{{ $obj->paciente->nombre_completo }}"  placeholder="Nombre" required  autofocus>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Médico</label>
      <input class="form-control" value="{{ Auth::user()->nombre_completo }}" disabled>
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Cédula</label>
      <input class="form-control" value="{{ Auth::user()->cedula }}" disabled>
    </div>  

    <div class="form-group col s12">
      <h5>Interrogatorio</h5>
    </div>
    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Antecedentes Heredofamiliares</label>
      <textarea oninput="auto_grow(this)"  name="heredofamiliares" class="form-control"  rows="20"  >{{ $obj->heredofamiliares }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Personales no patológicos</label>
      <textarea oninput="auto_grow(this)"  name="personales_no_patologicos" class="form-control"  >{{ $obj->personales_no_patologicos }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Personales patológicos</label>
      <textarea oninput="auto_grow(this)"  name="personales_patologicos" class="form-control"  >{{ $obj->personales_patologicos }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Musculo Esquelético</label>
      <textarea oninput="auto_grow(this)" name='musculo_esqueletico' class="form-control"  >{{ $obj->musculo_esqueletico }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Piel y Anexos</label>
      <textarea oninput="auto_grow(this)" name='piel_anexos' class="form-control"  >{{ $obj->piel_anexos }}</textarea>
    </div>
    <div class="form-group col s12">
      <h5>Exploración Física</h5>
      <table class="striped responsive-table">
        <thead>            
            <th>Peso Actual kg</th>            
            <th>Presión Arterial <strong>mmHg</strong></th>            
            <th>Temperatura <strong>°C</strong></th>                                
            <th>Frec. Respiratoria <strong>x minuto</strong></th>                                
            <th>Talla <strong>cm</strong></th>                                
            <th>Frecuencia Cardiaca <strong>x minuto</strong></th>                                            
        </thead>
        <tbody>
          <tr>
            <td><input onkeyup="requiredAfterSomeOnInput(event)" onkeypress="return onlyNumberKey(event)" type="number" step="0.1" min=".1" max="99" name="peso" value="{{ $obj->peso  }}"></td>
            <td><input onkeyup="requiredAfterSomeOnInput(event)" onkeypress="return onlyPresionArterialCharacter(event)" type="text" maxlength="6" name="mm_hg" value="{{ $obj->mm_hg  }}"></td>
            <td><input onkeyup="requiredAfterSomeOnInput(event)" onkeypress="return onlyNumberKey(event)" type="number" step="0.1" min=".1" max="99" name="temperatura" value="{{ $obj->temperatura  }}"></td>
            <td><input onkeyup="requiredAfterSomeOnInput(event)" onkeypress="return onlyNumberKey(event)" type="number" step="0.1" min=".1" max="99" name="frecuencia_respiratoria" value="{{ $obj->frecuencia_respiratoria  }}"></td>
            <td><input onkeyup="requiredAfterSomeOnInput(event)" onkeypress="return onlyNumberKey(event)" type="number" step="0.1" min=".1" max="99" name="talla" value="{{ $obj->talla  }}"></td>
            <td><input onkeyup="requiredAfterSomeOnInput(event)" onkeypress="return onlyNumberKey(event)" type="number" step="0.1" min=".1" max="99" name="frecuencia_cardiaca" value="{{ $obj->frecuencia_cardiaca  }}"></td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Habitus Exterior</label>
      <textarea oninput="auto_grow(this)" name="habitus_exterior" class="form-control"  >{{ $obj->habitus_exterior }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Cabeza</label>
      <textarea oninput="auto_grow(this)" name="cabeza" class="form-control"  >{{ $obj->cabeza }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Cuello</label>
      <textarea oninput="auto_grow(this)" name="cuello" class="form-control"  >{{ $obj->cuello }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Tórax</label>
      <textarea oninput="auto_grow(this)" name="torax" class="form-control"  >{{ $obj->torax }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Abdomen</label>
      <textarea oninput="auto_grow(this)" name="abdomen" class="form-control"  >{{ $obj->abdomen }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Genitales</label>
      <textarea oninput="auto_grow(this)" name="genitales" class="form-control"  >{{ $obj->genitales }}</textarea>
    </div>
    <div class="form-group col s12">
      <h5>Interrogación por aparatos y sistemas</h5>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Sintomas Generales</label>
      <textarea oninput="auto_grow(this)" name="sintomas_generales" class="form-control"  >{{ $obj->sintomas_generales }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Respiratorio</label>
      <textarea oninput="auto_grow(this)" name="respiratorio" class="form-control"  >{{ $obj->respiratorio }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Cardiovascular</label>
      <textarea oninput="auto_grow(this)" name="cardiovascular" class="form-control"  >{{ $obj->cardiovascular }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Digestivo</label>
      <textarea oninput="auto_grow(this)" name="digestivo" class="form-control"  >{{ $obj->digestivo }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Urinario</label>
      <textarea oninput="auto_grow(this)" name="urinario" class="form-control"  >{{ $obj->urinario }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Reproductor</label>
      <textarea oninput="auto_grow(this)" name="reproductor" class="form-control"  >{{ $obj->reproductor }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Hemolinfático</label>
      <textarea oninput="auto_grow(this)" name="hemolinfatico" class="form-control"  >{{ $obj->hemolinfatico }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Endocrino</label>
      <textarea oninput="auto_grow(this)" name="endocrino" class="form-control"  >{{ $obj->endocrino }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Sistema Nervioso</label>
      <textarea oninput="auto_grow(this)" name="sistema_nervioso" class="form-control"  >{{ $obj->sistema_nervioso }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Exploración Ginecologica</label>
      <textarea oninput="auto_grow(this)" name="exploracion_ginecologica" class="form-control"  >{{ $obj->exploracion_ginecologica }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Columna Vertebral</label>
      <textarea oninput="auto_grow(this)" name="columna_vertebral" class="form-control"  >{{ $obj->columna_vertebral }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Extremidades Superiores e Inferiores</label>
      <textarea oninput="auto_grow(this)" name="extremidades" class="form-control"  >{{ $obj->extremidades }}</textarea>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Exploración Neurológica</label>
      <textarea oninput="auto_grow(this)" name="exploracion_neurologica" class="form-control"  >{{ $obj->exploracion_neurologica }}</textarea>
    </div>
    <div class="form-group col s12">
      <h5>Diagnóstico</h5>
    </div>
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Diagnóstico</label>
      <textarea oninput="auto_grow(this)" name="diagnostico" class="form-control"  >{{ $obj->diagnostico }}</textarea>
    </div>
    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Plan</label>
      <textarea oninput="auto_grow(this)" name="plan" class="form-control"  >{{ $obj->plan }}</textarea>
    </div>

    
    <div class="col s12"><br>
      <button type="submit" class="btn blue"> Actualizar Expediente Clínico</button>
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
      paciente: "", 
      nacimiento: "",
      edad: null      
      
    }, created: function () {
      // this.countLines()
    },
    methods: {

      countLines: function() { 

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