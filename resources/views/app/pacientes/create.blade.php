@extends('blades.app')

@section('title', 'Crear Paciente')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/pacientes') }}">Pacientes </a> / Crear Paciente</h5>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return appForm.submit(event)" id="form2">
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

    {{-- @include('app.utils.forms.email-paciente')  --}}    
    <div class="form-group col l4">
      @include('app.utils.forms.curp.create')
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control" value="{{ old('nacimiento') }}" onchange="validateBirthday(event)" required>
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Numero de Empleado</label>
      <input type="text" name="no_empleado" class="form-control" value="{{ old('no_empleado') }}" required onkeypress="return onlyNumberIntegersKey(event)">
    </div>
    
    <div class="form-group col l6">
      <label>No. Folio</label>
      <input type="text" name="no_folio" class="form-control" value="{{ old('no_folio') }}" required onkeypress="return onlyNumberIntegersKey(event)">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Area</label>
      <input type="text" name="area" class="form-control" value="{{ old('area') }}" required onkeypress="return onlyAlphabeticCharacterKey(event)">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Lugar de nacimiento</label>
      <input type="text" name="lugar_nacimiento" class="form-control" value="{{ old('lugar_nacimiento') }}" required onkeypress="return onlyAlphabeticCharacterKey(event)">
    </div> 
    
    <div class="form-group col l4">
      <label>Estatus</label>
      <select name="status" class="browser-default">   
        <option>Contrato</option>        
        <option>Confianza</option>        
        <option>Base</option>               
      </select>
    </div>

    @include('app.utils.forms.sexo') 

    <div class="form-group col l12">
      <h4>Dirección</h4>
    </div>
    
    @include('app.utils.forms.address.create')

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
      sexo: "Masculino",
      email_name: "",
      email_domain: "@outlook.es",
      email: "",      
      curp: "",
      
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
      concactEmailParameters() {
        this.email = this.email_name.length > 0 ? this.email_name + this.email_domain : ''
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
        if(!validateCurp(this.curp)) {
          e.preventDefault();          
          return false
        }
        return true
      }

    }
})

</script>
@endsection