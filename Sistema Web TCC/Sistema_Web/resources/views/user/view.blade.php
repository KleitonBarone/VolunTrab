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
<table>
<td>
<tr>
<td>
Trabalho Criado por: <strong>{{$dono}}</strong>
</td>
<td>
        <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
        {{csrf_field()}}
        <button class="waves-effect waves-light green btn" type="submit">Visualizar</button>
        </form>
</td>
</tr>
</table>
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
<table>
<td>
<tr>
<td>
Trabalho Criado por: <strong>{{$user->name}}</strong>
</td>
<td>
        <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
        {{csrf_field()}}
        <button class="waves-effect waves-light green btn" type="submit">Visualizar</button>
        </form>
</td>
</tr>
</table>

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
