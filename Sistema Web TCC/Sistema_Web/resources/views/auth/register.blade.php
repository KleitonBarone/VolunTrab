@extends('layouts.app')

@section('titulo', 'Registrar-se - Voluntrab')

@section('content')
<div class="grey lighten-4">
<br />
<br />
<br />
<br />
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">

            <div class="card z-depth-5">
                <br>
                <div class="row">
                    <div class="col s11 offset-s1">
                        <h4>Registrar-se</h4>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                    <ul class="tabs">
                        <li class="tab col s6"><a class="active blue-text" href="#test1">Voluntário</a></li>
                        <li class="tab col s6"><a href="#test2" class="blue-text">Instituição</a></li>
                    </ul>
                    </div>
                    <!-- voluntário -->
                    <div class="row">
                    <div id="test1" class="col s12">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                            <input type="hidden" name="tipo" id="tipo" value="1">
                            <br>

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

                        <div class="row form-group">
                            
                                                        <div class="input-field col s12">
                                                            <input id="telvolun" type="text" class="validate" name="telvolun" required>
                                                            <label for="telvolun">Telefone</label>
                                                           
                                                        </div>
                         </div>

                         <div class="row form-group">
                            
                                                        <div class="input-field col s12">
                                                            <input id="datanasc" type="text" class="validate" name="datanasc"  required>
                                                            <label for="datanasc">Data de Nascimento</label>
                                                           
                                                        </div>
                         </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Senha</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('password') }}</strong>
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
                            <div class="center">
                                <button type="submit" class="waves-effect btn btn-primary blue darken-2">
                                    Registrar-se como Voluntário
                                </button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                    </div>
                    </div>
                    <!-- Instituição -->
                    <div class="row">
                    <div id="test2" class="col s12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="tipo" id="tipo" value="2" >


                        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required>
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

                        <div class="row form-group">
                            
                                                        <div class="input-field col s12">
                                                            <input id="telinst" type="text" class="validate" name="telinst" required>
                                                            <label for="telinst">Telefone</label>
                                                           
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
                            <div class="center">
                                <button type="submit" class="waves-effect btn btn-primary blue darken-2">
                                    Registrar-se como Instituição
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
    </div>
    </div>
<br />
<br />
<br />
<br />
<br />
<script>
jQuery(function($){
   $("#datanasc").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
   $("#telvolun").mask("(99) 9999-9999");
   $("#telinst").mask("(99) 9999-9999");
});
</script>
</div>
@endsection
