<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Voluntrab</title>

    <!-- Styles -->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">

</head>
<body>
 <div class="navbar-fixed">
    <nav>
   <div class="nav-wrapper light-blue lighten-1">
   <div class="row">
         <div class="col s3 offset-s1">
            <a href="/home" class="brand-logo yellow-text"><img src="{{ asset('image/logo2.png') }}" height="55" width="50"></a>
         </div>
      <ul id="nav-mobile" class="right">


        <li><a href="{{ route('home') }}" class="waves-effect waves-blue btn-flat">Entrar no Site</a></li>


      </ul>
      </div>
    </div> 
</nav>
</div>
<div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="{{ asset('image/imagem1.jpg') }}">
        <div class="caption center-align">
          <div class="card-panel">
          <h3 class="white-text center-align">Voluntrab</h3>
          <h5 class="light white-text text-lighten-3">Ajudando você a ajudar os outros!</h5></div><br /> <br /> <br /> <br /> <br /> <br /> <br />
          <a href="{{ route('home') }}" class="waves-effect waves-blue btn-large btn btn-primary blue darken-2">Entre no site</a>
        </div>
      </li>
      <li>
        <img src="{{ asset('image/imagem2.jpeg') }}"> 
        <div class="caption center-align">
          <div class="card-panel">
          <h3 class="black-text">Seja um Voluntário</h3>
          <h5 class="light black-text ">Ajude as pessoas a serem felizes!</h5></div><br /> <br /> <br /> <br /> <br /> <br /> <br />
          <a href="{{ route('home') }}" class="waves-effect waves-blue btn-large btn btn-primary blue darken-2">Entre no site</a>
        </div>
      </li>
      <li>
        <img src="{{ asset('image/imagem3.jpg') }}"> 
        <div class="caption center-align">
          <div class="card-panel">
          <h3 class="black-text">Cadastre sua Instituição</h3>
          <h5 class="light black-text ">Peça ajuda e alcançe a todos!</h5></div> <br /> <br /> <br /> <br /> <br /> <br /> <br />
          <a href="{{ route('home') }}" class="waves-effect waves-blue btn-large btn btn-primary blue darken-2">Entre no site</a>
        </div>
      </li>
      <li>
        <img src="{{ asset('image/imagem4.jpg') }}"> 
        <div class="caption center-align">
          <div class="card-panel">
          <h3 class="white-text">Começe já!</h3>
          <h5 class="light white-text text-lighten-3">Você pode começar a usar o Voluntrab agora mesmo!</h5></div> <br /> <br /> <br /> <br /> <br /> <br /> <br />
          <a href="{{ route('home') }}" class="waves-effect waves-blue btn-large btn btn-primary blue darken-2">Entre no site</a>
        </div>
      </li>
    </ul>
  </div>

<br /><br /><br /><br /><br />
  <div class="parallax-container">
  </div>
<br /><br /><br /><br /> <br /><br />
<br /><br /><br /><br /> <br /><br />

    <div class="section white">
      <div class="row container">
        <div class="col s12">
          <h3 class="center">
            <img height="20%" width="20%" src="{{ asset('image/o-que-e.png') }}">
          </h3>
          <h3 class="center">O que é?</h3>
          <br />
          <h5 class="center black-text text-darken-3 lighten-3">
            Com o Voluntrab você pode facilmente encontrar e participar de projetos voluntários,
            ou seja, sem mais perder tempo procurando e tendo que preparar papeis! Com Voluntrab 
            você vai direto ao assunto: Ajudar as pessoas!
          </h5>
        </div>
    </div>
  </div>

<div class="parallax-container">
      <div class="parallax">
        <img src="{{ asset('image/imagem-parallax.jpg') }}">
      </div>
</div>

<div class="section white">
  <div class="row container">
    <h2 class="header center"></h2>
      <div class="col s4">
        <h1 class="center yellow-text">
          <img height="50%" width="50%" src="{{ asset('image/rapido.png') }}">
        </h1>
        <h4 class="center">Rápido</h4>
        <br />

        <p class="black-text text-darken-3 lighten-3">
          O Voluntrab foi criado para você conseguir se cadastrar 
          rapidamente e começar a usar o sistema, assim ajudando
          as pessoas!
        </p>

      </div>
      <div class="col s4">
          <h1 class="center yellow-text">
            <img height="50%" width="50%" src="{{ asset('image/facil.png') }}">
          </h1>
       <h4 class="center">Fácil</h4>
       <br />
        <p class="black-text text-darken-3 lighten-3">
          O Design facil de se utilizar torna tudo mais fácil, assim, mesmo
          nao tendo conhecimento sobre computadores, é possivel usar e ajudar os outros!
        </p>
      </div>
      <div class="col s4">
        <h1 class="center yellow-text">
          <img height="50%" width="50%" src="{{ asset('image/suba-de-nivel.png') }}">
        </h1>
        <h4 class="center">Complete Conquistas</h4>
        <br />
        <p class="black-text text-darken-3 lighten-3">
          Ao utilizar o sistema é possivel completar conquistas, e então além de ajudar os outros
          e fazer o bem, você vai ser reconhecido por isso!
        </p>
      </div>
    </div>
</div>


    <div class="parallax-container">
      <div class="parallax">
        <img src="{{ asset('image/imagem-parallax3.jpg') }}">
      </div>
    </div>

    <footer class="page-footer light-blue lighten-1">
        <div class="footer-copyright light-blue lighten-2">
          <div class="container">
          © 2017 VolunTrab.  Todos os Direitos Reservados.
          </div>
        </div>
  </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script>
    $(document).ready(function(){
      $('.parallax').parallax();
    });
    </script>
    <script>
        $(document).ready(function(){
      $('.slider').slider();
    });
    </script>
</body>
</html>