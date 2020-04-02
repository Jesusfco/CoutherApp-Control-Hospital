@extends('blades.visitor')

@section('title', 'Recuperar Contraseña')

@section('css')

    
    
    <link href="{{ asset('css/visitor/login.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('scripts')
    
@endsection

@section('content')

<div class="spaceLogin container">


        <div class="container2 loginCard card">  
            <div class="container">
                <br><br>
                <h4 class="text-center">¿Olvidaste tu contraseña? </h4>

                
                @if (session('success'))
                    <div class="alert alert-success">
                        El correo de Recuperación ha sido enviado
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Escribe tu correo</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="juan@gmail.com" required autofocus>

                            @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>Correo Inexistente</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary">
                                Recuperar contraseña
                            </button>
                        </div>
                    </div>
                    
                    <p class="right">
                        <a class="forget-link" href="{{ url('/') }}">
                            Iniciar sesión
                        </a>
                        </p>
                    <br>
                </form>
                <br><br>
            </div>
        </div>
</div>
@endsection
