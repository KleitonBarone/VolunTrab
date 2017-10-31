@extends('layouts.app')

@section('titulo', 'Requisitar Doação - Voluntrab')

@section('doacoes', 'active')

@section('content')
<!-- Pagina Para Requisitar(Cadastrar) a Doação -->

<div class="container  z-depth-5">
    <div class="container">
        <div class="row center">

            <!-- Botão para voltar para a Pagina que mostra todas as Doações -->
            <div class="col s3">
                <br /><br />
                <a class="waves-effect waves-light btn blue" href="{{ route('doacaos.index') }}">
                    <i class="material-icons left">arrow_back</i>Voltar
                </a>
            </div>

            <div class="col s9">
                <h2>Cadastrar Doação</h2>
            </div>

        </div>

        <div class="divider"> </div>
        
        <div class="row center">
            <!-- Formulario para Cadastrar a Doação -->
            <form enctype="multipart/form-data" method="post" action="{{ route('doacaos.store') }}">
                {{csrf_field()}}

                <!-- Campo Item para a Doação -->
                <div class="row">
                    <div class="input-field col s12">
                            <input id="item" type="text" class="validate" name="item" required>
                            <label for="data">Item a ser Requisitado</label>                                   
                    </div>
                </div>

                <!-- Campo imagem para a Doação -->
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagem do Item</span>
                        <input type="file" name="avatar" id="avatar">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <!-- Campo Data de Acontecimento da Doação -->
                <div class="row">
                    <div class="input-field col s12">
                            <input id="data" type="text" class="validate" name="data" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                            title="Escreva a data desse modo: XX/XX/XXXX" placeholder="XX/XX/XXXX" required>
                            <label for="data">Data da Doação</label>                                   
                    </div>
                </div>

                <!-- Campo Local para a Doação -->
                <div class="row">
                    <div class="input-field col s12">
                            <input id="local" type="text" class="validate" name="local" required>
                            <label for="data">Local da Doação</label>                                   
                    </div>
                </div>

                <!-- Campo Descrição da doação -->
                <div class="row"> 
                    <div class="input-field">
                        <textarea id="desc" class="validate materialize-textarea" name="desc"  required></textarea>
                        <label for="desc">Descrição da Doação</label>
                    </div>
                </div>

                <!-- Campo hidden Para armazenar o ID do criador do Trabalho -->
                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">


                <!-- Botão Submit para enviar o formulário -->
                <div class="center">
                    <button class="waves-effect waves-light blue darken-2 btn" type="submit">Cadastrar Requisição de Doação</button>
                </div>
                   
            </form>
    <br /><br /><br />
        </div>
    <br /><br /><br /><br /><br />
    </div>
</div>

<!-- Mascara Html para o campo Data -->
<script>
    jQuery(function($){
        $("#data").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
    });
</script>
@endsection