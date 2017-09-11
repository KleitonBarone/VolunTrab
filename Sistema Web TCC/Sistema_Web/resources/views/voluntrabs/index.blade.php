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
<table>
<td>
<tr>
<td>
Trabalho Criado por: <strong>{{$criador}}</strong>
</td>
<td>
        <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
        {{csrf_field()}}
        <button class="waves-effect waves-light green btn" type="submit">Visualizar</button>
        </form>
</td>
@if($criadorid == Auth::user()->id)
<td>
<a class="btn btn-primary" href="{{route('voluntrabs.edit', $voluntrab->id )}}">
                        Editar Trabalho
                </a>
</td>
@endif
</tr>
</table>
@empty
<h4 class="center">Sem Resultados!</h4>
<h4 class="center">Espere uma instituição cadastrar um trabalho voluntário.</h4>
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