@extends('layouts.app')

@section('titulo', 'Ver Trabalho Requisitado - Voluntrab')

@section('trabalhos', 'active')

@section('content')
<!-- Pagina de Mostrar Cada Trabalho -->

<!-- Contador para contar o numero de usuarios presentes no trabalho -->
<?php
$count = 0;
?>

<div class="container z-depth-5">
    <div class="container">

        <div class="row center">
            <br /><br />
            <div class="left-align">
                <a class="waves-effect waves-light btn blue" href="{{ route('voluntrabs.index') }}">
                    <i class="material-icons left">arrow_back</i>Voltar
                </a>
            </div>

        <div class="col s12">
        <!-- foreach para achar o criador do trabalho -->
        <?php
          foreach ($users as $user){
            if($user->id == $voluntrab->user_id){
                $criador = $user->name;
                $criadorid = $user->id;
                break;
            };
          };
        ?>
            <h1 class="center">Trabalho requisitado por
                <a class="" href="{{route('users.show', $user->id )}}"
                onclick="event.preventDefault();
                document.getElementById('showuser-form').submit();">
                    {{$criador}}
                </a>
                <form id="showuser-form" action="{{route('users.show', $criadorid )}}" method="" style="display: none;">
                    {{csrf_field()}}
                </form> 
            </h1>

            <div class="right-align">

                <!-- Se ele for o criador do projeto da para editar ou deletar o trabalho --> 
                @if (Auth::user()->id == $voluntrab->user_id)
                    <form style="display: inline;" action="{{route('voluntrabs.destroy', $voluntrab->id)}}" method="post">
                        {{csrf_field()}}

                    <input type="hidden" name="_method" value="delete">

                    <button class="btn red">Apagar Requisição de Trabalho</button>

                    </form>
                    <br /><br />
                    <a class="btn btn-primary" href="{{route('voluntrabs.edit', $voluntrab->id )}}">
                        Editar Trabalho      
                    </a>
                    <br /><br />
                    </div>
                @endif
            </div>

        </div>

        <div class="row center">
            <div class="col s12">   
                <div class="divider"></div>
                <br /><br />
                <div class="center">
                <img src="{{ asset('avatarsvoluntrab/' . $voluntrab->avatar) }}" class="center materialboxed" width="50%" height="50%">
                </div>
                <br /><br />

                <h3>Data da realização do trabalho: <strong>{{$voluntrab->data}}</strong></h3>

                <h5>Descrição do Trabalho: {{$voluntrab->desc}} </h5>
                
                <!-- Sistema hit para ver se o usuario participa do trabalho em questão -->
                @if(Auth::user()->tipo == 1)
                        <?php $hit = 0; ?>
                        @foreach ($voluntrab->user as $voluntrabuser)
                                @if(Auth::user()->id == $voluntrabuser->id)
                                  <?php $hit = 1; ?>
                                @endif
                        @endforeach

                <!-- Se ele não participar, aparece o botão para ele participar -->
                    @if ($hit === 0)
                    <br /><br />

                        <form action="{{route('voluntrabs.adduser', $voluntrab->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" id="users" name="users" value="{{ Auth::user()->id }}" >
                            <div class="center">
                                <button class="waves-effect waves-light blue btn" type="submit">Participar do Trabalho</button>
                            </div>
                            <br /><br /> 
                        </form>
                    <!-- Se ele já estiver participando aparece esse disabled button -->   
                    @else
                        <br /><br />
                        <div class="center">
                            <button class="btn disabled">Você já está participando desse trabalho!</button>
                        </div>
                        <br /><br />
                    @endif

                @endif
                    <div class="divider"></div>
                    <!-- se tiver mais de uma pessoa participando do trabalho ele lista elas -->
                    @if(count($voluntrab->user) > 0)
                        <br />
                        <h4>Pessoas que estão participando desse trabalho:</h4>
                        <br />
                        <table class="responsive-table highlight">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Data de Nascimento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($voluntrab->user as $voluntrabuser)
                                    <tr>
                                        <td>
                                            <a class="" href="{{route('users.show', $voluntrabuser->id )}}"
                                            onclick="event.preventDefault();
                                            document.getElementById('showuser{{$count}}-form').submit();">
                                                {{$voluntrabuser->name}}
                                            </a>
                                            <form id="showuser{{$count}}-form" action="{{route('users.show', $voluntrabuser->id )}}" method="" style="display: none;">
                                            {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>{{ $voluntrabuser->tel }}</td>
                                        <td>{{ $voluntrabuser->datanasc }}</td>
                                    </tr>
                                    <?php
                                    $count++;
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- Se não tiver ninguem participando do trabalho essa mensagem é mostrada -->
                    @else
                        <br />
                        <h5 class ="center"> Não há ninguem participando desse trabalho ainda.</h5>
                        <br />
                    @endif
                </div>
            </div>
            <br /><br /><br />
        </div>
        <br /><br /><br /><br /><br />
    </div>
</div>
@endsection