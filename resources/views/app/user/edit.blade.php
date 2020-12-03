@extends('blades.app')

@section('title', 'Actualizar usuario')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/usuarios') }}">Usuarios </a> / Actualizar usuario</h5>

<form class="row" id="form2" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()">
    {{ csrf_field() }}

    <div class="form-group col l12">
      <h4>Datos de Usuario</h4>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Nombres</label>
      <input type="text" name="name" class="form-control" value="{{ $obj->name }}" onkeypress="return onlyLetterKey(event)" placeholder="Nombre" required autofocus maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ $obj->paterno }}" onkeypress="return onlyLetterKey(event)" placeholder="Apellido Paterno" required maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ $obj->materno }}" onkeypress="return onlyLetterKey(event)" placeholder="Apellido Materno" required maxlength="50">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Correo</label>
      <input type="email" name="email" class="form-control" value="{{ $obj->email }}" required maxlength="50">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Contraseña</label>
      <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group col l4">
      <label>No. Folio</label>
      <input type="text"  name="no_folio" class="form-control" onkeypress="return onlyNumberKey(event)" value="{{ $obj->no_folio }}" required maxlength="7">
    </div>

    <div class="form-group col l4">
      <label>No. Empledo</label>
      <input type="text" name="no_empleado" class="form-control" onkeypress="return onlyNumberKey(event)" value="{{ $obj->no_empleado }}" required maxlength="7">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Curp</label>
      <input type="text" name="curp" class="form-control" value="{{ $obj->curp }}" maxlength="18">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control"  onchange="validateBirthday(event)" value="{{ $obj->nacimiento }}">
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Cedula</label>
      <input type="text" name="cedula" class="form-control" value="{{ $obj->cedula }}" onkeypress="return onlyNumberKey(event)"  required>
    </div>

    <div class="form-group col l4">
      <div class="switch">
      <label>        
        <input type="checkbox" v-model="have_especialidad" v-on:click="especialidad = ''">
        <span class="lever"></span>
          Tiene especialidad
        </label>
      </div>      
    </div>

    <input type="hidden" name="especialidad" class="form-control"  v-if="!have_especialidad" v-model="especialidad"> 
    <div class="form-group col l4" v-else>
      <label for="exampleInputEmail1">Especialidad</label>
      <input type="text" name="especialidad" class="form-control" required v-model="especialidad">
    </div>    
    
    <div class="form-group col l4">
      <label>Tipo de Usuario</label>
      <select name="user_type" class="browser-default">        
         
        <option value="2" @if($obj->user_type == 2) selected @endif>Médico</option>        
        <option value="3" @if($obj->user_type == 3) selected @endif>Administrador</option>
        
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
      <input type="text" name="calle" class="form-control" value="{{ $obj->calle }}" maxlength="50">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Colonia</label>
      <input type="text" name="colonia" class="form-control" value="{{ $obj->colonia }}" maxlength="30">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Exterior</label>
      <input type="number" name="numero" class="form-control" value="{{ $obj->numero }}" onkeypress="return onlyNumberKey(event)" max="9999999">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Interior</label>
      <input type="text" name="numero_int" class="form-control" value="{{ $obj->numero_int }}"  maxlength="8">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Codigo Postal</label>
      <input type="number" name="cp" class="form-control" value="{{ $obj->cp }}" onkeypress="return onlyNumberKey(event)" max="9999999">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Ciudad</label>
      <input type="text" name="ciudad" class="form-control" value="{{ $obj->ciudad }}" maxlength="40" onkeypress="return onlyLetterKey(event)">
    </div>
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Estado</label>
      <select class="browser-default" name="estado">
        <option>{{$obj->estado}}</option>
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
      <button type="submit" class="btn blue">Actualizar Usuario</button>
    </div>
  </form>

@endsection

@section('scripts')

<script>
var app = new Vue({
  el: '#form2',
    data: {
      have_especialidad: false,
      especialidad: '{{$obj->especialidad}}',
      nacimiento: "",
      edad: null,
      @if($obj->sexo === 'Masculino' || $obj->sexo == 'Femenino')
      sexo_selection: '{{$obj->sexo}}',
      @else
        sexo_selection: 'otro',
      @endif
      sexo: "{{$obj->sexo}}"
      
    }, created: function () {
      if(this.sexo != 'Masculino' || this.sexo != 'Femenino') {
        this.sexo_selection = 'Otro'
      }
      if(this.especialidad != '') {
        this.have_especialidad = true
      }
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