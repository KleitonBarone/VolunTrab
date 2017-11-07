@extends('layouts.app')

@section('titulo', 'Controle de Trabalhos Voluntários- Voluntrab')

@section('admin', 'active')

@section('content')
<div class="container z-depth-5">
        <br />
        <div class="container">
            <h2 class="center">Controle de Trabalhos Voluntários</h2>
            <br /> <br />

            <div class="row">
                <ul class="tabs">
                    <li class="tab col s6"><a class="active blue-text" href="#test1">Em Andamento</a></li>
                    <li class="tab col s6"><a href="#test2" class="blue-text">Concluidas</a></li>
                </ul>
            </div>
            
            <!--Mostra as doações em andamento -->
            <div id="test1" class="col s12">
            <table>
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Local</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Opções</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $countandamento = 0;
                ?>
                    @foreach($voluntrabs as $voluntrab)
                    @if($voluntrab->status == 0)
                    <?php
                    $desc = substr ( $voluntrab->desc , 0 , 25 );
                    $local = substr ( $voluntrab->local , 0 , 25 );
                    ?>
                    <tr>
                        <td>{{$voluntrab->titulo}}</td>
                        
                        <td>{{$local}}...</td>
                        <td>{{$voluntrab->data}}</td>
                        <td>{{$desc}}...</td>
                        <td>
                        <div class="center">
                        <a class="btn btn-primary blue" href="{{route('voluntrabs.show', $voluntrab->id )}}">
                        <i class="material-icons">pageview</i>
                        </a>

                        <a class="btn btn-primary green" href="{{route('voluntrabs.edit', $voluntrab->id )}}">
                        <i class="material-icons">create</i>
                        </a>
                        
                        <form style="display: inline;" action="{{route('voluntrabs.destroy', $voluntrab->id)}}" method="post">
                                    {{csrf_field()}}
    
                                    <input type="hidden" name="_method" value="delete">
    
                                    <button class="btn red"><i class="material-icons">delete</i></button>
    
                                </form>
                        </div>
                        </td>
                    </tr>
                    <?php
                    $countandamento++;
                    ?>
                    @endif
                    @endforeach
                    @if ($countandamento == 0)
                        <tr>
                            <td>Sem Resultados</td>
                        </tr>
                        
                    @endif
                </tbody>
            </table>
                    @if ($countandamento == 0)
                    <br /><br /><br />
                    @endif
                    <br /><br /><br /><br /><br />
            </div>

            <!--Mostra as Doações Conluidas-->
            <div id="test2" class="col s12">
                <table>
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Local</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Opções</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $countcompleto = 0;
                    ?>
                    @foreach($voluntrabs as $voluntrab)
                    @if($voluntrab->status == 1)
                    <?php
                    $desc = substr ( $voluntrab->desc , 0 , 25 );
                    $local = substr ( $voluntrab->local , 0 , 25 );
                    ?>
                    <tr>
                        <td>{{$voluntrab->titulo}}</td>
                        <td>{{$local}}...</td>
                        <td>{{$voluntrab->data}}</td>
                        <td>{{$desc}}...</td>
                        <td>
                        <div class="center">
                        <a class="btn btn-primary blue" href="{{route('voluntrabs.show', $voluntrab->id )}}">
                        <i class="material-icons">pageview</i>
                        </a>

                        
                        <a class="btn btn-primary green" href="{{route('voluntrabs.edit', $voluntrab->id )}}">
                        <i class="material-icons">create</i>
                        </a>
                        
                        <form style="display: inline;" action="{{route('voluntrabs.destroy', $voluntrab->id)}}" method="post">
                                    {{csrf_field()}}
    
                                    <input type="hidden" name="_method" value="delete">
    
                                    <button class="btn red"><i class="material-icons">delete</i></button>
    
                                </form>
                        </div>
                        </td>
                    </tr>
                    <?php
                    $countcompleto++;
                    ?>
                    @endif
                    @endforeach
                    @if ($countcompleto == 0)
                        <tr>
                            <td>Sem Resultados</td>
                        </tr>
                    @endif
                </tbody>
            </table>
                    @if ($countcompleto == 0)
                    <br /><br /><br />
                    @endif
                    <br /><br /><br /><br /><br />
            </div>
        </div>
</div>
@endsection