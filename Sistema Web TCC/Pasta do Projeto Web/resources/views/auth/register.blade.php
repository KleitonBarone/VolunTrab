@extends('layouts.app')

@section('titulo', 'Cadastro - Voluntrab')

@section('conteudo')
<br />
<br />
<br />
<br />
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">

            <div class="card">
                <br>
                <div class="row">
                    <div class="col s11 offset-s1">
                        <h4>Registrar</h4>
                    </div>
                </div>

                <div class="container">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            

                            <div class="input-field col s12">
                                <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name">Nome</label>
                                @if ($errors->has('name'))
                                    <span class="help-block red-text">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
                                <label for="email" >Endereço de Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block red-text">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Senha</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            

                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
                                <label for="password-confirm">Confirmar Senha</label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col s8 offset-s4">
                                <button type="submit" class="btn btn-primary yellow darken-2">
                                    Registrar
                                </button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
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
@endsection
