@extends('layouts.app')

@section('titulo', 'Editar Requisição de Doação - Voluntrab')

@section('doacoes', 'active')

@section('content')
<!-- Pagina Para Editar uma Requisição de Doação -->

<div class="container z-depth-5">
    <div class="container">
        <div class="row center">
            <br /><br />

            <!-- Botão para voltar para pagina onde mostra a Doação -->
            <div class="left-align">
                <a class="waves-effect waves-light btn blue" href="{{ route('doacaos.show', $doacao->id) }}">
                    <i class="material-icons left">arrow_back</i>Voltar
                </a>
            </div>

            <!-- Titulo -->
            <div class="col s12">
                <h1 class="center">Editar Requisição de Doação</h1>
            </div>

        </div>

        <div class="divider"></div>

        <br />

        <div class="row center">
            <div class="col s12">

                <form enctype="multipart/form-data" action="{{ route('doacaos.update', $doacao->id) }}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">

                    <!-- Campo Item da Doação -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="item" type="text" class="validate" name="item" value="{{$doacao->item}}" required>
                            <label for="data">Item</label>                                   
                        </div>
                    </div>

                    <!-- Campo Imagem para o Item -->
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Imagem do Item</span>
                            <input type="file" name="avatar" id="avatar">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <!-- Campo Data -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="data" type="text" class="validate" name="data" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                            title="Escreva a data desse modo: XX/XX/XXXX" placeholder="XX/XX/XXXX" value="{{$doacao->data}}" required>
                            <label for="data">Data da Doação</label>                                 
                        </div>
                    </div>

                    <!-- Campo Local da Doação -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="local" type="text" class="validate" name="local" value="{{$doacao->local}}" required>
                            <label for="data">Local</label>                                   
                        </div>
                    </div>

                    <!-- Campo Descrição da Doação -->
                    <div class="row">
                        <div class="input-field">
                            <textarea id="desc" class="validate materialize-textarea" name="desc"  required>{{$doacao->desc}}</textarea>
                            <label for="desc">Descrição da Doação</label>
                        </div>
                    </div>

                    <br />
                    <!-- Botão Enviar -->
                    <div class="center">
                        <br />  
                        <button class="waves-effect waves-light blue darken-2 btn" type="submit">Editar</button>
                    </div>
        
                </form>
            </div>
        </div>
    <br /><br /><br /><br /><br /><br /><br /><br />
    </div>
</div>

<!-- Mascara HTML para campo Data -->
<script>
    jQuery(function($){
        $("#data").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
    });
</script>
@endsection