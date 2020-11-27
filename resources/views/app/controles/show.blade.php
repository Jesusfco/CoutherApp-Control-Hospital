@extends('blades.app')

@section('title', "Nota Clínica")

@section('css')
@endsection

@section('content')

<h5><a href="{{ url('app/control') }}">Nota Clínica </a> / Ver Nota Clínica</h5>

<div>
  @if(Auth::user()->user_type  == 3) 
  <a class="btn blue" href="{{ url('app/control', $obj->id) }}/edit">Editar</a>
  @endif
  <a class="btn blue" href="{{ url('app/control', $obj->id) }}/pdf">PDF</a>
  {{-- <a class="btn red" href="{{ url('app/control/pdf', $obj->id) }}">Eliminar</a> --}}
  {{-- <a class="btn" href="{{ url()->current() }}/negocios">Negocios</a>
  <a class="btn" href="{{ url()->current() }}/recibos">Recibos</a>
  <a class="btn" href="{{ url()->current() }}/direcciones">Direcciones</a> --}}
</div>

<div class="row ">      

  <div class="form-group col l12">    
    <p><strong>No. Expediente: </strong> {{ $obj->id}}</p>
  </div>
  <div class="form-group col l12">    
    <p><strong>Doctor: </strong>
      <a href="{{ url('app/usuarios/ver', $obj->medico_id) }}" target="_blank">
        {{ $obj->medico->fullname() }}
      </a>
      </p>
  </div>
  
    <div class="form-group col l6">    
      <p><strong>Fecha de Control: </strong>{{ $obj->getFechaFormat() }}</p>
    </div>

    <div class="form-group col l6">    
      <p><strong>Hora: </strong>{{ $obj->getHourFormat() }} HRS</p>
    </div>

    <div class="form-group col l6">    
    <p><strong>Paciente: </strong> <a href="{{ url('app/pacientes/ver', $obj->paciente_id) }}">{{ $obj->paciente->fullname() }}</a></p>    
    </div>

    <div class="form-group col l3">    
      <p><strong>Edad: </strong>{{ $obj->paciente->edad() }} </p>
    </div>
    
    <div class="form-group col l3">    
      <p><strong>Teléfono: </strong>{{ $obj->telefono }}</p>
    </div>

    <div class="form-group col l4">    
      <p><strong>No de Empleado: </strong>{{ $obj->paciente->no_empleado }}</p>
    </div>
    <div class="form-group col l4">    
      <p><strong>Estatus: </strong>{{ $obj->paciente->status }}</p>
    </div>    
    <div class="form-group col l4">    
      <p><strong>Area: </strong>{{ $obj->paciente->area }}</p>
    </div>    
    <div class="form-group col l4">    
      <p><strong>Fecha de Nacimiento: </strong>{{ $obj->paciente->getNacimientoFormat() }}</p>
    </div>

  
  <div class="form-group col l4">    
    <p><strong>Alergias: </strong>{{ $obj->alergias }}</p>
  </div>
  
  <div class="form-group col l3">    
    <p><strong>TA/mm/hg: </strong>{{ $obj->TA }}</p>
  </div>

  <div class="form-group col l3">    
    <p><strong>Peso (Kg): </strong> {{ $obj->peso }}</p>
  </div>

  <div class="form-group col l3">    
    <p><strong>Talla (cm): </strong> {{ $obj->talla }} </p>
  </div>

  
  <div class="form-group col l3">    
    <p><strong>IMC: </strong> {{ $obj->IMC }}</p>
  </div>

  <div class="form-group col l3">    
    <p><strong>Temperatura (°C): </strong> {{ $obj->temperatura }} C°</p>
  </div>
  
  <div class="form-group col l3">    
    <p><strong>SPO2: </strong> {{ $obj->SPO2 }}</p>
  </div>
  
  <div class="form-group col l3">    
    <p><strong>FC: </strong> {{ $obj->FC }}</p>
  </div>
  
  <div class="form-group col l3">    
    <p><strong>FR: </strong> {{ $obj->FR }}</p>
  </div>
  
  <div class="form-group col l3">    
    <p><strong>DXTX(mg/dl): </strong> {{ $obj->DXTX }}</p>
  </div>
  
  <div class="form-group col l12">
    <label for="exampleInputEmail1">P</label>
    <p><strong></strong> {!! nl2br($obj->p) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">S</label>
    <p><strong></strong> {!! nl2br($obj->s) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">O</label>
    <p><strong></strong> {!! nl2br($obj->o) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">A</label>
    <p><strong></strong> {!! nl2br($obj->a) !!}</p>
  </div>
  <div class="form-group col l12">
    <label for="exampleInputEmail1">Diagnóstico</label>
    <p><strong>Diagnóstico:</strong><br> {!! nl2br($obj->diagnostico) !!}</p>
  </div>
  <div class="form-group col l12">
    
    <p><strong>Pronóstico: </strong><br> {!! nl2br($obj->pronostico) !!}</p>
  </div>
  <div class="form-group col l12">
    
    <p><strong>Plan</strong><br> {!! nl2br($obj->plan) !!}</p>
  </div>
    
</div>

    

   
@endsection

@section('scripts')