@extends('layouts.app')

@section('titulo', 'Editar Requesição de Trabalho Voluntário - Voluntrab')

@section('content')
        <div class="container">
    <div class="row center">
        <div class="col s12">
        <h1 class="center">Editar Requisição de Trabalho Voluntário </h1>
            <div class="divider"></div>
        <br>
        <form action="{{ route('voluntrabs.update', $voluntrab->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

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