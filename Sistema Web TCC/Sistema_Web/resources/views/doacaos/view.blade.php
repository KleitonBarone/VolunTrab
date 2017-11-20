@extends('layouts.app')

@section('titulo', 'Doações Participando - Voluntrab')

@section('doacaorelacionado', 'active')

@section('content')
<?php
$count = 0;
?>
<!-- Pagina de Visualizar as Doações participando e caso for uma instituição ver as Doações criados por ela -->
<div class="container">
  <div class="row center">
    <div class="col s12">


      <!-- Se o usuario for voluntário ele vai mostrar as Doações em que ele está cadastrado -->
      @if($user->tipo == 1)
      <h2>Você se cadastrou nas seguintes Doações:</h2>

      <div class="divider"></div>

    </div>
  </div>

  <div class="row">

        <ul class="tabs">
          <li class="tab col s6"><a class="active blue-text" href="#test1">Em Andamento</a></li>
          <li class="tab col s6"><a href="#test2" class="blue-text">Completos</a></li>
        </ul>

  </div>
  <div class="row">
    <div class="col s12">
      <!-- Sistema de Hit para ver se a Doação sendo analizada
      é um no qual o usuario está cadastrado -->

      <!-- doações em andamento -->
      <div id="test1" class="col s12">

      <?php $option = 0; ?>
      @foreach ($doacaos as $doacao)
        @if ($doacao->status == 0)
        <?php $hit = 0; ?>
        @foreach ($doacao->user as $doacaouser)
          @if($user->id == $doacaouser->id)
            <?php $hit = 1; ?>
          @endif
        @endforeach

        <!-- Se o hit der certo, ele passa por aqui e acha o 
        nome do criador da Doação-->
        @if ($hit === 1)
          <?php
          $option = 1;
          foreach ($users as $criador){
            if($criador->id == $doacao->user_id){
              $dono = $criador->name;
              break;
            };
          };
          ?>

          <!-- Card que mostra a Requisição da Doação -->
      <div class="col s12">
        <div class="card horizontal">
          <div class="card-image">
            <img src="{{ asset('avatarsdoacao/' . $doacao->avatar) }}" width="300" height="300" style="">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>
                <h4>Requisição de: <strong>{{$doacao->item}}</strong></h4>
                Doação Requisitada por: 
                <a class="" href="{{route('users.show', $criador->id )}}"
                onclick="event.preventDefault();
                document.getElementById('showuser{{$count}}-form').submit();">
                  {{$dono}}
                </a>
                <form id="showuser{{$count}}-form" action="{{route('users.show', $criador->id )}}" method="" style="display: none;">
                  {{csrf_field()}}
                </form>
                <br />
                Descrição: {{$doacao->desc}}
              </p>
            </div>
            <div class="card-action">
              <!-- Botão para ir para pagina individual de cada Requisição -->
              <form action="{{route('doacaos.show', $doacao->id)}}" method="">
                {{csrf_field()}}
                <button class="waves-effect waves-light btn-flat blue-text text-darken-2" type="submit">
                  Visualizar esta Requisição
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Adiciona um ao contador de Requisições achadas -->
      <?php
        $count++;
      ?>
      @endif
      @endif
      @endforeach

        <!-- Se ele não achou nenhum, ele mostra essa mensagem ao usuario -->
        @if($option == 0)
          <h3 class="center">
            Este usuario ainda não esta cadastrado em nenhuma Doação,
            vá até o menu "<a href="{{ route('doacaos.index') }}">Doações</a>" para escolher uma de seu interesse!
          </h3>
          <br /><br /><br /><br />
        @endif

        </div>
        
        <!-- Doações completados -->
      <div id="test2" class="col s12">
          
                <?php $option = 0; ?>
                @foreach ($doacaos as $doacao)
                  @if ($doacao->status == 1)
                  <?php $hit = 0; ?>
                  @foreach ($doacao->user as $doacaouser)
                    @if($user->id == $doacaouser->id)
                      <?php $hit = 1; ?>
                    @endif
                  @endforeach
          
                  <!-- Se o hit der certo, ele passa por aqui e acha o 
                  nome do criador da Doação-->
                  @if ($hit === 1)
                    <?php
                    $option = 1;
                    foreach ($users as $criador){
                      if($criador->id == $doacao->user_id){
                        $dono = $criador->name;
                        break;
                      };
                    };
                    ?>
          
                    <!-- Card que mostra a Requisição da Doação -->
                <div class="col s12">
                  <div class="card horizontal">
                    <div class="card-image">
                      <img src="{{ asset('avatarsdoacao/' . $doacao->avatar) }}" width="300" height="300" style="">
                    </div>
                    <div class="card-stacked">
                      <div class="card-content">
                        <p>
                            <h4>Requisição de: <strong>{{$doacao->item}}</strong></h4>
                            Doação Requisitada por: 
                          <a class="" href="{{route('users.show', $criador->id )}}"
                          onclick="event.preventDefault();
                          document.getElementById('showuser{{$count}}-form').submit();">
                            {{$dono}}
                          </a>
                          <form id="showuser{{$count}}-form" action="{{route('users.show', $criador->id )}}" method="" style="display: none;">
                            {{csrf_field()}}
                          </form>
                          <br />
                          Descrição: {{$doacao->desc}}
                        </p>
                      </div>
                      <div class="card-action">
                        <!-- Botão para ir para pagina individual de cada Requisição -->
                        <form action="{{route('doacaos.show', $doacao->id)}}" method="">
                          {{csrf_field()}}
                          <button class="waves-effect waves-light btn-flat blue-text text-darken-2" type="submit">
                            Visualizar esta Requisição
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Adiciona um ao contador de Requisições achadas -->
                <?php
                  $count++;
                ?>
                @endif
                @endif
                @endforeach
          
                  <!-- Se ele não achou nenhum, ele mostra essa mensagem ao usuario -->
                  @if($option == 0)
                    <h3 class="center">
                      Este usuario não completou nenhuma Doação ainda,
                      vá até o menu "<a href="{{ route('doacaos.index') }}">Doação</a>" para escolher um de seu interesse!
                    </h3>
                    <br /><br /><br /><br />
                  @endif
          
                  </div>



      </div>
    </div>
        <!-- Se o usuario for uma instituição mostra as Doações que ele requisitou -->
      @else
        <h2>Você requisitou as seguintes Doações:</h2>
          <div class="divider"></div>

          <div class="row">
              
                      <ul class="tabs">
                        <li class="tab col s6"><a class="active blue-text" href="#test1">Em Andamento</a></li>
                        <li class="tab col s6"><a href="#test2" class="blue-text">Completos</a></li>
                      </ul>
              
          </div>
            <div class="row">
              <div class="col s12">
                <!-- Sistema de Hit para ver se a Doação sendo analizada
                é um no qual o usuario está cadastrado -->

                <!-- doações em andamento -->
                <div id="test1" class="col s12">
                <?php $option = 0; ?>
                @foreach ($doacaos as $doacao)
                @if ($doacao->status == 0)
                <?php $hit = 0; ?>
                  @if($user->id == $doacao->user_id) 
                    <?php 
                    $hit = 1; 
                    $option = 1;
                    ?>
                  @endif

                  <!-- Se ele for o dono ele mostra a Doação -->
                  @if ($hit === 1)
                    <div class="col s12">
                      <div class="card horizontal">
                        <div class="card-image">
                          <img src="{{ asset('avatarsdoacao/' . $doacao->avatar) }}" width="300" height="300" style="">
                        </div>
                        <div class="card-stacked">
                          <div class="card-content">
                            <p>
                              <h4>Requisição de: <strong>{{$doacao->item}}</strong></h4>
                                Doação Requisitada por:  
                              <a class="" href="{{route('users.show', $user->id )}}"
                                onclick="event.preventDefault();
                                document.getElementById('showuser{{$count}}-form').submit();">
                                  {{$user->name}}
                              </a>
                              <form id="showuser{{$count}}-form" action="{{route('users.show', $user->id )}}" method="" style="display: none;">
                                {{csrf_field()}}
                              </form>

                              <br />
                              Descrição: {{$doacao->desc}}
                            </p>
                          </div>
                          <div class="card-action">
                            <!-- Botão para ir para pagina especifica de cada Doação -->
                            <form action="{{route('doacaos.show', $doacao->id)}}" method="">
                              {{csrf_field()}}
                              <button class="waves-effect waves-light btn-flat blue-text text-darken-2" type="submit">Visualizar esta Requisição</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                  @endif
                @endforeach



                <!-- Se ele não achar nada ele mostra essa mensagem -->
                @if($option == 0)
                  <h3 class="center">
                  Esta instituição não tem nenhuma Requisição de Doação em andamento,
                  vá até o menu "<a href="{{ route('doacaos.index') }}">Doação</a>" para requisitar um!
                  </h3>
                  <br /><br /><br /><br />
                @endif
                  
                </div>

                 <!-- Doação completados -->
                 <div id="test2" class="col s12">
                    <?php $option = 0; ?>
                    @foreach ($doacaos as $doacao)
                    @if ($doacao->status == 1)
                    <?php $hit = 0; ?>
                      @if($user->id == $doacao->user_id) 
                        <?php 
                        $hit = 1; 
                        $option = 1;
                        ?>
                      @endif
    
                      <!-- Se ele for o dono ele mostra a Doação -->
                      @if ($hit === 1)
                        <div class="col s12">
                          <div class="card horizontal">
                            <div class="card-image">
                              <img src="{{ asset('avatarsdoacao/' . $doacao->avatar) }}" width="300" height="300" style="">
                            </div>
                            <div class="card-stacked">
                              <div class="card-content">
                                <p>
                                  <h4>Requisição de: <strong>{{$doacao->item}}</strong></h4>
                                    Doação Requisitada por: 
                                  <a class="" href="{{route('users.show', $user->id )}}"
                                    onclick="event.preventDefault();
                                    document.getElementById('showuser{{$count}}-form').submit();">
                                      {{$user->name}}
                                  </a>
                                  <form id="showuser{{$count}}-form" action="{{route('users.show', $user->id )}}" method="" style="display: none;">
                                    {{csrf_field()}}
                                  </form>
    
                                  <br />
                                  Descrição: {{$doacao->desc}}
                                </p>
                              </div>
                              <div class="card-action">
                                <!-- Botão para ir para pagina especifica de cada Doação -->
                                <form action="{{route('doacaos.show', $doacao->id)}}" method="">
                                  {{csrf_field()}}
                                  <button class="waves-effect waves-light btn-flat blue-text text-darken-2" type="submit">Visualizar esta Requisição</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      @endif
                    @endforeach
                    
                    
    
    
                    <!-- Se ele não achar nada ele mostra essa mensagem -->
                    @if($option == 0)
                      <h3 class="center">
                      Esta instituição não tem nenhuma Requisição de Doação conluida!
                      </h3>
                      <br /><br /><br /><br /><br /><br />
                    @endif
                      
                    </div>

              @endif
              </div>
            </div>
          <br /><br /><br />
</div>
</div>
<br /><br /><br /><br /><br />
<br /><br /><br />
</div>
@endsection