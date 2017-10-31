@extends('layouts.app')

@section('titulo', 'Visualizar Doação - Voluntrab')

@section('doacoes', 'active')

@section('content')
<!-- Pagina de Mostrar Cada Requisição de Doação -->

<!-- Contador para contar o numero de usuarios participantes da Doação -->
<?php
$count = 0;
?>

<div class="container z-depth-5">
    <div class="container">

        <div class="row center">
            <br /><br />
            <div class="left-align">
                <a class="waves-effect waves-light btn blue" href="{{ route('doacaos.index') }}">
                    <i class="material-icons left">arrow_back</i>Voltar
                </a>
            </div>
        </div>    
        <div class="col s12">
        <!-- foreach para achar o criador do trabalho -->
        <?php
          foreach ($users as $user){
            if($user->id == $doacao->user_id){
                $criador = $user->name;
                $criadorid = $user->id;
                break;
            };
          };
        ?>
            <!-- titulo do trabalho -->
            <h2 class="center">
            Doação de {{$doacao->item}}
            </h2>

            <div class="right-align">

                <!-- Se ele for o criador do projeto da para editar ou deletar o trabalho --> 
                @if (Auth::user()->id == $doacao->user_id)

                    <div class="row">

                        <div class="col s3">
                            <a class="btn btn-primary" href="{{route('doacaos.edit', $doacao->id )}}">
                            Editar     
                            </a>
                        </div>

                        <div class="col s6">
                        </div>

                        <div class="col s3">
                                <form style="display: inline;" action="{{route('doacaos.destroy', $doacao->id)}}" method="post">
                                    {{csrf_field()}}
    
                                    <input type="hidden" name="_method" value="delete">
    
                                    <button class="btn red">Apagar</button>
    
                                </form>
                            </div>
                        <br /><br />

                    </div>
                    
                @endif
            </div>

        </div>

        <div class="divider"></div>
        @if ($doacao->status == 1)
            <h3 class="green-text center">Essa Doação foi Concluida!</h3>
        @endif
        <div class="row">
            <div class="col s12"> 
                <div class="row">

                    <div class="col s6">  
                        
                        <br /><br />
                        <div class="center">
                            <img src="{{ asset('avatarsdoacao/' . $doacao->avatar) }}" class="materialboxed responsive-img" width="" height="">
                        </div>
                        <br /><br />
                    </div>

                    <div class="col s6" style="margin-top:5%;">

                <h5>Doação requisitada por
                <a class="" href="{{route('users.show', $user->id )}}"
                onclick="event.preventDefault();
                document.getElementById('showuser-form').submit();">
                    {{$criador}}
                </a>
                <form id="showuser-form" action="{{route('users.show', $criadorid )}}" method="" style="display: none;">
                    {{csrf_field()}}
                </form></h5>

                <h5>Data de Entrega da Doação: <strong>{{$doacao->data}}</strong></h3>

                <p><h5>Descrição da Doação:</h5> {{$doacao->desc}} </p>
                    </div>
                
                </div>

                <!-- Sistema hit para ver se o usuario participa do trabalho em questão -->
                @if(Auth::user()->tipo == 1)
                        <?php $hit = 0; ?>
                        @foreach ($doacao->user as $doacaouser)
                                @if(Auth::user()->id == $doacaouser->id)
                                  <?php $hit = 1; ?>
                                @endif
                        @endforeach
                <!-- para participar o trabalho tem que estar em andamento (nao pode estar completo) -->
                @if ( $doacao->status == 0 )
                <!-- Se ele não participar, aparece o botão para ele participar -->
                    @if ($hit === 0)
                    <br /><br />

                        <form action="{{route('doacaos.adduser', $doacao->id)}}" method="post">
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
                            <button class="btn disabled">Você já está participando dessa Doação!</button>
                        </div>
                        <br /><br />
                    @endif
                @else
                    <br /><br />
                        <div class="center">
                            <button class="btn disabled">Essa Doação já foi Concluída!</button>
                        </div>
                    <br /><br />
                @endif

                @endif
                    <div class="divider"></div>
                    <!-- se tiver alguem participando do trabalho ele lista elas -->
                    @if(count($doacao->user) > 0)
                        <br />
                        <h4>
                        @if ($doacao->status == 0)
                        Pessoas que estão participando dessa Doação:
                        @else
                        Pessoas que participaram dessa Doação:
                        @endif
                        </h4>
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
                                @foreach ($doacao->user as $doacaouser)
                                    <tr>
                                        <td>
                                            <a class="" href="{{route('users.show', $doacaouser->id )}}"
                                            onclick="event.preventDefault();
                                            document.getElementById('showuser{{$count}}-form').submit();">
                                                {{$doacaouser->name}}
                                            </a>
                                            <form id="showuser{{$count}}-form" action="{{route('users.show', $doacaouser->id )}}" method="" style="display: none;">
                                            {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>{{ $doacaouser->tel }}</td>
                                        <td>{{ $doacaouser->datanasc }}</td>
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
                        <h5 class ="center"> Não há ninguem participando dessa Doação ainda.</h5>
                        <br />
                    @endif

                    <br /> <br />
                    <!-- Se ele for o criador do trabalho, ele pode concluir-lo -->
                    @if (Auth::user()->id == $doacao->user_id)
                        @if($doacao->status == 0)
                    <form action="{{route('doacao.complete', $doacao->id)}}" method="post">
                            {{csrf_field()}}
                           
                           
                            <div class="center">
                                <button class="waves-effect waves-light blue btn" type="submit">Concluir a Doação!</button>
                            </div>
                            <br /><br /> 
                    </form>
                        @endif
                    @endif
                </div>
            </div>
            <br /><br /><br />
        </div>
        <br /><br /><br /><br /><br />
    </div>
</div>
@endsection