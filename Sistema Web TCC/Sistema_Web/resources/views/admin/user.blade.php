@extends('layouts.app')

@section('titulo', 'Controle de Usuarios - Voluntrab')

@section('admin', 'active')

@section('content')
<div class="container z-depth-5">
        <br />
        <div class="container">
            <h2 class="center">Controle de Usuarios</h2>
            <br /> <br />

            <div class="row">
                <ul class="tabs">
                    <li class="tab col s6"><a class="active blue-text" href="#test1">Voluntários</a></li>
                    <li class="tab col s6"><a href="#test2" class="blue-text">Instituições</a></li>
                </ul>
            </div>
            
            <!--Mostra os usuarios voluntários -->
            <div id="test1" class="col s12">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Opções</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $countvolun = 0;
                ?>
                    @foreach($users as $user)
                    @if($user->tipo == 1)
                    <tr>
                        <td>{{$user->name}}</td>
                        
                        <td>{{$user->datanasc}}</td>
                        <td>{{$user->tel}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <div class="center">
                        <a class="btn btn-primary blue" href="{{route('users.show', $user->id )}}">
                        <i class="material-icons">pageview</i>
                        </a>

                        <a class="btn btn-primary green" href="{{route('users.edit', $user->id )}}">
                        <i class="material-icons">create</i>
                        </a>
                        
                    
                        </div>
                        </td>
                    </tr>
                    <?php
                    $countvolun++;
                    ?>
                    @endif
                    @endforeach
                    @if ($countvolun == 0)
                        <tr>
                            <td>Sem Resultados</td>
                        </tr>
                        
                    @endif
                </tbody>
            </table>
                    @if ($countvolun == 0)
                    <br /><br /><br />
                    @endif
                    <br /><br /><br /><br /><br />
            </div>

            <!--Mostra os Usuarios Instituições-->
            <div id="test2" class="col s12">
                <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Opções</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $countinst = 0;
                    ?>
                    @foreach($users as $user)
                    @if($user->tipo == 2)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->tel}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <div class="center">
                        <a class="btn btn-primary blue" href="{{route('users.show', $user->id )}}">
                        <i class="material-icons">pageview</i>
                        </a>

                        
                        <a class="btn btn-primary green" href="{{route('users.edit', $user->id )}}">
                        <i class="material-icons">create</i>
                        </a>
                        
                        
                        </div>
                        </td>
                    </tr>
                    <?php
                    $countinst++;
                    ?>
                    @endif
                    @endforeach
                    @if ($countinst == 0)
                        <tr>
                            <td>Sem Resultados</td>
                        </tr>
                    @endif
                </tbody>
            </table>
                    @if ($countinst == 0)
                    <br /><br /><br />
                    @endif
                    <br /><br /><br /><br /><br />
                    <br /><br /><br />
            </div>
        </div>
        <br /><br /><br /><br /><br /><br />
</div>
@endsection