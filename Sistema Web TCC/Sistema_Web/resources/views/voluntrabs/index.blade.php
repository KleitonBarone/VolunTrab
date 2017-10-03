@extends('layouts.app')

@section('titulo', 'Procurar Trabalho Voluntário - Voluntrab')

@section('trabalhos', 'active')

@section('content')
<!-- Pagina para Mostrar todos os Trabalhos Disponiveis -->

<!-- Count será necessário para ver quantos trabalhos foram exibidos -->
<?php
$count = 0 ;
?>
  <div class="container">
    <div class="row center">
      <div class="col s12">
        <h2>Trabalhos Voluntários Disponíves:</h2>
        <!-- Se ele for uma Instituição ele poderá Requisitar um Trabalho -->
        @if (Auth::user()->tipo == 2)
          <a href="{{ route('voluntrabs.create') }}" class="waves-effect waves-light green btn">Criar uma Requisição de Trabalho</a>
        @endif

        <br /><br />
        <div class="divider"></div>

      </div>
    </div>

    <div class="row">
      
        <!-- Acha o Nome do criador do Trabalho -->
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
          <!-- Mostra um Card com informações do Trabalho -->
        <div class="col s12">
          <div class="card horizontal">
            <div class="card-image">
              <img src="{{ asset('avatarsvoluntrab/' . $voluntrab->avatar) }}" width="300" height="300" style="">
            </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>
                Trabalho Criado por: 
                <a class="" href="{{route('users.show', $user->id )}}"
                onclick="event.preventDefault();
                document.getElementById('showuser-form{{$count}}').submit();">
                  {{$criador}}
                </a>
                <form id="showuser-form{{$count}}" action="{{route('users.show', $user->id )}}" method="" style="display: none;">
                {{csrf_field()}}
                </form>
                <br />
                Descrição: {{$voluntrab->desc}}
              </p>
            </div>
            <div class="card-action">
              <!-- Botão para Visualizar o Trabalho -->
              <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
                {{csrf_field()}}
                <button class="waves-effect waves-light btn-flat blue-text text-darken-2" type="submit">Visualizar esta Requisição</button>
              </form>
            </div>
        </div>
    </div>
  </div>

<!-- Soma mais um trabalho para o Counter -->
<?php
$count++;
?>

<!-- Se não tiver nenhum trabalho cadastrado mostra essa mensagem -->
@empty
  <h4 class="center">Sem Resultados!</h4>
  <h4 class="center">Espere uma instituição requisitar um trabalho voluntário.</h4>
@endforelse

    <br /><br />
    </div>
  <br /><br /><br /><br /><br /><br /><br />
  </div>
<br /><br /><br /><br /><br />
   
@endsection