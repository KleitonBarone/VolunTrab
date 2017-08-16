@extends('layouts.app')

@section('titulo', 'Login - Voluntrab')

@section('conteudo')
<br />
<br />
<br />
<br />
<div class="container z-depth-5">
    <div class="row">
        <div class="">
            
            <div class="">
                <br>
                <div class="row">
                    <div class="col s11 offset-s1">
                <h4>Desejo Logar Como:</h4>
                    </div>
                </div>
                <br />
                <br />
                <br />
                <div class="container">
                    
                  <div class="row">
                        <div class="col s5">
                                <a href="{{ route('login') }}" class="waves-effect waves-light yellow darken-2 btn">Login como Voluntário</a>
                        </div>

                        <div class="col s5 offset-s2">
                                <a href="{{ url('/instituicaos/login') }}" class="waves-effect waves-light yellow darken-2 btn">Login como Instituição</a>
                        </div>
                  </div>
                    <br />
                    <br />
                    <br />

                </div>
            </div>
        </div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
@endsection