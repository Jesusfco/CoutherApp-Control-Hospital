@extends('blades.app')

@section('title', 'Crear usuario')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/usuarios') }}">Usuarios </a> / Crear usuario</h5>

<form class="row" id="form2" role="form" method="POST" enctype="multipart/form-data" onsubmit="return appForm.submit(event)">
    {{ csrf_field() }}

    <div class="input-field col l12">
      <h4>Datos de Usuario</h4>
    </div>

    <div class="input-field col l6">
      <label for="exampleInputEmail1">Nombres</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Nombre" required autofocus maxlength="30">
    </div>

    <div class="input-field col l6">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ old('paterno') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Paterno" required maxlength="30">
    </div>

    <div class="input-field col l6">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ old('materno') }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Materno" required maxlength="30">
    </div>

    @include('app.utils.forms.email')
    
    <div class="input-field col l4" style="position: relative">
      <input type="password" name="password" class="form-control" v-model="password" minlength="8" maxlength="16" :required="password.length > 0" onkeyup="return syncPasswordValidation(event)"> 
      <label for="exampleInputEmail1">Contraseña</label>      
      <span  class=" helper-text red-text" id="password-message"></span>
    </div>

    <div class="input-field col l4">
      <label>No. Folio</label>
      <input type="text"  name="no_folio" class="form-control" onkeypress="return onlyNumberIntegersKey(event)" value="{{ old('no_folio') }}" required maxlength="7">
    </div>

    <div class="input-field col l4">
      <label>No. Empledo</label>
      <input type="text" name="no_empleado" class="form-control" onkeypress="return onlyNumberKey(event)" value="{{ old('no_empleado') }}" required maxlength="7">
      <span  class=" helper-text red-text"></span>
    </div>
    <div class="input-field col l4">
      @include('app.utils.forms.curp.create')
    </div>

    <div class=" col l4">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control" onchange="validateBirthday(event)" value="{{ old('nacimiento') }}">
    </div>
    
    <div class="input-field col l4">
      <label for="exampleInputEmail1">Cedula</label>
      <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}" onkeypress="return onlyNumberIntegersKey(event)"  required maxlength="9">
    </div>

    <div class="input-field col l4">
      <div class="switch">
      <label>        
        <input type="checkbox" v-model="have_especialidad" v-on:click="especialidad = ''">
        <span class="lever"></span>
          Tiene especialidad
        </label>
      </div>      
    </div>

    <input type="hidden" name="especialidad" class="form-control"  v-if="!have_especialidad "> 
    <div class="input-field col l4" v-else>
      <label for="exampleInputEmail1">Especialidad</label>
      <input type="text" name="especialidad" class="form-control" required>
    </div>    
    
    <div class=" col l4">
      <label>Tipo de Usuario</label>
      <select name="user_type" class="browser-default">                 
        <option value="2" @if(old('user_type') == 2) selected @endif>Médico</option>        
        <option value="3" @if(old('user_type') == 3) selected @endif>Administrador</option>        
      </select>
    </div>

    @include('app.utils.forms.sexo') 

    <div class="input-field col l12">
      <h4>Dirección</h4>
    </div>
    
    @include('app.utils.forms.address.create')

    <div class="col l12"><br>
      <button type="submit" class="btn blue">Crear Nuevo Usuario</button>
    </div>
  </form>

@endsection

@section('scripts')

<script>
var appForm = new Vue({
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
      password: "",
      curp: "",
      
    }, created: function () {
      this.curp = document.getElementById('oldCurpInput').value
      this.concactEmailParameters()
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
      concactEmailParameters() {
        this.email = this.email_name.length > 0 && this.email_domain ? this.email_name + this.email_domain : ''
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
      },

      submit(e) {        
        if(!validateCurp(this.curp) || !validateSecurePassword(this.password)) {
          e.preventDefault();          
          return false
        }
        return true
      } 

    }
})

</script>
@endsection