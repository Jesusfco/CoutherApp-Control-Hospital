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
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" onkeypress="return onlyLetterKey(event)" placeholder="Nombre" required autofocus maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ old('paterno') }}" onkeypress="return onlyLetterKey(event)" placeholder="Apellido Paterno" required maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ old('materno') }}" onkeypress="return onlyLetterKey(event)" placeholder="Apellido Materno" required maxlength="50">
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
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Calle</label>
      <input type="text" name="calle" class="form-control" value="{{ old('calle') }}" maxlength="50">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Colonia</label>
      <input type="text" name="colonia" class="form-control" value="{{ old('colonia') }}" maxlength="30">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Exterior</label>
      <input type="number" name="numero" class="form-control" value="{{ old('numero') }}" onkeypress="return onlyNumberKey(event)" max="9999999">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Interior</label>
      <input type="text" name="numero_int" class="form-control" value="{{ old('numero_int') }}" maxlength="8">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Codigo Postal</label>
      <input type="number" name="cp" class="form-control" value="{{ old('cp') }}" onkeypress="return onlyNumberKey(event)" max="9999999">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Ciudad</label>
      <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad') }}" maxlength="40" onkeypress="return onlyLetterKey(event)">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Estado</label>
      <select class="browser-default" name="estado">
        <option>Aguascalientes</option>
        <option>Baja California</option>
        <option>Baja California Sur</option>
        <option>Campeche</option>
        <option>Chiapas</option>
        <option>Chihuahua</option>
        <option>Ciudad de México</option>
        <option>Coahuila</option>
        <option>Colima</option>
        <option>Durango</option>
        <option>Estado de México</option>
        <option>Guanajuato</option>
        <option>Guerrero</option>
        <option>Hidalgo</option>
        <option>Jalisco</option>
        <option>Michoacán</option>
        <option>Morelos</option>
        <option>Nayarit</option>
        <option>Nuevo León</option>
        <option>Oaxaca</option>
        <option>Puebla</option>
        <option>Querétaro</option>
        <option>Quintana Roo</option>
        <option>San Luis Potosí</option>
        <option>Sinaloa</option>
        <option>Sonora</option>
        <option>Tabasco</option>
        <option>Tamaulipas</option>
        <option>Tlaxcala</option>
        <option>Veracruz</option>
        <option>Yucatán</option>
        <option>Zacatecas</option>
      </select>
    </div>

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