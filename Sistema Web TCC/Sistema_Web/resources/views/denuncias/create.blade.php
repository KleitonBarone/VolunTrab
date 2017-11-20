@extends('layouts.app')

@section('titulo', 'Denunciar Usuario - Voluntrab')

@section('perfil', 'active')

@section('content')
<div class="container z-depth-5">
    <br /><br />
    <div class="container">
        <div class="row center">

      <div class="col s12">
        <h2>Denunciar {{$user->name}}</h2>
        <div class="divider"></div>
      </div>
        
        <div class="col s12">
        <form method="post" action="{{ route('denuncias.store') }}">
                {{csrf_field()}}

                <input type="hidden" name="delator" id="delator" value="{{Auth::user()->id}}">

                <input type="hidden" name="id_user" id="id_user" value="{{$user->id}}">

                <br /><br />
                <div class="row"> 
                    <div class="input-field">
                        <textarea id="desc" class="validate materialize-textarea" name="desc"  required></textarea>
                        <label for="desc">Motivo da Denuncia</label>
                    </div>
                </div>

                <div class="center">
                    <button class="waves-effect waves-light red darken-2 btn" type="submit">Denunciar Usuario</button>
                </div>
        
        </form>
        <br /><br />
        </div>

        </div>
        <br /><br /><br /><br /><br />
        <br /><br /><br /><br />
    </div>
</div>

@endsection