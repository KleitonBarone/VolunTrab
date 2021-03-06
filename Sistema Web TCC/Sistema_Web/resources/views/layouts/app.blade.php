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
    <!-- Fim dos Scripts -->


    

    <div class="navbar">
        <nav>
            <div class="nav-wrapper light-blue lighten-1">

               
                <a href="/home" class="brand-logo right hide-on-med-and-down" style="margin-right: 25%;"><img src="{{ asset('image/logo2.png') }}" height="55" width="50"></a>
                
                <a href="/home" class="brand-logo hide-on-large-only" style="margin-right: 25%;"><img src="{{ asset('image/logo2.png') }}" height="55" width="50"></a>

                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

                <!--menu lateral -->
                <ul class="side-nav" id="mobile-demo">

                        
                     @if (Auth::guest())

                        <li><a href="{{ route('login') }}" class="waves-effect waves-blue btn-flat">Login</a></li>
                        <li> <a href="{{ route('register') }}" class="waves-effect waves-blue btn-flat">Cadastro</a></li>

                    @else

                    <li>

                            <a class='dropdown-button waves-effect waves-blue btn-flat' href='#' data-activates='dropdown1'>
                            {{ Auth::user()->name }}
                            </a>

                            

                                <li>
                                    <a class="black-text" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Sair da Conta
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <ul id='dropdown1' class='dropdown-content'>
                            </ul>

                            

                        </li>
                        
                        
                        <li class="@yield('inicio')"><a href="/home">Início</a></li>

                        @if (Auth::user()->tipo == 3)
                            <li class="@yield('admin')">
                                <a href="{{route('admin.index')}}">Painel de Controle</a>
                            </li>
                        @endif
                        
                        @if (Auth::user()->tipo != 3)
                        <li>
                            <a href="{{route('conquistas.index')}}">Conquistas</a>
                        </li>
                        @endif

                        @endif
                        

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

                    @if (Auth::user()->tipo != 3)
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header">Trabalhos Voluntários<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                            <ul>

                    <li class="@yield('trabalhos')">
                    
                    <a href="{{ route('voluntrabs.index') }}">Trabalhos Voluntários</a>
                    
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
                            </ul>
                            </div>
                        </li>
                    </ul>

                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header">Doações<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                            <ul>

                    <li class="@yield('doacaos')">
                    
                    <a href="{{ route('doacaos.index') }}">Doações</a>
                    
                    </li>

                    <li class="@yield('doacaorelacionado')">

                        <a class="" href="{{route('doacaos.view', Auth::user()->id )}}"
                        onclick="event.preventDefault();
                        document.getElementById('showdoacao-form').submit();">
                            @if (Auth::user()->tipo == 1 )
                            Doações Participando
                            @else
                            Doações Requisitadas
                            @endif
                        </a>
                        <form id="showdoacao-form" action="{{route('doacaos.view', Auth::user()->id )}}" method="" style="display: none;">
                            {{csrf_field()}}
                        </form>

                    </li>
                            </ul>
                            </div>
                        </li>
                    </ul>
                    @endif
                    


                    @endif

                    <li class="@yield('ajuda')">
                    
                    <a href="/ajuda">Ajuda</a>
                    
                    </li>

                    <li class="@yield('sobre')">
                    
                    <a href="/sobre-nos">Sobre a Equipe</a>
                    
                    </li>

                
                </ul>

                <ul id="nav-mobile" class="left hide-on-med-and-down">

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

                    @if (Auth::user()->tipo != 3)
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Trabalhos Voluntários<i class="material-icons right">arrow_drop_down</i></a></li>

                    <ul id="dropdown2" class="dropdown-content" >

                    <li class="@yield('trabalhos')">
                    
                    <a href="{{ route('voluntrabs.index') }}">Trabalhos Voluntários</a>
                    
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

                    </ul>

                    <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Doações<i class="material-icons right">arrow_drop_down</i></a></li>

                    <ul id="dropdown3" class="dropdown-content">

                    <li class="@yield('doacaos')">
                    
                    <a href="{{ route('doacaos.index') }}">Doações</a>
                    
                    </li>

                    <li class="@yield('doacaorelacionado')">

                        <a class="" href="{{route('doacaos.view', Auth::user()->id )}}"
                        onclick="event.preventDefault();
                        document.getElementById('showdoacao-form').submit();">
                            @if (Auth::user()->tipo == 1 )
                            Doações Participando
                            @else
                            Doações Requisitadas
                            @endif
                        </a>
                        <form id="showdoacao-form" action="{{route('doacaos.view', Auth::user()->id )}}" method="" style="display: none;">
                            {{csrf_field()}}
                        </form>

                    </li>

                    </ul>

                    <li>
                        <a href="{{route('conquistas.index')}}">Conquistas</a>
                    </li>
                    
                        @else
                        <li class="@yield('admin')">
                            <a href="{{route('admin.index')}}">Painel de Controle</a>
                        </li>
                        @endif
                    


                    @endif

                    <li class="@yield('ajuda')">
                    
                    <a href="/ajuda">Ajuda</a>
                    
                    </li>

                    <li class="@yield('sobre')">
                    
                    <a href="/sobre-nos">Sobre a Equipe</a>
                    
                    </li>
                
                </ul>

                <ul id="nav-mobile" class="right hide-on-med-and-down">

                        @if (Auth::guest())

                        <li><a href="{{ route('login') }}" class="waves-effect waves-blue btn-flat">Login</a></li>
                        <li> <a href="{{ route('register') }}" class="waves-effect waves-blue btn-flat">Cadastro</a></li>

                        @else

                        <li>
                            <img src="{{ asset('avatars/' . Auth::user()->avatar) }}" width="60" height="60" class="circle" style="">
                        </li>

                        <li>
                            <a class='dropdown-button' href='#' data-activates='dropdown10'>
                            {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>

                            <ul id='dropdown10' class='dropdown-content'>

                                

                                

                                <li>
                                    <a class="red-text darken-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>

                        
                        @endif

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

<script>
    $(document).ready(function(){
        $(".button-collapse").sideNav();
      $('.parallax').parallax();
      $(".dropdown-button").dropdown();
      
    });
    </script>

</body>
</html>
