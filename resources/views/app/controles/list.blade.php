@extends('blades.app')

@section('title', 'Controles')

@section('css')
@endsection

@section('content')

    <h5>Controles / Lista</h5>
    <a href="{{ url('app/control/crear') }}"><button class="btn orange">Crear Control</button></a>

    <form method="GET" class="navbar-form">
        <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input name="term" type="search" value="{{ request('term')}}" class="form-control" autofocus>
            <label>Buscar Control</label>
        </div>
   </form> 

   <table class="striped responsive-table">
        <thead>            
            <th>Paciente</th>            
            <th>Doctor</th>            
            <th>Fecha</th>                                
            <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($objects as $n)
        
        <tr id="id{{$n->id}}">            
            <td><a href="{{ url('app/pacientes/ver', $n->paciente_id) }}"> {{ $n->paciente->fullname() }} </a></td>
            <td>{{ $n->medico->fullname() }}</td>
            <td>{{ $n->created_at }}</td>                        
            <td>                
                <a href="{{ url('app/control/editar/'.$n->id.'') }}" class="btn blue">Editar </a>
                <a href="{{ url('app/control/ver', $n->id) }}" class="btn green">Ver</a>
                <a  onclick="eliminar({{ $n->id }}, '{{ $n->name }}')" class="btn red"> Eliminar</a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
    </table>

    {{ $objects->links() }}
    
@endsection

@section('scripts')

@endsection