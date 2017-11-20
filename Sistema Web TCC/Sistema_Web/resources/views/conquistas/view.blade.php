@extends('layouts.app')

@section('titulo', 'Detalhes da Conquista - Voluntrab')

@section('content')

@if ($conquista->id == 1)
@if (Auth::guest())
<?php 
$elegivel = 0; 
?>
@else
<?php 
$elegivel = 1; 
?>
@endif
@endif

@if ($conquista->id == 2)
@if (count(Auth::user()->doacao) > 0)
<?php 
$elegivel = 1; 
?>
@else
<?php 
$elegivel = 0; 
?>
@endif
@endif

@if ($conquista->id == 3)
@if (count(Auth::user()->doacao) > 4)
<?php 
$elegivel = 1; 
?>
@else
<?php 
$elegivel = 0; 
?>
@endif
@endif

@if ($conquista->id == 4)
@if (count(Auth::user()->voluntrab) > 0)
<?php 
$elegivel = 1; 
?>
@else
<?php 
$elegivel = 0; 
?>
@endif
@endif

@if ($conquista->id == 5)
@if (count(Auth::user()->voluntrab) > 4)
<?php 
$elegivel = 1; 
?>
@else
<?php 
$elegivel = 0;
?>
@endif
@endif
<div class="container z-depth-5">
    <div class="container">
    <br />
    <h2 class="center">{{$conquista->nome}}</h2>
     <div class="divider"></div>
     <br />

    <div class="col s12"> 
                <div class="row">

                    <div class="col s6">  
                        
                        <br /><br />
                        <div class="center">
                            <img src="{{ asset('conquistas_image/' . $conquista->icone) }}" class="materialboxed responsive-img" width="" height="">
                        </div>
                        <br /><br />
                    </div>

                    <div class="col s6" style="margin-top:5%;">
                    <h5 class="center">Objetivo da Conquista</h5>
                    <p>{{$conquista->desc}}</p>
                    <p>Essa conquista vale: {{$conquista->pontos}} pontos.</p>
                    </div>
                </div>
                
                <div class="divider"></div>
                <br />
                <h3 class="center"> Completar Conquista: </h3>
                    <?php $hit = 0; ?>
                        @foreach ($conquista->user as $conquista_user)
                                @if(Auth::user()->id == $conquista_user->id)
                                  <?php $hit = 1; ?>
                                @endif
                        @endforeach
            @if ($elegivel == 1)
                @if($hit == 0)
                <br /> <br />
                    <form action="{{route('conquistas.adduser', $conquista->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" id="users" name="users" value="{{ Auth::user()->id }}" >
                            <div class="center">
                                <button class="waves-effect waves-light blue btn" type="submit">Completar Conquista</button>
                            </div>
                            <br /><br /> 
                        </form>
                    <!-- Se ele já completou aparece esse disabled button -->   
                    @else
                        <br /><br />
                        <div class="center">
                            <button class="btn disabled">Você já completou essa Conquista!</button>
                        </div>
                        <br /><br />
                @endif
            
            @else
            <br /><br />
                <div class="center">
                    <button class="btn disabled">Você não completou os requisitos dessa Conquista</button>
                </div>
            <br /><br />
            @endif
        </div>
    </div>
</div>

@endsection