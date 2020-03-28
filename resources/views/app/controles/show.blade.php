@extends('blades.app')

@section('title', "")

@section('css')
@endsection

@section('content')

<h5><a href="{{ url('app/control') }}">Controles </a> >> Ver Control</h5>

<div>
  <a class="btn blue" href="{{ url('app/control/editar', $obj->id) }}">Editar</a>
  <a class="btn blue" href="{{ url('app/control/pdf', $obj->id) }}">PDF</a>
  <a class="btn red" href="{{ url('app/control/pdf', $obj->id) }}">Eliminar</a>
  {{-- <a class="btn" href="{{ url()->current() }}/negocios">Negocios</a>
  <a class="btn" href="{{ url()->current() }}/recibos">Recibos</a>
  <a class="btn" href="{{ url()->current() }}/direcciones">Direcciones</a> --}}
</div>

<div class="row ">
    
  <div class="form-group col l6">
    <label for="exampleInputEmail1">Paciente</label>
    <p>{{ $obj->paciente->fullname() }}</p>
    
  </div>

  <div class="form-group col l6">
    <label for="exampleInputEmail1">Doctor</label>
    <p>{{ $obj->medico->fullname() }}</p>
  </div>

  <div class="form-group col l4">
    <label for="exampleInputEmail1">Teléfono</label>
    <p>{{ $obj->telefono }}</p>
  </div>
  <div class="form-group col l4">
    <label for="exampleInputEmail1">Alergias</label>
    <p>{{ $obj->alergias }}</p>
  </div>
  
  <div class="form-group col l4">
    <label for="exampleInputEmail1">TA</label>
    <p>{{ $obj->TA }}</p>
  </div>

  <div class="form-group col l4">
    <label for="exampleInputEmail1">Peso</label>
    <p>{{ $obj->peso }}kg</p>
  </div>

  <div class="form-group col l4">
    <label for="exampleInputEmail1">Talla</label>
    <p>{{ $obj->talla }}</p>
  </div>

  
  <div class="form-group col l4">
    <label for="exampleInputEmail1">IMC</label>
    <p>{{ $obj->imc }}</p>
  </div>

  <div class="form-group col l4">
    <label for="exampleInputEmail1">Temperatura</label>
    <p>{{ $obj->temperatura }}</p>
  </div>
  
  <div class="form-group col l4">
    <label for="exampleInputEmail1">SPO2</label>
    <p>{{ $obj->SPO2 }}</p>
  </div>
  
  <div class="form-group col l4">
    <label for="exampleInputEmail1">FC</label>
    <p>{{ $obj->FC }}</p>
  </div>
  
  <div class="form-group col l4">
    <label for="exampleInputEmail1">FR</label>
    <p>{{ $obj->FR }}</p>
  </div>
  
  <div class="form-group col l4">
    <label for="exampleInputEmail1">DXTX</label>
    <p>{{ $obj->DXTX }}</p>
  </div>
  
  <div class="form-group col l12">
    <label for="exampleInputEmail1">P</label>
    <p>{!! nl2br($obj->p) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">S</label>
    <p>{!! nl2br($obj->s) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">O</label>
    <p>{!! nl2br($obj->o) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">A</label>
    <p>{!! nl2br($obj->a) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">Diagnóstico</label>
    <p>{!! nl2br($obj->diagnostico) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">Pronóstico</label>
    <p>{!! nl2br($obj->pronostico) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">Plan</label>
    <p>{!! nl2br($obj->plan) !!}</p>
  </div>
    
</div>

    

   
@endsection

@section('scripts')