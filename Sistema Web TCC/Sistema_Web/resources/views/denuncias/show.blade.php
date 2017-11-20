@extends('layouts.app')

@section('titulo', 'Denuncia - Voluntrab')

@section('admin', 'active')

@section('content')
@foreach($users as $user)
    @if($denuncia->id_delator == $user->id)
        <?php 
        $delator = $user->name; 
        
        ?>
    @endif

    @if($denuncia->user_id == $user->id)
        <?php $denunciado = $user->name; ?>
    @endif
@endforeach
<div class="container z-depth-5">
        <br />
        <div class="container">
            <h2 class="center">Denuncia
            <form style="display: inline;" action="{{route('denuncias.destroy', $denuncia->id)}}" method="post">
                                    {{csrf_field()}}
    
                                    <input type="hidden" name="_method" value="delete">
    
                                    <button class="btn red"><i class="material-icons">archive</i></button>
    
            </form>
            </h2>
            <br />
            <div class="divider"></div>
            <br /> <br />
            
                
                    <h5 class="center"> Motivo da denuncia: </h5>
                    <p>{{$denuncia->comentario}}</p>

                <br />
                <br />

                <div class="divider"></div>

            <div class="row">
                <br />

                <div class="col s6">
                    <h5 class="center">Nome do Delator: <p>{{$delator}}<p></h5>
                    <p class="center"> Ações:</p>
                    <div class="center">
                        <a class="btn btn-primary blue" href="{{route('users.show', $denuncia->id_delator )}}">
                        <i class="material-icons">pageview</i>
                        </a>

                        
                        <a class="btn btn-primary green" href="{{route('users.edit', $denuncia->id_delator )}}">
                        <i class="material-icons">create</i>
                        </a>
                    </div>
                </div>

                <div class="col s6">
                    <h5 class="center">Nome do Denunciado:<p>{{$denunciado}}</p></h5>
                    <p class="center"> Ações:</p>
                    <div class="center">
                        <a class="btn btn-primary blue" href="{{route('users.show', $denuncia->user_id )}}">
                        <i class="material-icons">pageview</i>
                        </a>

                        
                        <a class="btn btn-primary green" href="{{route('users.edit', $denuncia->user_id )}}">
                        <i class="material-icons">create</i>
                        </a>
                    </div>
                </div>

                

            </div>

        </div>
        <br /><br /><br /><br /><br /><br /><br /><br /><br />
        
</div>

@endsection