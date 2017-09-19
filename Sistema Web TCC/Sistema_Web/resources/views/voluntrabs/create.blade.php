@extends('layouts.app')

@section('titulo', 'Requisitar Trabalho Voluntário - Voluntrab')

@section('content')
<!-- a fazer: pagina melhor -->

        <div class="container  z-depth-5">
            <div class="container">
    <div class="row center">
            <div class="col s3">
                <br>
                <br>
                    <a class="waves-effect waves-light btn blue" href="{{ route('voluntrabs.index') }}">
                    <i class="material-icons left">arrow_back</i>Voltar
                    </a>
                    </div>
        <div class="col s9">
            <h2>Cadastrar Trabalho Voluntário</h2>
        </div>
    </div>
            <div class="divider"> </div>
        
<div class="row center">
        <form enctype="multipart/form-data" method="post" action="{{ route('voluntrabs.store') }}">
                    {{csrf_field()}}

                <div class="file-field input-field">
                 <div class="btn">
                 <span>Imagem do Trabalho</span>
                <input type="file" name="avatar" id="avatar">
             </div>
             <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
             </div>
              </div>

                <div class="row">
                    <div class="input-field col s12">
                            <input id="data" type="text" class="validate" name="data" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                            title="Escreva a data desse modo: XX/XX/XXXX" placeholder="XX/XX/XXXX" required>
                            <label for="data">Data do Trabalho</label>
                                                           
                    </div>
                </div>

                <div class="row">
                    
                    <div class="input-field">
                        <textarea id="desc" class="validate materialize-textarea" name="desc"  required></textarea>
                        <label for="desc">Descrição do Trabalho</label>
                    </div>
                </div>
                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">

                    <div class="center">
                    <button class="waves-effect waves-light blue darken-2 btn" type="submit">Cadastrar Trabalho Voluntário</button>
                    </div>
                   
                </form>
    <br>
    <br>
    <br>
</div>
    <br>
    <br>
    <br>
    <br>
        <br>
</div>
</div>
   <script>
jQuery(function($){
   $("#data").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
});
</script>
@endsection
