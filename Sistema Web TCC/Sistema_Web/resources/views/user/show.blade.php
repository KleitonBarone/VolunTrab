@extends('layouts.app')

@section('titulo', 'Ver Perfil - Voluntrab')

@section('perfil', 'active')

@section('content')
<!-- Pagina para Mostrar o Perfil de um Usuario -->
<div class="container">
    <div class="row center">
        <div class="col s12">
            <!-- Titulo da Pagina -->
            <h2>Perfil de {{$user->name}}</h2>

            <!-- Se o Usuario Visitando for o Dono do Perfil Aparece o Botão de Editar -->
            @if (Auth::user()->id == $user->id)
            <a class="btn btn-primary" href="{{route('users.edit', $user->id )}}">
                Editar Perfil
            </a>
            <br /><br />
            @endif

            <div class="divider"> </div>

        </div>
    </div>
    <div class="row">
        
            <h4 class="center">Este usuario é @if($user->tipo == 1) um Voluntário! @else uma Instiuição! @endif </h4>
            
            <br />
            <h5>Essas são suas Informações:</h5>

            <div class="col s6">
            <h5>Imagem de Perfil:</h5>
            <br />
            <div class="center" >
                <!-- Mostrar a Imagem de Perfil do Usuario -->
                <img src="{{ asset('avatars/' . $user->avatar) }}" class="circle materialboxed responsive-img" width="50%" height="50%" >
            </div>
        </div>
        <div class="col s6">
            <ul>
            @if($user->tipo == 1)
                <!-- Informação do Usuario caso ele for Voluntário -->
                <li>Nome:<strong> {{ $user->name }}</strong></li>
                <li>Email:<strong> {{ $user->email }}</strong></li>
                <li>Data de Nascimento:<strong> {{ $user->datanasc }}</strong></li>
                <li>Telefone:<strong> {{ $user->tel }}</strong></li>
            @else
                <!-- Informação do Usuario caso ele for Instituição -->
                <li>Nome da Instituição:<strong> {{ $user->name }}</strong></li>
                <li>Email:<strong> {{ $user->email }}</strong></li>
                <li>Telefone:<strong> {{ $user->tel }}</strong></li>
            @endif
            </ul>
        </div>
    </div>
    
<br /><br /><br />
</div>
<br /><br /><br /><br /><br />
   
@endsection