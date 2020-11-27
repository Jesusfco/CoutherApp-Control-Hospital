@extends('blades.app')

@section('title', 'Crear Monitoreo')

@section('css')

@endsection

@section('content')
<h5><a href="{{ url('app/monitoreos') }}">Monitoreos </a> / Crear Monitoreo</h5>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()" id="form2" action="{{url('app/monitoreos')}}">
    {{ csrf_field() }}    

    <input type="hidden" name="paciente_id" id="paciente_id" value="{{ old('paciente_id') }}">
    <input type="hidden" name="medico_id" value="{{ Auth::id() }}">
    
    <div class="form-group col s12">
      <label for="exampleInputEmail1">Paciente</label>
      <input type="text" name="search" class="form-control" id="search" value="{{ old('search') }}"  placeholder="Nombre" required  autofocus>
    </div> 
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Doctor</label>
      <input class="form-control" value="{{ Auth::user()->nombre_completo }}" disabled>
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Cédula</label>
      <input class="form-control" value="{{ Auth::user()->cedula }}" disabled>
    </div>  
    
    <div class="col s12"><br>
      <button type="submit" class="btn blue">Crear Monitoreo</button>
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