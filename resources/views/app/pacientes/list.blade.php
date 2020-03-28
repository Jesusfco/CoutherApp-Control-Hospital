@extends('blades.app')

@section('title', 'Pacientes')

@section('css')
@endsection

@section('content')

<h5>Pacientes / Lista</h5>
<a href="{{ url('app/pacientes/crear') }}"><button class="btn orange">Crear Paciente</button></a>

<form method="GET" class="navbar-form">
        <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input name="term" type="search" value="{{ request('term')}}" class="form-control" autofocus>
            <label>Buscar Paciente</label>
        </div>
   </form> 

   <table class="striped responsive-table">
        <thead>
            {{-- <th>ID</th> --}}
            <th>Nombre</th>            
            <th>Correo</th>            
            <th>Curp</th>                     
            <th>Edad</th>            
            <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($objects as $n)
        
        <tr id="id{{$n->id}}">            
            <td>{{ $n->fullname() }}</td>
            <td>{{ $n->email }}</td>
            <td>{{ $n->curp }}</td>            
            <td>{{ $n->edad() }}</td>                                    
            <td>{{ $n->status }}</td>                                    
            <td>
                
                <a href="{{ url('app/pacientes/editar/'.$n->id.'') }}" class="btn blue">Editar </a>
                <a href="{{ url('app/pacientes/ver', $n->id) }}" class="btn green">Ver</a>
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