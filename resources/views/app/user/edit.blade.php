@extends('blades.app')

@section('title', 'Actualizar usuario')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/usuarios') }}">Usuarios </a> / Actualizar usuario</h5>

<form class="row" id="form2" role="form" method="POST" enctype="multipart/form-data" onsubmit="return appForm.submit(event)">
    {{ csrf_field() }}

    <div class="form-group col l12">
      <h4>Datos de Usuario</h4>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Nombres</label>
      <input type="text" name="name" class="form-control" value="{{ $obj->name }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Nombre" required autofocus maxlength="30">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ $obj->paterno }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Paterno" required maxlength="30">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ $obj->materno }}" onkeypress="return onlyAlphabeticCharacterKey(event)" placeholder="Apellido Materno" required maxlength="30">
    </div>

    @include('app.utils.forms.email') 
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Contraseña</label>
      <input type="password" v-model="password" name="password" class="form-control" minlength="8" maxlength="16">
    </div>

    <div class="form-group col l4">
      <label>No. Folio</label>
      <input type="text"  name="no_folio" class="form-control" onkeypress="return onlyNumberIntegersKey(event)" value="{{ $obj->no_folio }}" required maxlength="7">
    </div>

    <div class="form-group col l4">
      <label>No. Empledo</label>
      <input type="text" name="no_empleado" class="form-control" onkeypress="return onlyNumberIntegersKey(event)" value="{{ $obj->no_empleado }}" required maxlength="7">
    </div>
    <div class="form-group col l4">
      @include('app.utils.forms.curp.edit')
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control"  onchange="validateBirthday(event)" value="{{ $obj->nacimiento }}">
    </div>
    
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Cedula</label>
      <input type="text" name="cedula" class="form-control" value="{{ $obj->cedula }}" onkeypress="return onlyNumberIntegersKey(event)"  required maxlength="9">
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
      <input type="text" name="especialidad" class="form-control" required v-model="especialidad" onkeypress="return onlyAlphabeticCharacterKey(event)">
    </div>    
    
    <div class="form-group col l4">
      <label>Tipo de Usuario</label>
      <select name="user_type" class="browser-default">                 
        <option value="2" @if($obj->user_type == 2) selected @endif>Médico</option>        
        <option value="3" @if($obj->user_type == 3) selected @endif>Administrador</option>        
      </select>
    </div>

    @include('app.utils.forms.sexo') 

    <div class="form-group col l12">
      <h4>Dirección</h4>
    </div>
    
    @include('app.utils.forms.address.edit')

    <div class="col l12"><br>
      <button type="submit" class="btn blue">Actualizar Usuario</button>
    </div>
  </form>

@endsection

@section('scripts')

<script>
var appForm = new Vue({
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
      sexo: "{{$obj->sexo}}",
      email_name: "",
      email_domain: "",
      email: "{{ $obj->email }}",
      curp:"{{ $obj->curp }}",
      
    }, created: function () {
      if(this.sexo != 'Masculino' || this.sexo != 'Femenino') {
        this.sexo_selection = 'Otro'
      }
      if(this.especialidad != '') {
        this.have_especialidad = true
      }

      let strings = this.email.split("@")
      this.email_name = strings[0]
      this.email_domain = "@" + strings[1]
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