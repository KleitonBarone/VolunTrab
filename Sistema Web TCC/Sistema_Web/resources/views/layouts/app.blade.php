<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->

    <title>@yield('titulo')</title>

    <!-- Styles -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
    <!-- Fim dos Styles -->

</head>

<body>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script>
    $(document).ready(function(){
      $('.parallax').parallax();
    });
    </script>
    <!-- Fim dos Scripts -->


    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white">
                <div class="row">
                    <div class="col s3 offset-s1">
                        <a href="/home" class="brand-logo yellow-text"><img src="{{ asset('image/logo2.png') }}" height="55" width="50"></a>
                    </div>
                        <ul id="nav-mobile" class="right">

                        @if (Auth::guest())

                        <li><a href="{{ route('login') }}" class="waves-effect waves-blue btn-flat">Login</a></li>
                        <li> <a href="{{ route('register') }}" class="waves-effect waves-blue btn-flat">Cadastro</a></li>

                        @else

                        <li>
                            <img src="{{ asset('avatars/' . Auth::user()->avatar) }}" width="60" height="60" class="circle" style="">
                        </li>

                        <li>

                            <a class='dropdown-button waves-effect waves-blue btn-flat' href='#' data-activates='dropdown1'>
                            {{ Auth::user()->name }}
                            </a>

                            <ul id='dropdown1' class='dropdown-content'>

                                <li>
                                    <a class="black-text" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>

                        </li>
                        @endif

                        </ul>
                </div>
            </div> 
        </nav>
    </div>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper light-blue lighten-1">

                <ul id="nav-mobile" class="left">

                    <li class="@yield('inicio')"><a href="/home">Início</a></li>

                    @if (Auth::check())

                    <li class="@yield('perfil')">

                        <a class="" href="{{route('users.show', Auth::user()->id )}}"
                        onclick="event.preventDefault();
                        document.getElementById('showuser-form').submit();">
                            Meu Perfil
                        </a>    
                        <form id="showuser-form" action="{{route('users.show', Auth::user()->id )}}" method="" style="display: none;">
                            {{csrf_field()}}
                        </form>

                    </li>

                    <li class="@yield('trabrelacionado')">

                        <a class="" href="{{route('users.view', Auth::user()->id )}}"
                        onclick="event.preventDefault();
                        document.getElementById('showtrab-form').submit();">
                            @if (Auth::user()->tipo == 1 )
                            Trabalhos Participando
                            @else
                            Trabalhos Requisitados
                            @endif
                        </a>
                        <form id="showtrab-form" action="{{route('users.view', Auth::user()->id )}}" method="" style="display: none;">
                            {{csrf_field()}}
                        </form>

                    </li>

                    <li class="@yield('trabalhos')">
                    
                    <a href="{{ route('voluntrabs.index') }}">Trabalhos Voluntários</a>
                    
                    </li>

                    @endif
                    
                    <li class="@yield('ajuda')">
                    
                    <a href="/ajuda">Ajuda</a>
                    
                    </li>

                    <li class="@yield('sobre')">
                    
                    <a href="/sobre-nos">Sobre a Equipe</a>
                    
                    </li>
                
                </ul>
            </div>
            
        </nav>
</div>


        @yield('content')
    

<footer class="page-footer light-blue lighten-1">
    <div class="footer-copyright light-blue lighten-2">
        <div class="container">

            © 2017 VolunTrab.  Todos os Direitos Reservados.

        <a class="grey-text text-lighten-4 right" href="/home">Início</a>

        </div>
    </div>
</footer>

</body>
</html>
