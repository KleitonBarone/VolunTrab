@extends('layouts.app')

@section('titulo', 'Ver Perfil - Voluntrab')

@section('content')
<!-- a fazer: pagina melhor -->

        <div class="container">
    <div class="row center">
        <div class="col s12">
            <h2>Perfil de {{$user->name}}</h2>
            @if (Auth::user()->id == $user->id)
                <a class="btn btn-primary" href="{{route('users.edit', $user->id )}}">
                        Editar Perfil
                </a>
                <br>
                <br>
            @endif
            <div class="divider"> </div>
        </div>
    </div>
<div class="row">
    <div class="col s12">
      <h4 class="center">Este usuario é @if($user->tipo == 1) um Voluntário! @else uma Instiuição! @endif </h4>
      <br>
      <h5>Essas são suas Informações:</h5>
        Imagem de Perfil:<br>
        <div class="center" >
        <img src="{{ asset('avatars/' . $user->avatar) }}" class="circle materialboxed" width="50%" height="50%" >
        </div>
        <ul>
        @if($user->tipo == 1)
            <li>Nome:<strong> {{ $user->name }}</strong></li>
            <li>Email:<strong> {{ $user->email }}</strong></li>
            <li>Data de Nascimento:<strong> {{ $user->datanasc }}</strong></li>
            <li>Telefone:<strong> {{ $user->tel }}</strong></li>
        @else
            <li>Nome da Instituição:<strong> {{ $user->name }}</strong></li>
            <li>Email:<strong> {{ $user->email }}</strong></li>
            <li>Telefone:<strong> {{ $user->tel }}</strong></li>
        @endif
        </ul>
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