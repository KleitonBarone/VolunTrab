@extends('layouts.app')

@section('trabalhos', 'active')

@section('titulo', 'Avaliar Participantes - Voluntrab')

@section('content')
<!-- Pagina Avaliar Participantes -->
<script>
$(document).ready(function() {
    $('select').material_select();
  });
</script>

<div class="container z-depth-5">
    <div class="container">

        <div class="row center">
            <div class="col s12">
                <!-- Titulo da Pagina -->
                <h1 class="center">Avaliar Participantes</h1>
            </div>
        </div>

        <div class="row center">
            <div class="col s12">

                
                <br />

                <form action="{{ route('user.avalia', $avaliador) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" id="numero" name="numero" value="{{ count($avaliados) }}" >

                   <input type="hidden" id="avaliadorid" name="avaliadorid" value="{{ $avaliador->id }}" >

                <?php
                $count = 0;
                ?>
                @foreach ($avaliados as $avaliado)
                    <div class="divider"></div>
                    <h3 class="center">{{$avaliado->name}}</h3>
                    <!-- id -->
                    <input type="hidden" id="id{{$count}}" name="id{{$count}}" value="{{ $avaliado->id }}" >
                    <!-- nota -->
                    <div class="row">
                    <div class="input-field col s12">
                        <select id="nota{{$count}}" name="nota{{$count}}">
                            <option value="" disabled selected>De uma nota de 1 a 5</option>
                            <option value="1">Nota 1</option>
                            <option value="2">Nota 2</option>
                            <option value="3">Nota 3</option>
                            <option value="4">Nota 4</option>
                            <option value="5">Nota 5</option>
                        </select>
                        <label>Nota</label>
                    </div>
                    </div>
                    
                    <!-- comentario -->
                    <div class="row">
                        <div class="input-field">
                            <textarea id="comentario{{$count}}" class="validate materialize-textarea" name="comentario{{$count}}"  required></textarea>
                            <label for="desc">Comentario</label>
                        </div>
                    </div>

                    <?php
                    $count++;
                    ?>
                @endforeach
                
                <div class="center">
                    <button class="waves-effect waves-light blue btn" type="submit">Avaliar Usuarios!</button>
                </div>
                <br /><br /> 
                </form>
            </div>
        </div>
        <br /><br /><br /><br /><br /><br /><br /><br />
    </div>
</div>


@endsection