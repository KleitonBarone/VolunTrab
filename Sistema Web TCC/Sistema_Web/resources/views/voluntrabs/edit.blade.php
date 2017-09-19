@extends('layouts.app')

@section('titulo', 'Editar Requesição de Trabalho Voluntário - Voluntrab')

@section('content')
        <div class="container z-depth-5">
            <div class="container">
    <div class="row center">
        <br>
        <br>
        <div class="left-align">
            <a class="waves-effect waves-light btn blue" href="{{ route('voluntrabs.show', $voluntrab->id) }}">
            <i class="material-icons left">arrow_back</i>Voltar
            </a>
        </div>
        <div class="col s12">
        <h1 class="center">Editar Requisição de Trabalho Voluntário </h1>
        </div>
    </div>
            <div class="divider"></div>
        <br>
<div class="row center">
<div class="col s12">

        <form enctype="multipart/form-data" action="{{ route('voluntrabs.update', $voluntrab->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

                     <div class="file-field input-field">
                 <div class="btn">
                 <span>Imagem do Local</span>
                <input type="file" name="avatar" id="avatar">
             </div>
             <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
             </div>
              </div>

                                <div class="row">
                    <div class="input-field col s12">
                            <input id="data" type="text" class="validate" name="data" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                            title="Escreva a data desse modo: XX/XX/XXXX" placeholder="XX/XX/XXXX" value="{{$voluntrab->data}}" required>
                            <label for="data">Data do Trabalho</label>
                                                           
                    </div>
                </div>

                <div class="row">
                    
                    <div class="input-field">
                        <textarea id="desc" class="validate materialize-textarea" name="desc"  required>{{$voluntrab->desc}}</textarea>
                        <label for="desc">Descrição do Trabalho</label>
                    </div>
                </div>

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
   $("#data").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
});
</script>
@endsection