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



        <!--<nav class="blue darken-4 lighten-1" role="navigation">
                <div class="nav-wrapper container">
                  <a id="logo-container" href="{{ url('')}}" class="brand-logo">
                    <h5>COUTHER</h5>
                    {{-- <img src="{{ url('img/logo2.png')}}" height="63px;"> --}}
                  </a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('app') }}">Inicio</a></li>
                    @if(Auth::user()->user_type > 2)
                    <li><a href="{{ url('app/usuarios') }}">Usuarios</a></li>
                    @endif
                    <li><a href="{{ url('app/pacientes') }}">Pacientes</a></li>
                    <li><a href="{{ url('app/control') }}">Control</a></li>
                    
                    {{-- <li><a href="{{ url('app/perfil') }}">Mi Perfil</a></li> --}}
                    <li><a href="{{ url('logout') }}">Cerrar Sesión</a></li>
                  </ul>
            
                  <ul id="nav-mobile" class="sidenav">
                    <li><h4 class="black-color">Locales Abuela</h4></li>
                    <li><a href="{{ url('app') }}">Inicio</a></li>
                    @if(Auth::user()->user_type >= 9)
                    <li><a href="{{ url('app/usuarios') }}">Usuarios</a></li>
                    @endif
                    <li><a href="{{ url('app/recibos') }}">Recibos</a></li>
                    <li><a href="{{ url('app/locales') }}">Locales</a></li>
                    <li><a href="{{ url('app/negocios') }}">Negocios</a></li>
                    <li><a href="{{ url('app/perfil') }}">Mi Perfil</a></li>
                    <li><a href="{{ url('logout') }}">Cerrar Sesión</a></li>
                  </ul>
                  <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>
              </nav>

            -->

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

    

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    {{-- OPTIMIZADO VUE --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
    <script src="{{ asset('assets/materialize/materialize.js') }}"></script>    
    <script src="{{ asset('assets/sweet/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/delete.js')}}"></script>
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
