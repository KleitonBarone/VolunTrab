<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Styles -->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

</head>
<body>
     <div class="navbar-fixed">
    <nav>
   <div class="nav-wrapper white">
   <div class="row">
         <div class="col s3 offset-s1">
            <a href="/home" class="brand-logo yellow-text"><img src="{{ asset('image/logo.png') }}" height="5%" width="5%"></a>
         </div>
      <ul id="nav-mobile" class="right">

@if (Auth::guest())
        <li><a href="{{ route('login') }}" class="waves-effect waves-yellow btn-flat">Login</a></li>
        <li> <a href="{{ route('register') }}" class="waves-effect waves-yellow btn-flat">Cadastro</a></li>
@else
<li>

<a class='dropdown-button waves-effect waves-yellow btn-flat' href='#' data-activates='dropdown1'>{{ Auth::user()->name }}</a>

 
  <ul id='dropdown1' class='dropdown-content'>


    <li><a class="black-text" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
  </ul>

@endif

      </ul>
      </div>
    </div> 
</nav>
</div>
<div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper yellow darken-3">

                <ul id="nav-mobile" class="left">
                    <li><a href="">Início</a></li>
                    @if (Auth::check())
                    <li>
       <a class="" href="{{route('users.show', Auth::user()->id )}}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('showuser-form').submit();">
                                            Meu Perfil
                                        </a>
        <form id="showuser-form" action="{{route('users.show', Auth::user()->id )}}" method="" style="display: none;">
        {{csrf_field()}}
        </form>

 </li>
                    <li><a class="" href="{{route('users.view', Auth::user()->id )}}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('showtrab-form').submit();">
                                            Trabalhos Participando
                                        </a>
        <form id="showtrab-form" action="{{route('users.view', Auth::user()->id )}}" method="" style="display: none;">
        {{csrf_field()}}
        </form></li>
        <li><a href="{{ route('voluntrabs.index') }}">Trabalhos Voluntários</a></li>
                    @endif
                    
                    
                    
                    
                </ul>
            </div>
            
        </nav>
</div>


    <div class="parallax-container">
      <div class="parallax"><img src="{{ asset('image/voluntariado.jpg') }}"></div>
    </div>

        @yield('content')
    

     <footer class="page-footer yellow darken-3">
          <div class="footer-copyright yellow darken-3">
            <div class="container">
            © 2017 VolunTrab.  Todos os Direitos Reservados.
            <a class="grey-text text-lighten-4 right" href="/home">Início</a>
            </div>
          </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.parallax').parallax();
    });
    </script>
</body>
</html>
