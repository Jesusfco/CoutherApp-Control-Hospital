@extends('blades.app')

@section('title', 'Usuarios')

@section('css')
@endsection

@section('content')

<h5>Usuarios / Lista</h5>
<a href="{{ url('app/usuarios/crear') }}"><button class="btn orange">Crear Usuario</button></a>

<form method="GET" class="navbar-form">
        <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input name="term" type="search" value="{{ request('term')}}" class="form-control" autofocus>
            <label>Buscar Usuario</label>
        </div>
   </form> 

   <table class="striped responsive-table">
        <thead>
            {{-- <th>ID</th> --}}
            <th>Nombre</th>            
            <th>Correo</th>            
            <th>Curp</th>
            <th>Tipo</th>            
            <th>Especialidad</th>            
            <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($objects as $n)
        
        <tr id="id{{$n->id}}">            
            <td>{{ $n->fullname() }}</td>
            <td>{{ $n->email }}</td>
            <td>{{ $n->curp }}</td>            
            <td>{{ $n->type() }}</td>            
            <td>{{ $n->especialidad }}</td>
            
            <td>
                
                <a href="{{ url('app/usuarios/editar/'.$n->id.'') }}" class="btn blue">Editar </a>
                <a href="{{ url('app/usuarios/ver', $n->id) }}" class="btn green">Ver</a>
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