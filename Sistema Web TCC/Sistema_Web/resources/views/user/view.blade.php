@extends('layouts.app')

@section('titulo', 'Trabalhos Participando - Voluntrab')

@section('content')
<!-- a fazer: pagina melhor -->
        <div class="container">
    <div class="row center">
        <div class="col s12">
        @if($user->tipo == 1)
            <h2>Você se cadastrou nos seguintes Trabalhos:</h2>
            <div class="divider"> </div>
        </div>
    </div>
<div class="row">
    <div class="col s12">
<?php $option = 0; ?>
    @foreach ($voluntrabs as $voluntrab)
<?php $hit = 0; ?>
            @foreach ($voluntrab->user as $voluntrabuser)
             @if($user->id == $voluntrabuser->id)
             
            <?php $hit = 1; ?>
            @endif
            @endforeach

@if ($hit === 1)
 
<?php
$option = 1;
foreach ($users as $criador){
        if($criador->id == $voluntrab->user_id){
                $dono = $criador->name;
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
          <p>Trabalho Criado por: <strong>{{$dono}}</strong><br>
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

@endif
@endforeach
@if($option == 0)
<h3 class="center">Este usuario não se cadastrou em nenhum trabalho voluntário ainda,
 vá até o menu "Trabalhos Voluntários" para escolher um de seu interesse!</h3>
@endif


@else
<h2>Você requisitou os seguintes Trabalhos:</h2>
            <div class="divider"> </div>
        </div>
    </div>
<div class="row">
    <div class="col s12">
<?php $option = 0; ?>
    @foreach ($voluntrabs as $voluntrab)
<?php $hit = 0; ?>
             @if($user->id == $voluntrab->user_id)
             
            <?php 
            $hit = 1; 
            $option = 1;
            ?>
            @endif

@if ($hit === 1)

      <div class="col s12">
    <div class="card horizontal">
      <div class="card-image">
        <img src="{{ asset('avatarsvoluntrab/' . $voluntrab->avatar) }}" width="300" height="300" style="">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Trabalho Criado por: <strong>{{$user->name}}</strong><br>
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


@endif
@endforeach
@if($option == 0)
<h3 class="center">Esta instituição não requisitou nenhum trabalho voluntário ainda, vá até o menu "Trabalhos
Voluntários" para requisitar um!</h3>
@endif

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
