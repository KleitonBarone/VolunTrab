@extends('layouts.app')

@section('titulo', 'Procurar Trabalho Voluntário - Voluntrab')

@section('content')
        <div class="container">
    <div class="row center">
        <div class="col s12">
            <h2>Trabalhos Voluntários Disponíves:</h2>
            @if (Auth::user()->tipo == 2)
            <a href="{{ route('voluntrabs.create') }}" class="waves-effect waves-light green btn">Criar uma Requisição de Trabalho</a>
            @endif
            <br>
            <br>
            <div class="divider"> </div>
        </div>
    </div>
<div class="row">
    <div class="col s12">

       @forelse ($voluntrabs as $voluntrab)
       <?php
          foreach ($users as $user){
            if($user->id == $voluntrab->user_id){
                $criador = $user->name;
                $criadorid = $user->id;
                break;
            };
          };
        ?>


        <div class="col s12">
    <div class="card horizontal">
      <div class="card-image">
        <img src="{{ asset('avatarsvoluntrab/' . $voluntrab->avatar) }}" width="300" height="300" style="">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Trabalho Criado por: <strong>{{$criador}}</strong><br>
          Descrição: {{$voluntrab->desc}}
          </p>
        </div>
        <div class="card-action">
          <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
        {{csrf_field()}}
        <button class="waves-effect waves-light btn-flat yellow-text text-darken-2" type="submit">Visualizar esta Requisição</button>
        </form>
        </div>
      </div>
    </div>
  </div>


@empty
<h4 class="center">Sem Resultados!</h4>
<h4 class="center">Espere uma instituição requisitar um trabalho voluntário.</h4>
@endforelse
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