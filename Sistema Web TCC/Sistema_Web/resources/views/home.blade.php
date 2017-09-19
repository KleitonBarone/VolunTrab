@extends('layouts.app')

@section('titulo', 'Inicio - Voluntrab')

@section('content')
<!-- a fazer: pagina melhor -->
<div class="container z-depth-5">
        <br>
        <br>
        
        <div class="container">
    <div class="row center">
        <div class="col s12">
            <h2>Bem vindo ao Voluntrab</h2>
            <div class="divider"> </div>
        </div>
       
        <div class="row center">
        <div class="col s12">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('image/ajuda.jpg') }}">
              <span class="card-title">Ajuda</span>
            </div>
            <div class="card-content">
              <p>Se estiver perdido ou precisar de ajuda simplesmente clique abaixo e tenha suas
              duvidas solucionadas!</p>
            </div>
            <div class="card-action">
              <a class="blue-text" href="/ajuda">Clique aqui para obter ajuda!</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row center">
        <div class="col s12">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('image/sobre-nos.jpg') }}">
              <span class="card-title">Sobre o Projeto</span>
            </div>
            <div class="card-content">
              <p>Está curioso sobre como esse projeto foi feito? De uma olhada na pagina "Sobre Nos"</p>
            </div>
            <div class="card-action">
              <a class="blue-text" href="/sobre-nos">Clique aqui para saber mais sobre o Projeto!</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <br>
    <br>
    <br>
    </div>
    <br>
    <br>
    <br>
    <br>
        <br>
   </div>
@endsection
