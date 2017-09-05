@extends('layouts.app')

@section('content')
<!-- a fazer: pagina melhor -->
        <div class="container">
    <div class="row center">
        <div class="col s12">
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
