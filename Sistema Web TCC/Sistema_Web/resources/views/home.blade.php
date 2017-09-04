@extends('layouts.app')

@section('content')
<!-- a fazer: pagina melhor -->

        <div class="container">
    <div class="row center">
        <div class="col s12">
            <h2>Bem vindo ao Voluntrab</h2>
            <div class="divider"> </div>
        </div>
    </div>
<div class="row">
    <div class="col s12">
        @if (Auth::guest())
        <h1>Você nao está logado!</h1>
        @elseif (Auth::user()->tipo == 1)
        <h1>Você está logado como Volutário!</h1>
        <h3>Essas são suas Informações:</h3>
        <ul>
            <li>Nome:<strong>{{ Auth::user()->name }}</strong></li>
            <li>Email:<strong>{{ Auth::user()->email }}</strong></li>
            <li>Data de Nascimento:<strong>{{ Auth::user()->datanasc }}</strong></li>
            <li>Telefone:<strong>{{ Auth::user()->tel }}</strong></li>
        </ul>
        @else
        <h1>Você está logado como Instituição</h1>
                <h3>Essas são suas Informações:</h3>
        <ul>
            <li>Nome:<strong>{{ Auth::user()->name }}</strong></li>
            <li>Email:<strong>{{ Auth::user()->email }}</strong></li>
            <li>Telefone:<strong>{{ Auth::user()->tel }}</strong></li>
        </ul>
        @endif
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
   
@endsection
