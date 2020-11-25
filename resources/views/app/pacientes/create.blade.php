@extends('blades.app')

@section('title', 'Crear usuario')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/pacientes') }}">Pacientes </a> / Crear Paciente</h5>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()">
    {{ csrf_field() }}

    <div class="form-group col l12">
      <h4>Datos de Paciente</h4>
      <input type="hidden" name="user_type" value="1">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Nombres</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}"  placeholder="Nombre" required autofocus>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ old('paterno') }}"  placeholder="Apellido Paterno" required>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Apellido Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ old('materno') }}"  placeholder="Apellido Materno" required>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Correo</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}">      
    </div>        

    <div class="form-group col l6">
      <label for="exampleInputEmail1">CURP</label>
      <input type="tel" name="curp" class="form-control" value="{{ old('curp') }}">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control" value="{{ old('nacimiento') }}" required>
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Numero de Empleado</label>
      <input type="number" name="no_empleado" class="form-control" value="{{ old('no_empleado') }}" required>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Area</label>
      <input type="text" name="area" class="form-control" value="{{ old('area') }}" required>
    </div>

    
    
    <div class="form-group col l4">
      <label>Status</label>
      <select name="status" class="browser-default">   
        <option>Contrato</option>        
        <option>Confianza</option>        
        <option>Base</option>               
      </select>
    </div>

    <div class="form-group col l4">
      <label>Sexo</label>
      <select name="sexo" class="browser-default">           
        <option>Masculino</option>        
        <option>Femenino</option>                
      </select>
    </div>

    <div class="form-group col l12">
      <h4>Dirección</h4>
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Calle</label>
      <input type="text" name="calle" class="form-control" value="{{ old('calle') }}">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Colonia</label>
      <input type="text" name="colonia" class="form-control" value="{{ old('colonia') }}">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Exterior</label>
      <input type="number" name="numero" class="form-control" value="{{ old('numero') }}">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Interior</label>
      <input type="number" name="numero_int" class="form-control" value="{{ old('numero_int') }}">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Codigo Postal</label>
      <input type="number" name="cp" class="form-control" value="{{ old('cp') }}">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Ciudad</label>
      <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad') }}">
    </div>
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Estado</label>
      <input type="text" name="estado" class="form-control" value="{{ old('estado') }}">
    </div>

    <div class="col l12"><br>
      <button type="submit" class="btn blue">Crear Nuevo Paciente</button>
    </div>
  </form>

@endsection

@section('scripts')

@endsection