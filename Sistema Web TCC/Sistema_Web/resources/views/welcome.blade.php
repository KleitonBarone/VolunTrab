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


        <li><a href="{{ route('home') }}" class="waves-effect waves-yellow btn-flat">Entrar no Site</a></li>


      </ul>
      </div>
    </div> 
</nav>
</div>
<div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>Voluntrab</h3>
          <h5 class="light grey-text text-lighten-3">O Bubba é daora</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>

 <div class="parallax-container">
      <div class="parallax">
      
      <img src="{{ asset('image/bubba.jpg') }}">

      </div>
    </div>
     <div class="section white">
    <div class="row container">
      <h2 class="header">Voluntrab é daora</h2>
      <p class="grey-text text-darken-3 lighten-3">lorum ipsun fegital</p>
    </div>
  </div>
<div class="parallax-container">
      <div class="parallax">
      
      <img src="{{ asset('image/bubba.jpg') }}">

      </div>
    </div>
<div class="section white">
    <div class="row container">
      <h2 class="header">HIIII</h2>
      <p class="grey-text text-darken-3 lighten-3">fon</p>
    </div>
  </div>
<div class="parallax-container">
      <div class="parallax">
      
      <img src="{{ asset('image/bubba.jpg') }}">

      </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
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