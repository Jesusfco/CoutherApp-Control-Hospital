@extends('blades.app')

@section('title', 'Crear usuario')

@section('css')
@endsection

@section('content')
<h5><a href="{{ url('app/usuarios') }}">Usuarios </a> >> Crear usuario</h5>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()">
    {{ csrf_field() }}

    <div class="form-group col l12">
      <h4>Datos de Usuario</h4>
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
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Contraseña</label>
      <input type="password" name="password" class="form-control" value="{{ old('password') }}">
    </div>

    <div class="form-group col l6">
      <label>No. Folio</label>
      <input type="text" name="no_folio" class="form-control" value="{{ old('no_folio') }}" required>
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Curp</label>
      <input type="tel" name="curp" class="form-control" value="{{ old('curp') }}">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control" value="{{ old('nacimiento') }}">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Cedula</label>
      <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}" required>
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Especialidad</label>
      <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad') }}">
    </div>

    
    
    <div class="form-group col l4">
      <label>Tipo de Usuario</label>
      <select name="user_type" class="browser-default">        
         
        <option value="2" @if(old('user_type') == 2) selected @endif>Doctor</option>        
        <option value="3" @if(old('user_type') == 3) selected @endif>Administrador</option>
        
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
      <button type="submit" class="btn blue">Crear Nuevo Usuario</button>
    </div>
  </form>

@endsection

@section('scripts')

@endsection