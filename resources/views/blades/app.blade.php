<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') || Administración || Expediente Clinico</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/materialize/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/admin/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('assets/sweet/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css">
    @yield('css')

    <style>
      .flex {
        display: flex;
      }

.container2 {
    width: 90%; margin: 0 auto;
}
      .panelNav {
        width: 200px;
        height: 100vh;
        position: fixed
      }
      .panelNavFake {
        width: 200px;
        height: 100vh;
      }

      .navLinks a{ color: white !important}
      .navLinks li {margin-bottom: 10px; font-size: 20px}

      .authData { position: absolute; bottom: 30px; left: 20px; width:  240px; color: white}
      .authData p { margin: 4px}
    </style>
</head>
<body> 
<div id="app">

  <div class="panelNav blue darken-4 lighten-1 ">

    <div class="container2">
    <h5 class="white-text">Aplicación</h5>                  <br><br>
    <ul class="navLinks">
      {{-- <li><a href="{{ url('app') }}">Inicio</a></li> --}}
      @if(Auth::user()->user_type > 2)
      <li><a href="{{ url('app/usuarios') }}">Usuarios</a></li>
      @endif
      
      <li><a href="{{ url('app/pacientes') }}">Pacientes</a></li>
      <li><a href="{{ url('app/control') }}">Control</a></li>
      <li><a href="{{ url('app/antecedentes') }}">Antecedentes</a></li>
      <li><a href="{{ url('app/analisis') }}">Análisis</a></li>
      
      {{-- <li><a href="{{ url('app/perfil') }}">Mi Perfil</a></li> --}}
      <li><a href="{{ url('logout') }}">Cerrar Sesión</a></li>
    </ul>
    </div>

      <div class="authData container">
        <p>{{ Auth::user()->fullname() }}</p>
        @if(Auth::user()->user_type == 2)
        <p>{{ Auth::user()->cedula }}</p>
        @endif                    
        <p>{{ Auth::user()->type() }}</p>
      </div>
  </div>

    <div class="flex "> 
                
      <div class="panelNavFake"></div>                

      <div class="container">
        <div class="card" style="padding: 12px; margin-top: 40px; min-height: 88vh">
          @yield('content')
        </div>
      </div>
    </div>
    
    <br> 

</div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js" ></script>      
    {{-- OPTIMIZADO VUE --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
    {{-- <script src="{{ asset('assets/materialize/materialize.js') }}"></script>     --}}
    <script src="{{ asset('assets/sweet/sweetalert.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>

      (function($){
        $(function(){

          $('.sidenav').sidenav();

        }); // end of document ready
      })(jQuery); // end of jQuery name space


      const actualUrl = "{{ url()->current() }}"

          $(document).ready(function(){
            $('select').formSelect();
            $('.fixed-action-btn').floatingActionButton();
            $('.tooltipped').tooltip();
          })
           
           @if(session('msj'))    
               M.toast({html: '{{session('msj')}}', displayLength: 5000})        
           @endif

           @if(session('error'))    
               M.toast({html: '{{session('error')}}', classes: 'red', displayLength: 6500})        
           @endif
           @if(session('success'))    
               M.toast({html: '{{session('success')}}', classes: 'green', displayLength: 6500})        
           @endif
    </script>
    @yield('scripts')
    

</body>
</html>
