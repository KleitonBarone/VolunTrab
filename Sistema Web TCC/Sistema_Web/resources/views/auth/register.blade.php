@extends('layouts.app')

@section('content')
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
                        <h4>Registrar-se</h4>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                    <ul class="tabs">
                        <li class="tab col s6"><a class="active" href="#test1">Voluntário</a></li>
                        <li class="tab col s6"><a href="#test2">Instituição</a></li>
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

                        <div class="row form-group">
                            
                                                        <div class="input-field col s12">
                                                            <input id="cpf" type="text" class="validate" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                                                            title="Digite o CPF no formato nnn.nnn.nnn-nn" placeholder="nnn.nnn.nnn-nn" required>
                                                            <label for="cpf">CPF</label>
                                                           
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
                                                            <input id="tel" type="text" class="validate" name="tel" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                                                            title="Escreva o telefone desse modo: (XX) XXXX-XXXX" placeholder="(XX)XXXX-XXXX" required>
                                                            <label for="tel">Telefone</label>
                                                           
                                                        </div>
                         </div>

                         <div class="row form-group">
                            
                                                        <div class="input-field col s12">
                                                            <input id="datanasc" type="text" class="validate" name="datanasc" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                                                            title="Escreva a data desse modo: XX/XX/XXXX" placeholder="XX/XX/XXXX" required>
                                                            <label for="datanasc">Data de Nascimento</label>
                                                           
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

                        <input type="hidden" name="cnpj" id="cnpj" value="">

                        <div class="row form-group">
                            <div class="center">
                                <button type="submit" class="waves-effect waves-teal btn-flat">
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
                                                            <input id="tel" type="text" class="validate" name="tel" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                                                            title="Escreva o telefone desse modo: (XX)XXXX-XXXX" placeholder="(XX)XXXX-XXXX" required>
                                                            <label for="tel">Telefone</label>
                                                           
                                                        </div>
                         </div>

                         <div class="row form-group">
                            
                                                        <div class="input-field col s12">
                                                            <input id="cnpj" type="text" class="validate" name="cnpj" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}\/[0-9]{4}-[0-9]{2}$"
                                                            title="Escreva o CNPJ desse modo: XX.XXX.XXX/XXXX-XX" placeholder="XX.XXX.XXX/XXXX-XX" required>
                                                            <label for="cnpj">CNPJ</label>
                                                           
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

                        <input type="hidden" name="datanasc" id="datanasc" value="" >
                        <input type="hidden" name="cpf" id="cpf" value="" >

                        <div class="row form-group">
                            <div class="center">
                                <button type="submit" class="waves-effect waves-teal btn-flat">
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
@endsection
