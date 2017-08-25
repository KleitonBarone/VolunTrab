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
                <h4>Logar</h4>
                    </div>
                </div>
                <div class="container">
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email">Endereço de Email</label>
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
                                <label for="password" class="">Senha</label>
                                @if ($errors->has('password'))
                                    <span class="help-block red-text">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="row form-group">
                            <div class="col s8 offset-s4">
                                <button type="submit" class="btn btn-primary blue">
                                    Logar
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
<br />
<br />
<br />
@endsection
