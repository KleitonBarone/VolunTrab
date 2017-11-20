@extends('layouts.app')

@section('titulo', 'Ver Perfil - Voluntrab')

@section('perfil', 'active')

@section('content')
<!-- Pagina para Mostrar o Perfil de um Usuario -->
<div class="container">
    <div class="row">
        <div class="col s12">
            <!-- Titulo da Pagina -->
            <div class="row">
            <div class="col s9 right-align">
            <h2>Perfil de {{$user->name}}</h2>
            </div>
            <div class="col s3 right-align">
            <br />
            <br />
            <!-- Se o Usuario Visitando for o Dono do Perfil Aparece o Botão de Editar -->
            @if (Auth::user()->id == $user->id)
            <a class="btn btn-primary" href="{{route('users.edit', $user->id )}}">
                Editar Perfil
            </a>
            <br /><br />
            @endif
            <!-- Se o usuario vendo o perfil nao for o dono do mesmo, aparece o botao de denuncia -->
            @if (Auth::user()->id != $user->id)
            <form method="get" action="{{ route('denuncias.create') }}">
                {{csrf_field()}}
                <input type="hidden" name="user" id="user" value="{{$user->id}}">
                <button class="waves-effect waves-teal btn-flat" type="submit">
                <i class="material-icons">warning</i> Denunciar
                </button>
            @endif
            </div>
            </div>
            

            <div class="divider"> </div>

        </div>
    </div>
    <div class="row">
        
            <h4 class="center">Este usuario é @if($user->tipo == 1) um Voluntário! @else uma Instiuição! @endif </h4>
            
            <br />
            

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
    @if($user->tipo==1)
    <div class="row">
    <div class="divider"></div>
    <?php $counter = 0; foreach ($avalias as $avalia){ if ($avalia->user_id == $user->id){ $counter = 1 ; break; }} ?>
    @if($counter == 1)
    <h3 class="center">Nota Media de Avaliação: 
    <?php 
    $somanota = 0; 
    $counter = 0;
    foreach ($avalias as $avalia)
    {
    if ($avalia->user_id == $user->id)
    {
    $somanota += $avalia->nota;
    $counter++;   
    } 
    }
    $media = $somanota / $counter; 

    ?>
    <strong>{{$media}}</strong>
    </h3>
    <br/>
    <h4> Avaliações:</h4>
    @foreach ($avalias as $avalia)
    @if ($avalia->user_id == $user->id)
    <div class="row z-depth-1 valign-wrapper">

    <div class="col s3">
    <h5>Avaliador: <?php 
    foreach($allusers as $alluser)
    { 
        if($alluser->id == $avalia->id_avaliador)
        { 
        $nome_avaliador = $alluser->name;
         break;
        }
    } 
    ?>
    <strong>{{$nome_avaliador}}</strong></h5>
    </div>

    <div class="col s3">
    <h5>Nota: <strong>{{$avalia->nota}}</strong></h5>
    </div>

    <div class="col s6">
    <h5>Comentário:</h5><p>{{$avalia->comentario}}</p>
    </div>
    
    </div>
    @endif
    @endforeach
    </div>
    @else
    <h5>Esse usuario ainda não foi avaliado, participe de um trabalho voluntário ou doação para receber uma avaliação.</h5>
    </div>
    @endif
    @endif
    
<br /><br /><br /><br /><br /><br />
</div>
<br /><br /><br /><br /><br />
   
@endsection