@extends('blades.app')

@section('title', "")

@section('css')
<style>
  .analisis-images-container {
    display: flex;
    flex-wrap: wrap;
  }

  .analisis-images-container .photo-container {
    width: 22%;
    margin-right: 15px
  }
  .analisis-images-container .photo-container img {
    max-width: 100%;
    max-height: 100%;
  }
</style>
@endsection

@section('content')

<h5><a href="{{ url('app/analisis') }}">Controles </a> / Ver Analisis</h5>

<div>
  {{-- @if(Auth::user()->user_type  == 3)  --}}
  <a class="btn blue" href="{{ route('analisis.edit', $analisis->id) }}">Editar</a>
  {{-- @endif --}}
  {{-- <a class="btn blue" href="{{ url('app/control/pdf', $analisis->id) }}">PDF</a> --}}
  {{-- <a class="btn red" href="{{ url('app/control/pdf', $analisis->id) }}">Eliminar</a> --}}
  {{-- <a class="btn" href="{{ url()->current() }}/negocios">Negocios</a>
  <a class="btn" href="{{ url()->current() }}/recibos">Recibos</a>
  <a class="btn" href="{{ url()->current() }}/direcciones">Direcciones</a> --}}
</div>

<div class="row ">      

  <div class="form-group col l12">    
    <p><strong>Paciente: </strong>
      <a href="{{ url('app/pacientes/ver', $analisis->medico_id) }}" target="_blank">
        {{ $analisis->paciente->nombre_completo }}
      </a>
      </p>
  </div>
  
  <div class="form-group col l8">    
    <p><strong>Fecha de estudios: </strong>{{ $analisis->getFechaFormat() }}</p>
  </div>

  <div class="form-group col l4">    
  <p><strong>Tipo: </strong> {{ $analisis->tipo }}</p>    
  </div>

  <div class="form-group col l12">    
    <p><strong>Descripción: </strong>{{ $analisis->descripcion }} </p>
  </div>
  
  <div class="form-group col l12">    
    <p><strong>Observación: </strong>{{ $analisis->observacion }}</p>
  </div>

  <div class="form-group col l12"> 
    <h4>Análisis</h4> 
    <div class="analisis-images-container">
      @foreach ($analisis->images as $image)          
      <a href="{{ $image->full_path }}" class="photo-container">
        <img src="{{ $image->full_path }}" alt="">
      </a>
      @endforeach
    </div>
  </div>
    
</div>

    

   
@endsection

@section('scripts')