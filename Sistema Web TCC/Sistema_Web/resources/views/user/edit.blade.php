@extends('layouts.app')

@section('perfil', 'active')

@section('titulo', 'Editar Perfil - Voluntrab')

@section('content')
<!-- Pagina de Editar Perfil de Usuario -->
<div class="container z-depth-5">
    <div class="container">

        <div class="row center">
            <div class="col s3">
                <br /><br />
                <a class="waves-effect waves-light btn blue" href="{{ route('users.show', $user->id) }}">
                    <i class="material-icons left">arrow_back</i>Voltar
                </a>
            </div>
            <div class="col s9">
                <!-- Titulo da Pagina -->
                <h1 class="center">Editar Perfil de {{$user->name}} </h1>
            </div>
        </div>

        <div class="row center">
            <div class="col s12">

                <div class="divider"></div>
                <br />

                <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">
                    
                    <!-- Campo da Imagem de Perfil -->
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
                    <!-- Formulario de Edição Caso o Usuario for um Voluntário -->

                    <!-- Campo Nome -->
                    <div class="input-field">
                        <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" required autofocus>
                        <label for="name">Nome</label>
                    </div>

                    <!-- Campo Email -->
                    <div class="input-field">
                                <input id="email" type="email" class="validate" name="email" value="{{ $user->email }}" required>
                                <label for="email" >Endereço de Email</label>
                    </div>

                     <!-- Campo Telefone -->
                    <div class="input-field">
                             <input id="tel" type="text" class="validate telefone" name="tel" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                             title="Escreva o telefone desse modo: (XX) XXXX-XXXX" placeholder="(XX) XXXX-XXXX" value="{{$user->tel}}" required>
                             <label for="tel">Telefone</label>                                  
                    </div>

                    <!-- Campo Data de Nascimento -->
                    <div class="input-field">
                            <input id="datanasc" type="text" class="validate" name="datanasc" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                            title="Escreva a data desse modo: XX/XX/XXXX" placeholder="XX/XX/XXXX" value ="{{$user->datanasc}}" required>
                            <label for="datanasc">Data de Nascimento</label>
                    </div>

                    @else
                    <!-- Formulário Caso o Usuario for Instituição -->

                    <!-- Campo Nome -->
                    <div class="input-field">
                        <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" required autofocus>
                        <label for="name">Nome</label>
                    </div>

                    <!-- Campo Email -->
                    <div class="input-field">
                        <input id="email" type="email" class="validate" name="email" value="{{ $user->email }}" required>
                        <label for="email" >Endereço de Email</label>
                    </div>

                    <!-- Campo Telefone -->
                    <div class="input-field">
                        <input id="tel" type="text" class="validate telefone" name="tel" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                        title="Escreva o telefone desse modo: (XX) XXXX-XXXX" placeholder="(XX) XXXX-XXXX" value="{{$user->tel}}" required>
                        <label for="tel">Telefone</label>                                  
                    </div>

                    <!-- Campo Data de Nascimento, para não bugar no Controller (Será arrumado no Futuro)-->
                    <input type="hidden" id="datanasc" name="datanasc" value="" >

                    @endif

                    <!-- Botão Enviar -->
                    <div class="center">
                    <br /><br />  
                        <button class="waves-effect waves-light blue darken-2 btn" type="submit">Editar</button>
                    </div>
        
                </form>
            </div>
        </div>
        <br /><br /><br /><br /><br /><br /><br /><br />
    </div>
</div>

<!-- Mascara HTML para os campos Data de Nascimento e Telefone -->
<script>
jQuery(function($){
   $("#datanasc").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
});
</script>
<script>
jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
</script>

@endsection