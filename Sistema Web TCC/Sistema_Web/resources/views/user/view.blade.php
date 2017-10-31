@extends('layouts.app')

@section('titulo', 'Trabalhos Participando - Voluntrab')

@section('trabrelacionado', 'active')

@section('content')
<?php
$count = 0;
?>
<!-- Pagina de Visualizar os os trabalhos perticipando e caso for uma instituição ver o trabalhos criados por ela -->
<div class="container">
  <div class="row center">
    <div class="col s12">


      <!-- Se o usuario for voluntário ele vai mostrar os trabalhos em que ele está cadastrado -->
      @if($user->tipo == 1)
      <h2>Você se cadastrou nos seguintes Trabalhos:</h2>

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
      <!-- Sistema de Hit para ver se o Trabalho sendo analizado
      é um no qual o usuario está cadastrado -->

      <!-- trabalhos em andamento -->
      <div id="test1" class="col s12">

      <?php $option = 0; ?>
      @foreach ($voluntrabs as $voluntrab)
        @if ($voluntrab->status == 0)
        <?php $hit = 0; ?>
        @foreach ($voluntrab->user as $voluntrabuser)
          @if($user->id == $voluntrabuser->id)
            <?php $hit = 1; ?>
          @endif
        @endforeach

        <!-- Se o hit der certo, ele passa por aqui e acha o 
        nome do criador do trabalho-->
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

          <!-- Card que mostra a Requisição do trabalho voluntário -->
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
                <a class="" href="{{route('users.show', $criador->id )}}"
                onclick="event.preventDefault();
                document.getElementById('showuser{{$count}}-form').submit();">
                  {{$dono}}
                </a>
                <form id="showuser{{$count}}-form" action="{{route('users.show', $criador->id )}}" method="" style="display: none;">
                  {{csrf_field()}}
                </form>
                <br />
                <p>Local: {{$voluntrab->local}}</p>
                <p>Descrição: {{$voluntrab->desc}}</p>
              </p>
            </div>
            <div class="card-action">
              <!-- Botão para ir para pagina individual de cada Requisição -->
              <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
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
            Este usuario não se cadastrou em nenhum trabalho voluntário ainda,
            vá até o menu "<a href="{{ route('voluntrabs.index') }}">Trabalhos Voluntários</a>" para escolher um de seu interesse!
          </h3>
          <br /><br /><br /><br />
        @endif

        </div>
        
        <!-- trabalhos completados -->
      <div id="test2" class="col s12">
          
                <?php $option = 0; ?>
                @foreach ($voluntrabs as $voluntrab)
                  @if ($voluntrab->status == 1)
                  <?php $hit = 0; ?>
                  @foreach ($voluntrab->user as $voluntrabuser)
                    @if($user->id == $voluntrabuser->id)
                      <?php $hit = 1; ?>
                    @endif
                  @endforeach
          
                  <!-- Se o hit der certo, ele passa por aqui e acha o 
                  nome do criador do trabalho-->
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
          
                    <!-- Card que mostra a Requisição do trabalho voluntário -->
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
                          <a class="" href="{{route('users.show', $criador->id )}}"
                          onclick="event.preventDefault();
                          document.getElementById('showuser{{$count}}-form').submit();">
                            {{$dono}}
                          </a>
                          <form id="showuser{{$count}}-form" action="{{route('users.show', $criador->id )}}" method="" style="display: none;">
                            {{csrf_field()}}
                          </form>
                          <br />
                          <p>Local: {{$voluntrab->local}}</p>
                          <p>Descrição: {{$voluntrab->desc}}</p>
                        </p>
                      </div>
                      <div class="card-action">
                        <!-- Botão para ir para pagina individual de cada Requisição -->
                        <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
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
                      Este usuario não completou nenhum trabalho voluntário ainda,
                      vá até o menu "<a href="{{ route('voluntrabs.index') }}">Trabalhos Voluntários</a>" para escolher um de seu interesse!
                    </h3>
                    <br /><br /><br /><br />
                  @endif
          
                  </div>



      </div>
    </div>
        <!-- Se o usuario for uma instituição mostra os trabalhos que ele requisitou -->
      @else
        <h2>Você requisitou os seguintes Trabalhos:</h2>
          <div class="divider"></div>

          <div class="row">
              
                      <ul class="tabs">
                        <li class="tab col s6"><a class="active blue-text" href="#test1">Em Andamento</a></li>
                        <li class="tab col s6"><a href="#test2" class="blue-text">Completos</a></li>
                      </ul>
              
          </div>
            <div class="row">
              <div class="col s12">
                <!-- Sistema de Hit para ver se o Trabalho sendo analizado
                é um no qual o usuario está cadastrado -->

                <!-- trabalhos em andamento -->
                <div id="test1" class="col s12">
                <?php $option = 0; ?>
                @foreach ($voluntrabs as $voluntrab)
                @if ($voluntrab->status == 0)
                <?php $hit = 0; ?>
                  @if($user->id == $voluntrab->user_id) 
                    <?php 
                    $hit = 1; 
                    $option = 1;
                    ?>
                  @endif

                  <!-- Se ele for o dono ele mostra o trabalho -->
                  @if ($hit === 1)
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
                                document.getElementById('showuser{{$count}}-form').submit();">
                                  {{$user->name}}
                              </a>
                              <form id="showuser{{$count}}-form" action="{{route('users.show', $user->id )}}" method="" style="display: none;">
                                {{csrf_field()}}
                              </form>

                              <br />
                              <p>Local: {{$voluntrab->local}}</p>
                              <p>Descrição: {{$voluntrab->desc}}</p>
                            </p>
                          </div>
                          <div class="card-action">
                            <!-- Botão para ir para pagina especifica de cada trabalho -->
                            <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
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
                  Esta instituição não tem nenhum trabalho voluntário em antamento,
                  vá até o menu "<a href="{{ route('voluntrabs.index') }}">Trabalhos Voluntários</a>" para requisitar um!
                  </h3>
                  <br /><br /><br /><br />
                @endif
                  
                </div>

                 <!-- trabalhos completados -->
                 <div id="test2" class="col s12">
                    <?php $option = 0; ?>
                    @foreach ($voluntrabs as $voluntrab)
                    @if ($voluntrab->status == 1)
                    <?php $hit = 0; ?>
                      @if($user->id == $voluntrab->user_id) 
                        <?php 
                        $hit = 1; 
                        $option = 1;
                        ?>
                      @endif
    
                      <!-- Se ele for o dono ele mostra o trabalho -->
                      @if ($hit === 1)
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
                                    document.getElementById('showuser{{$count}}-form').submit();">
                                      {{$user->name}}
                                  </a>
                                  <form id="showuser{{$count}}-form" action="{{route('users.show', $user->id )}}" method="" style="display: none;">
                                    {{csrf_field()}}
                                  </form>
    
                                  <br />
                                  <p>Local: {{$voluntrab->local}}</p>
                                  <p>Descrição: {{$voluntrab->desc}}</p>
                                </p>
                              </div>
                              <div class="card-action">
                                <!-- Botão para ir para pagina especifica de cada trabalho -->
                                <form action="{{route('voluntrabs.show', $voluntrab->id)}}" method="">
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
                      Esta instituição não tem nenhum trabalho voluntário conluido!
                      </h3>
                      <br /><br /><br /><br />
                    @endif
                      
                    </div>

              @endif
              </div>
            </div>
          <br /><br /><br />
</div>
<br /><br /><br /><br /><br />
</div>
@endsection
