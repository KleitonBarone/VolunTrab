@extends('layouts.app')

@section('content')
        <div class="container">
    <div class="row">
        <div class="col s12">
                     <?php
          foreach ($users as $user){
            if($user->id == $voluntrab->user_id){
                $criador = $user->name;
                break;
            };
          };
        ?>
             <h1 class="center">Trabalho requisitado por {{$criador}}</h1>
             @if (Auth::user()->id == $voluntrab->user_id)
                <form style="display: inline;" action="{{route('voluntrabs.destroy', $voluntrab->id)}}" method="post">

                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="delete">

                    <button class="btn red">Apagar Requisição de Trabalho</button>

                </form>
                <br>
                <br>
                <a class="btn btn-primary" href="{{route('voluntrabs.edit', $voluntrab->id )}}">
                        Editar Trabalho
                </a>
                <br>
                <br>
             @endif
             <div class="divider"></div>
             <br>
             <br>
             <h3>Data da realização do trabalho: <strong>{{$voluntrab->data}}</strong></h3>
             <h5>Descrição do Trabalho: {{$voluntrab->desc}} </h5>

                @if(Auth::user()->tipo == 1)
                        <?php $hit = 0; ?>
                        @foreach ($voluntrab->user as $voluntrabuser)
                                @if(Auth::user()->id == $voluntrabuser->id)
                                  <?php $hit = 1; ?>
                                @endif
                        @endforeach

                @if ($hit === 0)
                <br>
                <br>
              <form action="{{route('voluntrabs.adduser', $voluntrab->id)}}" method="post">

                        {{csrf_field()}}

                        <input type="hidden" id="users" name="users" value="{{ Auth::user()->id }}" >


                <div class="center">
                <button class="waves-effect waves-light blue btn" type="submit">Participar do Trabalho</button>
                </div> 
                </form>
                @else
                <br>
                <br>
                <div class="center">
                    <button class="btn disabled">Você já está participando desse trabalho!</button>
                </div>
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