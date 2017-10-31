@extends('layouts.app')

@section('titulo', 'Procurar Trabalho Voluntário - Voluntrab')

@section('trabalhos', 'active')

@section('content')
<!-- Pagina para Mostrar todos os Trabalhos Disponiveis -->

<!-- Count será necessário para ver quantos trabalhos foram exibidos -->
<?php
$count = 0 ;
$countandamento = 0;
$countcompleto = 0;
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

        <ul class="tabs">
          <li class="tab col s6"><a class="active blue-text" href="#test1">Em Andamento</a></li>
          <li class="tab col s6"><a href="#test2" class="blue-text">Completos</a></li>
        </ul>
    </div>

    <!-- Mostra os trabalhos em andamento (status=0) -->
    <div id="test1" class="col s12">

    <div class="row">

        
        <!-- Acha o Nome do criador do Trabalho -->
        @foreach ($voluntrabs as $voluntrab)
          @if ($voluntrab->status == 0)
          <?php
          $countandamento++;
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
                <h4>{{$voluntrab->titulo}}</h4>
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
                <p>Local: {{$voluntrab->local}}</p>
                <p>Descrição: {{$voluntrab->desc}}</p>
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
@endif
@endforeach
<!-- Se não tiver nenhum trabalho em andamento mostra essa mensagem -->
@if ($countandamento == 0)
      <h4 class="center">Sem Resultados!</h4>
      <h4 class="center">Espere uma instituição requisitar um trabalho voluntário.</h4>
@endif
    </div>
    </div>

    <!-- Mostra os trabalhos completos (status=1) -->
    <div id="test2" class="col s12">
      
          <div class="row">
      
              
              <!-- Acha o Nome do criador do Trabalho -->
              @foreach ($voluntrabs as $voluntrab)
                @if ($voluntrab->status == 1)
                <?php
                $countcompleto++;
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
                      <h4>{{$voluntrab->titulo}}</h4>
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
                      <p>Local: {{$voluntrab->local}}</p>
                      <p>Descrição: {{$voluntrab->desc}}</p>
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
      @endif
      @endforeach
      <!-- Se não tiver nenhum trabalho cadastrado mostra essa mensagem -->
      @if ($countcompleto == 0)
      <h4 class="center">Sem Resultados!</h4>
      @endif
          </div>
          </div>

    <br /><br />
    </div>
  <br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br />
   
@endsection