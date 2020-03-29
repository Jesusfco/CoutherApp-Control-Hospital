@extends('blades.app')

@section('title', 'Editar Trabajo')

@section('css')
@endsection

@section('content')

<h5><a href="{{ url('app/usuarios') }}">Usuarios </a> >> Editar usuario</h5>
<div>
  <a class="btn blue" href="{{ url('app/usuarios/ver', $obj->id) }}">Ver Usuario</a>
</div>

<form class="row" role="form" method="POST" enctype="multipart/form-data" onsubmit="return submitForm()">
    {{ csrf_field() }}

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Nombre</label>
      <input type="text" name="name" class="form-control" value="{{ $obj->name }}"  placeholder="Nombre" required>
    </div>
    <div class="form-group col l6">
      <label for="exampleInputEmail1">A. Paterno</label>
      <input type="text" name="paterno" class="form-control" value="{{ $obj->paterno }}"  placeholder="Apellido Paterno">
    </div>
    <div class="form-group col l6">
      <label for="exampleInputEmail1">A. Materno</label>
      <input type="text" name="materno" class="form-control" value="{{ $obj->materno }}"  placeholder="Apellido Materno">
    </div>
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Correo</label>
      <input type="email" name="email" class="form-control" value="{{ $obj->email }}">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Contraseña</label>
      <input type="password" name="password" class="form-control" value=""  placeholder="**********">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Curp</label>
      <input type="tel" name="curp" class="form-control" value="{{ $obj->curp }}">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Fecha de Nacimiento</label>
      <input type="date" name="nacimiento" class="form-control" value="{{ $obj->nacimiento }}">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Cedula</label>
      <input type="text" name="cedula" class="form-control" value="{{ $obj->cedula }}">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Especialidad</label>
      <input type="text" name="especialidad" class="form-control" value="{{ $obj->especialidad }}">
    </div>

    <div class="form-group col l6">
      <label>Tipo de Usuario</label>
      <select name="user_type" class="browser-default">        
        <option value="2" @if($obj->user_type == 2) selected @endif>Doctor</option>        
        <option value="3" @if($obj->user_type == 3) selected @endif>Administrador</option>        
      </select>
    </div>

    <div class="form-group col l4">
      <label>Sexo</label>
      <select name="sexo" class="browser-default">   
        <option selected>{{ $obj->sexo }}</option>        
        <option>Masculino</option>        
        <option>Femenino</option>                
      </select>
    </div>
    
    <div class="form-group col l12">
      <h4>Dirección</h4>
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Calle</label>
      <input type="text" name="calle" class="form-control" value="{{$obj->direccion->calle }}">
    </div>
    
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Colonia</label>
      <input type="text" name="colonia" class="form-control" value="{{ $obj->direccion->colonia }}">
    </div>

    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Exterior</label>
      <input type="number" name="numero" class="form-control" value="{{$obj->direccion->numero }}">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Numero Interior</label>
      <input type="number" name="numero_int" class="form-control" value="{{ $obj->direccion->numero_int }}">
    </div>
    <div class="form-group col l4">
      <label for="exampleInputEmail1">Codigo Postal</label>
      <input type="number" name="cp" class="form-control" value="{{ $obj->direccion->cp }}">
    </div>

    <div class="form-group col l6">
      <label for="exampleInputEmail1">Ciudad</label>
      <input type="text" name="ciudad" class="form-control" value="{{ $obj->direccion->ciudad }}">
    </div>
    <div class="form-group col l6">
      <label for="exampleInputEmail1">Estado</label>
      <input type="text" name="estado" class="form-control" value="{{ $obj->direccion->estado }}">
    </div>
         
    <div class="col l12"><br>
      <button type="submit" class="btn blue">Actualizar Usuario</button>
    </div>
  </form>

@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
<script>    

    $('#imagenInput').change(()=> {
      var input = document.getElementById('imagenInput').files[0];
      $('#imgForm').attr('src',"algo");
      let reader = new FileReader();
        reader.onload = function(e) {
          //  e.target.result;
          
          $('#imgForm').attr('src',e.target.result);
          console.log(e.target.result)
        };

        reader.readAsDataURL(input);
    })

    
</script>
@endsection