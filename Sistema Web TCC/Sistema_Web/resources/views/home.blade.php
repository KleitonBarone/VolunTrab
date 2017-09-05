@extends('layouts.app')

@section('content')
<!-- a fazer: pagina melhor -->

        <div class="container">
    <div class="row center">
        <div class="col s12">
            <h2>Bem vindo ao Voluntrab</h2>
            <div class="divider"> </div>
            @if(Auth::guest())
            <h4> Logue para Poder usar o sistema!</h4>
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
