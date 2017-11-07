@extends('layouts.app')

@section('titulo', 'Centro de Denuncias - Voluntrab')

@section('admin', 'active')

@section('content')
<div class="container z-depth-5">
        <br />
        <div class="container">
            <h2 class="center">Controle de Denuncias</h2>
            <br />
            <div class="divider"></div>
            <br /> <br />

             <table>
                <thead>
                    <tr>
                        <th>Delator</th>
                        <th>Motivo</th>
                        <th>Denunciado</th>
                        <th>Opções</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($denuncias as $denuncia)
                    <tr>
                        @foreach($users as $user)
                            @if($denuncia->id_delator == $user->id)
                            <?php $delator = $user->name; ?>
                            @endif
                            @if($denuncia->user_id == $user->id)
                            <?php $denunciado = $user->name; ?>
                            @endif
                        @endforeach
                        <td>{{$delator}}</td>
                        
                        <td>{{$denuncia->comentario}}</td>
                        <td>{{$denunciado}}</td>
                        <td>
                        <div class="center">
                        <a class="btn btn-primary blue" href="{{route('users.show', $denuncia->user_id )}}">
                        <i class="material-icons">pageview</i>
                        </a>

                        <form style="display: inline;" action="{{route('denuncias.destroy', $denuncia->id)}}" method="post">
                                    {{csrf_field()}}
    
                                    <input type="hidden" name="_method" value="delete">
    
                                    <button class="btn red"><i class="material-icons">archive</i></button>
    
                        </form>

                        </div>
                        </td>
                    </tr>
                    
                    
                    
                    @empty
                        <tr>
                            <td>Sem Resultados</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>

        <br /><br /><br /><br /><br /><br />
        </div>
        <br /><br /><br /><br /><br />
</div>
@endsection