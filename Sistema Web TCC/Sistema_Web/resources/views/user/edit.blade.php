@extends('layouts.app')

@section('perfil', 'active')

@section('titulo', 'Editar Perfil - Voluntrab')

@section('content')
<!-- a fazer: pagina melhor -->

        <div class="container z-depth-5">
            <div class="container">
    <div class="row center">

            <div class="col s3">
                <br>
                <br>
                    <a class="waves-effect waves-light btn blue" href="{{ route('users.show', $user->id) }}">
                    <i class="material-icons left">arrow_back</i>Voltar
                    </a>
            </div>
        <div class="col s9">
        <h1 class="center">Editar Perfil de {{$user->name}} </h1>
        </div>
        </div>
        <div class="row center">
            <div class="col s12">
            <div class="divider"></div>
        <br>
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

            <div class="file-field input-field">
                 <div class="btn">
                 <span>Imagem de Perfil</span>
                <input type="file" name="avatar" id="avatar">
             </div>
             <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
             </div>
              </div>

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

                    <input type="hidden" id="datanasc" name="datanasc" value="" >
        @endif
                   <br>
                    <div class="center">
                    <br>  
                    <button class="waves-effect waves-light blue darken-2 btn" type="submit">Editar</button>
                    </div>
        
                </form>
        </div>
    </div>
    <br>

    <br>
    <br>
    <br>

    <br>
    <br>
    <br>
        <br>
    </div>
</div>
   <script>
jQuery(function($){
   $("#datanasc").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
   $("#tel").mask("(99) 9999-9999");
});
   </script>
@endsection