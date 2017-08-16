@extends('layouts.app')

@section('titulo', 'Home - Voluntrab')

@section('conteudo')
<div class="container">
<h1 class="center">Bem Vindo!</h1>
<div class="parallax-container">
      <div class="parallax"><img src="images/parallax1.jpg"></div>
    </div>
    <div class="row">
        <div class="col s12">
          <div class="card medium">
            <div class="card-image">
              <img src="images/sample-1.jpg">
              <span class="card-title">O que é Trabalho Voluntário?</span>
            </div>
            <div class="card-content">
              <p>Vonluntario é importante.</p>
            </div>
            <div class="card-action">
              <a href="#">Saiba Mais</a>
            </div>
          </div>
        </div>
      </div>
</div>
<script>
$(document).ready(function(){
      $('.parallax').parallax();
    });
        
</script>
@endsection
