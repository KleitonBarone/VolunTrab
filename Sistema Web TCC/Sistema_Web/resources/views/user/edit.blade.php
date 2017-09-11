@extends('layouts.app')

@section('titulo', 'Editar Perfil - Voluntrab')

@section('content')
<!-- a fazer: pagina melhor -->

        <div class="container">
    <div class="row center">
        <div class="col s12">
        <h1 class="center">Editar Perfil de {{$user->name}} </h1>
            <div class="divider"></div>
        <br>
        <form action="{{ route('users.update', $user->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

        @if ($user->tipo == 1)
                    <div class="input-field">
                        <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" required autofocus>
                        <label for="name">Nome</label>
                    </div>

                     <div class="input-field">
                                <input id="email" type="email" class="validate" name="email" value="{{ $user->email }}" required>
                                <label for="email" >Endereço de Email</label>
                     </div>

                     <div class="input-field">
                             <input id="tel" type="text" class="validate" name="tel" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                             title="Escreva o telefone desse modo: (XX) XXXX-XXXX" placeholder="(XX) XXXX-XXXX" value="{{$user->tel}}" required>
                            <label for="tel">Telefone</label>                                  
                    </div>

                     <div class="input-field">
                               <input id="datanasc" type="text" class="validate" name="datanasc" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                              title="Escreva a data desse modo: XX/XX/XXXX" placeholder="XX/XX/XXXX" value ="{{$user->datanasc}}" required>
                               <label for="datanasc">Data de Nascimento</label>
                                </div>
        @else
                    <div class="input-field">
                        <input id="nome" class="form-control" type="text" name="nome" value="{{$user->nome}}" required autofocus>
                        <label for="nome">Nome</label>
                    </div>

                     <div class="input-field">
                                <input id="email" type="email" class="validate" name="email" value="{{ $user->email }}" required>
                                <label for="email" >Endereço de Email</label>
                     </div>

                     <div class="input-field">
                             <input id="tel" type="text" class="validate" name="tel" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                             title="Escreva o telefone desse modo: (XX) XXXX-XXXX" placeholder="(XX) XXXX-XXXX" value="{{$user->tel}}" required>
                            <label for="tel">Telefone</label>                                  
                    </div>

                    <input type="hidden" id="datanasc" name="datanasc" value="" >
        @endif
                   <br>
                    <div class="center">
                    <br>  
                    <button class="waves-effect waves-light yellow darken-2 btn" type="submit">Editar</button>
                    </div>
        
                </form>
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