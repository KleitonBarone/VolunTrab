@extends('layouts.app')

@section('titulo', 'Painel de Controle - Voluntrab')

@section('admin', 'active')

@section('content')
    <div class="container z-depth-5">
        <br />
        <div class="container">
            <h2 class="center">Painel de Controle</h2>
            <br /> <br />
        <!-- Card de User -->
        <div class="row">

        
        <div class="col s12 m6 l3">
        <a href="{{ route('admin.user') }}">
        
          <div class="card">

            <div class="card-image">
              <img src="{{ asset('icons/usuario.png') }}">
              <span class="card-title black-text hide-on-med-and-down" style="padding: 5px; margin-bottom:3%; margin-left: 18%;">Usuarios</span>
            </div>
            
          </div>
        
        </a>
        </div>

        <a href="{{ route('admin.doacao') }}">
        <div class="col s12 m6 l3">
          <div class="card">

            <div class="card-image">
              <img src="{{ asset('icons/doacao.png') }}">
              <span class="card-title black-text hide-on-med-and-down" style="padding: 5px; margin-bottom:3%; margin-left: 20%;">Doacao</span>
            </div>
            
          </div>
        </div>
        </a>

        <a href="{{ route('admin.voluntrab') }}">
        <div class="col s12 m6 l3">
          <div class="card">

            <div class="card-image">
              <img src="{{ asset('icons/voluntrab.png') }}">
              <span class="card-title black-text hide-on-med-and-down" style="padding: 5px; margin-bottom:3%; margin-left: 15%;">Voluntrab</span>
            </div>
            
          </div>
        </div>
        </a>

        <a href="{{ route('admin.denuncia') }}">
        <div class="col s12 m6 l3">
          <div class="card">

            <div class="card-image">
              <img src="{{ asset('icons/denuncia.png') }}">
              <span class="card-title black-text hide-on-med-and-down" style="padding: 5px; margin-bottom:3%; margin-left: 16%;">Denuncia</span>
            </div>
            
          </div>
        </div>
        </a>

      


      </div>


        </div>
        <br /> <br /> <br /> <br /> <br /> <br /><br />
        <br /> <br /> <br /> <br /> <br /> <br /><br />
        <br /> <br /> <br />
    </div>
@endsection