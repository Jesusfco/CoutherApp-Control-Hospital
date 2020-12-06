@extends('blades.app')

@section('title', 'Crear usuario')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/usuarios') }}">Usuarios </a> / Crear usuario</h5>

<form class="row" id="form2" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()">
    {{ csrf_field() }}

    <div class="form-group col l12">
      <h4>Datos de Usuario</h4>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Nombres</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Nombre" required autofocus maxlength="30">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ old('paterno') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Paterno" required maxlength="30">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ old('materno') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Materno" required maxlength="30">
    </div>

    <div class="form-group col l6">
      <input type="hidden" name="email" v-model="email">
      <div class="row">
        <div class="col s7">
          <label for="exampleInputEmail1">Correo</label>
          <input type="text" class="form-control" v-model="email_name" required maxlength="15" onkeypress="return withoutAt(event)">
        </div>
        <div class="col s5">     
          <br>     
          <select name="" v-model="email_domain">
            <option>@outlook.es</option>
            <option>@outlook.com</option>
            <option>@gmail.com</option>
            <option>@hotmail.com</option>
            <option>@icloud.com</option>
            <option>@yahoo.com</option>
          </select>
        </div>
      </div>
      
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Contraseña</label>
      <input type="password" name="password" class="form-control" value="{{ old('password') }}" minlength="8" maxlength="16">
    </div>

    <div class="form-group col l4">
      <label>No. Folio</label>
      <input type="text"  name="no_folio" class="form-control" onkeypress="return onlyNumberKey(event)" value="{{ old('no_folio') }}" required maxlength="7">
    </div>

    <div class="form-group col l4">
      <label>No. Empledo</label>
      <input type="text" name="no_empleado" class="form-control" onkeypress="return onlyNumberKey(event)" value="{{ old('no_empleado') }}" required maxlength="7">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Curp</label>
      <input type="text" name="curp" class="form-control" value="{{ old('curp') }}" maxlength="18">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control" onchange="validateBirthday(event)" value="{{ old('nacimiento') }}">
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Cedula</label>
      <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}" onkeypress="return onlyNumberKey(event)"  required maxlength="10">
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

    <input type="hidden" name="especialidad" class="form-control"  v-if="!have_especialidad "> 
    <div class="form-group col l4" v-else>
      <label for="exampleInputEmail1">Especialidad</label>
      <input type="text" name="especialidad" class="form-control" required>
    </div>    
    
    <div class="form-group col l4">
      <label>Tipo de Usuario</label>
      <select name="user_type" class="browser-default">                 
        <option value="2" @if(old('user_type') == 2) selected @endif>Médico</option>        
        <option value="3" @if(old('user_type') == 3) selected @endif>Administrador</option>        
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
      <button type="submit" class="btn blue">Crear Nuevo Usuario</button>
    </div>
  </form>

@endsection

@section('scripts')

<script>
var app = new Vue({
  el: '#form2',
    data: {
      have_especialidad: true,
      especialidad: '',
      nacimiento: "",
      edad: null,
      sexo_selection: 'Masculino',
      sexo: "Masculino",
      email_name: "",
      email_domain: "@outlook.es",
      email: "",
      password: ""
      
    }, created: function () {
      // this.countLines()
    },
    watch: {
      email_domain: function() {
        this.concactEmailParameters()
      },
      email_name: function() {
        this.concactEmailParameters()  
      }
    },
    methods: {     
      // submit(event)  {
      //   if(!validateSecurePassword(this.password))
      // }
      concactEmailParameters() {
        this.email = this.email_name + this.email_domain
      },
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

      // validatePassword() {
      //   validateSecurePassword(this.password)
      // }

    }
})

</script>
@endsection