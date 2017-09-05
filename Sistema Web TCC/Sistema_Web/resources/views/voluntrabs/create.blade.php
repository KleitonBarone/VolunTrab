@extends('layouts.app')

@section('content')
<!-- a fazer: pagina melhor -->

        <div class="container">
    <div class="row center">
        <div class="col s12">
            <h2>Cadastrar Trabalho Voluntário</h2>
            <div class="divider"> </div>
        </div>
    </div>
<div class="row">
    <div class="col s12">
        <form method="post" action="{{ route('voluntrabs.store') }}">
                    {{csrf_field()}}
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
                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}"

                    <div class="center">
                    <button class="waves-effect waves-light yellow darken-2 btn" type="submit">Cadastrar Trabalho Voluntário</button>
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
