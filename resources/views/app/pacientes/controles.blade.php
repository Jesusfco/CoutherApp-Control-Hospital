@extends('blades.app')

@section('title', $user->fullname() . ' Controles')

@section('css')
@endsection

@section('content')


<h5><a href="{{ url('app/pacientes') }}">Pacientes </a> / 
    <a href="{{ url('app/pacientes/ver', $user->id)}}">{{ $user->fullname() }}</a>
    / Controles
</h5>



    @if(Auth::user()->user_type == 2)
        <a href="{{ url('app/control/crear') }}"><button class="btn orange">Crear Control</button></a>
    @endif
    
   <table class="striped responsive-table">
        <thead>            
            
            <th>Médico</th>            
            <th>Fecha</th>                                
            <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($controles as $n)
        
        <tr id="id{{$n->id}}">            
            
            <td>{{ $n->medico->fullname() }}</td>
            <td>{{ $n->getFechaFormat() }}</td>                        
            <td>                
                <a href="{{ url('app/control/editar/'.$n->id.'') }}" class="btn blue">Editar </a>
                <a href="{{ url('app/control/ver', $n->id) }}" class="btn green">Ver</a>
                
            </td>
        </tr>
        
        @endforeach
    </tbody>
    </table>

    {{ $controles->links() }}
    
@endsection

@section('scripts')

@endsection