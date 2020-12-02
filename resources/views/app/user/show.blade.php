@extends('blades.app')

@section('title', $obj->fullname())

@section('css')
@endsection

@section('content')

<h5><a href="{{ url('app/usuarios') }}">Usuarios </a> >> Ver usuario</h5>

<div>
<a class="btn blue" href="{{ url('app/usuarios/editar', $obj->id) }}">Editar</a>
{{-- <a class="btn" href="{{ url()->current() }}/negocios">Negocios</a>
<a class="btn" href="{{ url()->current() }}/recibos">Recibos</a>
<a class="btn" href="{{ url()->current() }}/direcciones">Direcciones</a> --}}
</div>

<div class="row ">

<div class="col l12 s12">

<div class="form-group col l6">
<label for="exampleInputEmail1">Nombre</label>
<input type="text" name="name" class="form-control" value="{{ $obj->name }}" disabled>
</div>
<div class="form-group col l6">
<label for="exampleInputEmail1">A. Paterno</label>
<input type="text" name="patern" class="form-control" value="{{ $obj->paterno }}"placeholder="Apellido Paterno" disabled>
</div>
<div class="form-group col l6">
<label for="exampleInputEmail1">A. Materno</label>
<input type="text" name="matern" class="form-control" value="{{ $obj->materno }}"placeholder="Apellido Materno" disabled>
</div>
<div class="form-group col l3">
<label for="exampleInputEmail1">No. Folio</label>
<input type="email" name="email" class="form-control" value="{{ $obj->no_folio }}" disabled>
</div>
<div class="form-group col l3">
<label for="exampleInputEmail1">No. Empleado</label>
<input type="email" name="email" class="form-control" value="{{ $obj->no_empleado }}" disabled>
</div>
<div class="form-group col l3">
<label for="exampleInputEmail1">No. Empleado</label>
<input type="email" name="email" class="form-control" value="{{ $obj->no_empleado }}" disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Correo</label>
<input type="email" name="email" class="form-control" value="{{ $obj->email }}" disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Fecha de nacimiento</label>
<input name="phone" class="form-control" value="{{ $obj->nacimiento }}"disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Edad</label>
<input value="{{ $obj->edad() }}" disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">CURP</label>
<input class="form-control" value="{{ $obj->curp }}" disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Cedula</label>
<input class="form-control" value="{{ $obj->cedula }}" disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Especialidad</label>
<inputclass="form-control" value="{{ $obj->especialidad }}" disabled>
</div>

 
<div class="form-group col l4">
<label for="exampleInputEmail1">Tipo usuario</label>
<input class="form-control" value="{{ $obj->type() }}" disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Sexo</label>
<input class="form-control" value="{{ $obj->sexo }}" disabled>
</div>

<div class="form-group col l12">
<h4>Dirección</h4>
</div>

<div class="form-group col l6">
<label for="exampleInputEmail1">Calle</label>
<input class="form-control" value="{{$obj->direccion->calle }}"disabled>
</div>

<div class="form-group col l6">
<label for="exampleInputEmail1">Colonia</label>
<input class="form-control" value="{{ $obj->direccion->colonia }}"disabled>
</div>

<div class="form-group col l4">
<label for="exampleInputEmail1">Numero Exterior</label>
<input class="form-control" value="{{$obj->direccion->numero }}"disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Numero Interior</label>
<input class="form-control" value="{{ $obj->direccion->numero_int }}"disabled>
</div>
<div class="form-group col l4">
<label for="exampleInputEmail1">Codigo Postal</label>
<input class="form-control" value="{{ $obj->direccion->cp }}"disabled>
</div>

<div class="form-group col l6">
<label for="exampleInputEmail1">Ciudad</label>
<input type="text" name="ciudad" class="form-control" value="{{ $obj->direccion->ciudad }}"disabled>
</div>
<div class="form-group col l6">
<label for="exampleInputEmail1">Estado</label>
<input class="form-control" value="{{ $obj->direccion->estado }}" disabled>
</div>

</div>
</div>



 
@endsection

@section('scripts')