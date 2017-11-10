@extends('layouts.app')

@section('titulo', 'Conquistas - Voluntrab')

@section('content')
<div class="container">
    <div class="row center">
      <div class="col s12">
        <h2>Conquistas</h2>
         <br /><br />
        <div class="divider"></div>
      </div>
    </div>

    <div class="row">
        <ul class="tabs">
          <li class="tab col s6"><a class="active blue-text" href="#test1">Conquistas Desponiveis</a></li>
          <li class="tab col s6"><a href="#test2" class="blue-text">Ranking</a></li>
        </ul>
    </div>

    <!-- Mostra as conquistas -->
    <div id="test1" class="col s12">

    

    <!--foreach de todas as conquistas-->
    @forelse($conquistas as $conquista)
    <div class="col s4">
    <div class="card horizontal">
      <div class="card-image">
        <img src="{{ asset('conquistas_image/' . $conquista->icone) }}" width="300" height="300" style="">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>{{$conquista->nome}}</p>
        </div>
        <div class="card-action">
          <form action="{{route('conquistas.show', $conquista->id)}}" method="">
                {{csrf_field()}}
                <button class="waves-effect waves-light btn-flat blue-text text-darken-2" type="submit">Ver Conquista</button>
          </form>
        </div>
      </div>
    </div>
    </div>
    @empty
    <br /> <br />
    <h4 class="center">Nenhuma conquista foi registrada ainda</h4>
    <br /> <br /> <br /> <br /> <br />
    @endforelse
    <br /> <br /> <br /> <br /> <br /> <br /> 

    </div>

    <!-- Mostra o ranking de quem tem mais conquistas completadas -->
    <div id="test2" class="col s12">
    
    <table>
        <thead>
          <tr>
              <th>Nome</th>
              <th>Numero de Conquistas</th>
          </tr>
        </thead>

        <tbody>
          @forelse($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{count($user->conquista)}}</td>
          </tr>
          @empty
          <tr>
            <td>Nenhum resultado encontrado</td>
          </tr>
          @endforelse
        </tbody>
    </table>
      <br /> <br /> <br /> <br /> <br /> <br /> 
    </div>

</div>
@endsection