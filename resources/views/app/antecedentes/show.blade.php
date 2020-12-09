@extends('blades.app')

@section('title', "Expediente Clínico")

@section('css')
@endsection

@section('content')

<h5><a href="{{ url('app/antecedentes') }}">Expediente  </a> / Ver Expediente Clínico</h5>

<div>
  @if(Auth::user()->user_type  == 3) 
  <a class="btn blue" href="{{ url('app/antecedentes', $obj->id) }}/edit">Editar</a>
  @endif
  <a class="btn blue" href="{{ url('app/antecedentes', $obj->id) }}/pdf">PDF</a>
  {{-- <a class="btn red" href="{{ url('app/control/pdf', $obj->id) }}">Eliminar</a> --}}
  {{-- <a class="btn" href="{{ url()->current() }}/negocios">Negocios</a>
  <a class="btn" href="{{ url()->current() }}/recibos">Recibos</a>
  <a class="btn" href="{{ url()->current() }}/direcciones">Direcciones</a> --}}
</div>

<div class="row ">      
  <div class="col s3">
    <strong>No. Expediente:</strong> {{ $obj->id}}
  </div>
  <div class="col s3">
    <strong> Folio: </strong>{{ $obj->no_folio}}
  </div>
  <div class="col s5">
    <strong>Fecha:</strong> {{ $obj->getFechaFormat() }}
  </div>
  
  <div class="col s12">
    <strong>Paciente:</strong>  <a href="{{ url('app/pacientes/ver', $obj->paciente) }}">{{ $obj->paciente->nombre_completo}}</a>
  </div>
  <div class="col s12">
    Médico: {{ $obj->medico->nombre_completo}}</a>
  </div>
  <div class="col s12">
    
    
  <p><strong>Antecedentes Heredofamiliares:</strong><br><br> {!! nl2br($obj->heredofamiliares) !!} </p>    
  <p><strong>Antecedentes Persnolaes No Patológicos:</strong><br><br> {!! nl2br($obj->personales_no_patologicos) !!} </p>    
  <p><strong>Antecedentes Persnolaes Patológicos:</strong><br><br> {!! nl2br($obj->personales_patologicos) !!} </p>    
  <p><strong>Musculo-Esquelético:</strong><br><br> {!! nl2br($obj->musculo_esqueletico) !!} </p>    
  <p><strong>Piel y Anexos:</strong><br><br> {!! nl2br($obj->piel_anexos) !!} </p>    
  <h4>Exploración Fisica</h4>
  <table class="linesTable w3-table">
      <thead>    
          <tr>
              <th>Peso Actual kg</th>
              <th>Presión Arterial <strong>mmHg</strong></th>
              <th>Temperatura <strong>°C</strong></th>
              <th>Frec. Respiratoria <strong>x minuto</strong></th>
              <th>Talla <strong>cm</strong></th>
              <th>Frecuencia Cardiaca <strong>x minuto</strong></th>
          </tr>        
      </thead>
      <tbody>
          <tr>
              <td>{{ $obj->peso }}</td>
              <td>{{ $obj->mm_hg }}</td>
              <td>{{ $obj->temperatura }}</td>
              <td>{{ $obj->frecuencia_respiratoria }}</td>
              <td>{{ $obj->frecuencia_cardiaca }}</td>
              <td>{{ $obj->talla }}</td>
          </tr>
      </tbody>
  </table>    

  <p><strong>Habitus Exterior:</strong><br><br> {!! nl2br($obj->habitus_exterior) !!} </p>    
  <p><strong>Cabeza:</strong><br><br> {!! nl2br($obj->cabeza) !!} </p>    
  <p><strong>Cuello:</strong><br><br> {!! nl2br($obj->cuello) !!} </p>    
  <p><strong>Tórax:</strong><br><br> {!! nl2br($obj->torax) !!} </p>    
  <p><strong>Abdomen:</strong><br><br> {!! nl2br($obj->abdomen) !!} </p>    
  <p><strong>Genitales:</strong><br><br> {!! nl2br($obj->genitales) !!} </p>    
  <h5>Interrogacón Por Aparatos y Sistemas</h5>
  <p><strong>Respiratorio:</strong><br><br> {!! nl2br($obj->respiratorio) !!} </p>    
  <p><strong>Cardiovascular:</strong><br><br> {!! nl2br($obj->cardiovascular) !!} </p>    
  <p><strong>Digestivo:</strong><br><br> {!! nl2br($obj->digestivo) !!} </p>    
  <p><strong>Urinario:</strong><br><br> {!! nl2br($obj->urinario) !!} </p>    
  <p><strong>Reproductor:</strong><br><br> {!! nl2br($obj->reproductor) !!} </p>    
  <p><strong>Hemolinfático:</strong><br><br> {!! nl2br($obj->hemolinfatico) !!} </p>    
  <p><strong>Endocrino:</strong><br><br> {!! nl2br($obj->endocrino) !!} </p>    
  <p><strong>Sistema Nervioso:</strong><br><br> {!! nl2br($obj->sistema_nervioso) !!} </p>    
  <p><strong>Exploración Ginecologica:</strong><br><br> {!! nl2br($obj->exploracion_ginecologica) !!} </p>    
  <p><strong>Columna Vertebral:</strong><br><br> {!! nl2br($obj->columna_vertebral) !!} </p>    
  <p><strong>Extremidades Superiores e Inferiores:</strong><br><br> {!! nl2br($obj->extremidades) !!} </p>    
  <p><strong>Exploración Neurologica:</strong><br><br> {!! nl2br($obj->exploracion_neurologica) !!} </p>            
   
  <p><strong>DIAGNOSTICO:</strong><br><br> {!! nl2br($obj->diagnostico) !!} </p>        
  <p><strong>PLAN:</strong><br><br> {!! nl2br($obj->plan) !!} </p>    
  </div>
</div>

    

   
@endsection

@section('scripts')