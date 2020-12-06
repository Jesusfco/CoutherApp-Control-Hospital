@extends('blades.app')

@section('title', 'Crear Paciente')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/pacientes') }}">Pacientes </a> / Crear Paciente</h5>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()" id="form2">
    {{ csrf_field() }}

    <div class="form-group col l12">
      <h4>Datos de Paciente</h4>
      <input type="hidden" name="user_type" value="1">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Nombres</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Nombre" required autofocus maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ old('paterno') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Paterno" required maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ old('materno') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Materno" required maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Correo</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}"  maxlength="50">
    </div>

    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">CURP</label>
      <input type="tel" name="curp" class="form-control" value="{{ old('curp') }}" maxlength="18">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control" value="{{ old('nacimiento') }}" onchange="validateBirthday(event)" required>
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Numero de Empleado</label>
      <input type="text" name="no_empleado" class="form-control" value="{{ old('no_empleado') }}" required onkeypress="return onlyNumberKey(event)">
    </div>
    
    <div class="form-group col l6">
      <label>No. Folio</label>
      <input type="text" name="no_folio" class="form-control" value="{{ old('no_folio') }}" required onkeypress="return onlyNumberKey(event)">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Area</label>
      <input type="text" name="area" class="form-control" value="{{ old('area') }}" required>
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Lugar de nacimiento</label>
      <input type="text" name="lugar_nacimiento" class="form-control" value="{{ old('lugar_nacimiento') }}" required>
    </div> 
    
    <div class="form-group col l4">
      <label>Estatus</label>
      <select name="status" class="browser-default">   
        <option>Contrato</option>        
        <option>Confianza</option>        
        <option>Base</option>               
      </select>
    </div>

    <div class="form-group col l4">
      <label>Sexo</label>
      <select name="sexo" class="browser-default" v-model="sexo_selection" v-on:change="handlerSexoChange">           
        <option>Masculino</option>        
        <option>Femenino</option>  
        <option>Otro</option>                
      </select>
    </div>

    <input v-model="sexo" required v-if="sexo_selection == 'Masculino' || sexo_selection == 'Femenino'" name="sexo" type="hidden">
    <div class="form-group col l4" v-else>
      <label>Sexo</label>
      <input v-model="sexo" required name="sexo" type="text" maxlength="20">
    </div>

    <div class="form-group col l12">
      <h4>Dirección</h4>
    </div>
    
    @include('app.utils.address-create')

    <div class="col l12"><br>
      <button type="submit" class="btn blue">Crear Nuevo Paciente</button>
    </div>
  </form>

@endsection

@section('scripts')

<script>
var app = new Vue({
  el: '#form2',
    data: { 
      nacimiento: "", 
      sexo_selection: 'Masculino',
      sexo: "Masculino"
      
    }, created: function () {
      // this.countLines()
    },
    methods: {      
      handlerSexoChange(){
        switch (this.sexo_selection) {
          case "Masculino":
            this.sexo = this.sexo_selection
            break;
          case "Femenino":
            this.sexo = this.sexo_selection
            break;        
          default:
            this.sexo = ''
            break;
        }
      }

    }
})

</script>
@endsection