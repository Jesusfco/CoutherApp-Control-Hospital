@extends('blades.app')

@section('title', $obj->fullname())

@section('css')
@endsection

@section('content')

<h5><a href="{{ url('app/pacientes') }}">Pacientes </a> / Ver usuario</h5>

<div>
  <a class="btn blue" href="{{ url('app/pacientes/editar', $obj->id) }}">Editar</a>
  <a class="btn blue" href="{{ url('app/control?term=' . $obj->nombre_completo .'&search_type=1') }}">Controles</a>
  <a class="btn blue" href="{{ url('app/antecedentes?term=' . $obj->nombre_completo .'&search_type=1') }}">Antecedentes</a>
  {{-- <a class="btn" href="{{ url()->current() }}/negocios">Negocios</a>
  <a class="btn" href="{{ url()->current() }}/recibos">Recibos</a>
  <a class="btn" href="{{ url()->current() }}/direcciones">Direcciones</a> --}}
</div>

<div class="row ">
    
    <div class="col l12 s12">

        <div class="form-group col l12">
            <label for="exampleInputEmail1">Nombre Completo</label>
            <input type="text" name="name" class="form-control" value="{{ $obj->fullname() }}"  placeholder="Nombre" disabled>
          </div>
          {{-- <div class="form-group col l6">
            <label for="exampleInputEmail1">A. Paterno</label>
            <input type="text" name="patern" class="form-control" value="{{ $obj->paterno }}"  placeholder="Apellido Paterno" disabled>
          </div>
          <div class="form-group col l6">
            <label for="exampleInputEmail1">A. Materno</label>
            <input type="text" name="matern" class="form-control" value="{{ $obj->materno }}"  placeholder="Apellido Materno" disabled>
          </div> --}}
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Correo</label>
            <input type="email" name="email" class="form-control" value="{{ $obj->email }}"  disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Fecha de nacimiento</label>
            <input name="phone" class="form-control" value="{{ $obj->nacimiento }}"  disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Edad</label>
            <input name="phone" class="form-control" value="{{ $obj->edad() }}" disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">CURP</label>
            <input class="form-control" value="{{ $obj->curp }}" disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Numero de empleado</label>
            <input class="form-control" value="{{ $obj->no_empleado }}" disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Estatus</label>
            <input class="form-control" value="{{ $obj->status }}" disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Area</label>
            <input class="form-control" value="{{ $obj->area }}" disabled>
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
            <input class="form-control" value="{{$obj->direccion->calle }}"  disabled>
          </div>
          
          <div class="form-group col l6">
            <label for="exampleInputEmail1">Colonia</label>
            <input class="form-control" value="{{ $obj->direccion->colonia }}"  disabled>
          </div>
      
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Numero Exterior</label>
            <input class="form-control" value="{{$obj->direccion->numero }}"  disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Numero Interior</label>
            <input class="form-control" value="{{ $obj->direccion->numero_int }}"  disabled>
          </div>
          <div class="form-group col l4">
            <label for="exampleInputEmail1">Codigo Postal</label>
            <input class="form-control" value="{{ $obj->direccion->cp }}"  disabled>
          </div>
      
          <div class="form-group col l6">
            <label for="exampleInputEmail1">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" value="{{ $obj->direccion->ciudad }}"  disabled>
          </div>
          <div class="form-group col l6">
            <label for="exampleInputEmail1">Estado</label>
            <input class="form-control" value="{{ $obj->direccion->estado }}" disabled>
          </div>

    </div>
</div>

    

   
@endsection

@section('scripts')