@extends('blades.app')

@section('title', 'Antecedentes')

@section('css')
@endsection

@section('content')

    <h5>Expedientes  / Lista</h5>
    {{-- @if(Auth::user()->user_type == 2) --}}
    <a href="{{ url('app/antecedentes/create') }}"><button class="btn orange">Crear Expediente Clínico</button></a>
    {{-- @endif --}}
    <form method="GET" class="navbar-form row">
        <div class="input-field col l8">
            <i class="material-icons prefix">search</i>
            <input name="term" type="search" value="{{ request('term')}}" class="form-control" autofocus>
            <label>Buscar Termino</label>
        </div>
        <div class="form-group col l2">
            <label>Tipo de Busqueda</label>
            <select name="search_type" class="browser-default">        
               
              <option value="1" @if( request('search_type') == 1) selected @endif>Paciente</option>        
              <option value="2" @if( request('search_type') == 2) selected @endif>Doctor</option>
              
            </select>
        </div>
        <div class="col l2">
            <br>            
            <button class="btn blue">Buscar</button>            
        </div>
   </form> 

   <table class="striped responsive-table">
        <thead>          
            <th>No. Expediente</th>                                
            <th>No. Folio</th>   
            <th>Paciente</th>            
            <th>Doctor</th>            
            <th>Fecha</th>                                
            <th>Hora</th>                                
            <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($objects as $n)
        
        <tr id="id{{$n->id}}">       
            <td>{{ $n->id }}</td>
            <td>{{ $n->paciente->no_folio }}</td>       
            <td><a href="{{ url('app/pacientes/ver', $n->paciente_id) }}"> {{ $n->paciente->nombre_completo }} </a></td>
            <td>{{ $n->medico->nombre_completo }}</td>
            <td>{{ $n->getFechaFormat() }}</td>                        
            <td>{{ $n->getHourFormat() }} HRS</td>                        
            <td>               
                {{-- <a href="{{ url('app/antecedentes/', $n->id) }}" class="btn green">Ver</a> --}}
                <a href="{{ url('app/antecedentes/'. $n->id . "/pdf") }}" class="btn orange">PDF</a>
                
                @if(Auth::user()->user_type  > 2) 
                <a href="{{ url('app/antecedentes/'.$n->id.'/edit') }}" class="btn blue">Editar </a>                
                <a onclick="eliminar({{ $n->id }}, '{{ $n->name }}')" class="btn red"> Eliminar</a>
                @endif
            </td>
        </tr>
        
        @endforeach
    </tbody>
    </table>

    {{ $objects->links() }}
    
@endsection

@section('scripts')

@endsection