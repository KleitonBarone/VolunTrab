<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
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

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

    
    <nav>
   <div class="nav-wrapper white">
   <div class="row">
         <div class="col s3 offset-s1">
            <a href="/home" class="brand-logo yellow-text text-darken-2">VolunTrab</a>
         </div>
      <ul id="nav-mobile" class="right">

@if (Auth::guest())
        <li><a href="/logar" class="waves-effect waves-light yellow btn">Login</a></li>
        <li> <a href="{{ route('register') }}" class="waves-effect waves-light yellow btn">Cadastro</a></li>
@elseif (Auth::guest('user'))
<li>

<a class='dropdown-button btn yellow' href='#' data-activates='dropdown1'>{{ Auth::user()->name }}</a>

 
  <ul id='dropdown1' class='dropdown-content'>
    <li><a class="blue-text" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
  </ul>


 </li>
 @else 
 <li>

<a class='dropdown-button btn yellow' href='#' data-activates='dropdown1'>{{ Auth()->guard('instituicao')->user()->name }}</a>

 
  <ul id='dropdown1' class='dropdown-content'>
    <li><a class="blue-text" href="{{  url('/instituicaos/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
  </ul>


 </li>
@endif

      </ul>
      </div>
    </div> 
</nav>


        <nav>
            <div class="nav-wrapper yellow darken-2">

                <ul id="nav-mobile" class="left">
                  <li><a href="">Home</a></li>
                    <li><a href="">Ajuda</a></li>
                    <li><a href="">Instituições</a></li>
                    <li><a href="">Doações</a></li>
                    <li><a href="">Nossa Equipe</a></li>
                    
                </ul>
            </div>
            
        </nav>

 @yield('conteudo')

  <footer class="page-footer yellow darken-2">
    <div class="footer-copyright yellow darken-3">
      <div class="container">
      © 2017 VolunTrab.  Todos os Direitos Reservados.
      <a class="grey-text text-lighten-4 right" href="">Início</a>
      </div>
    </div>
</footer>

</body>
</html>
