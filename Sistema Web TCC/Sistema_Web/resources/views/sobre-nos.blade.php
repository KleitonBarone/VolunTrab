@extends('layouts.app')

@section('titulo', 'Sobre a Equipe - Voluntrab')

@section('sobre', 'active')

@section('content')
<!-- Pagina Sobre os Integrantes do TCC -->

        <div class="container">
    <div class="row center">
        <div class="col s12">
            
            <h1>Sobre a equipe</h1>
            
            <br> <br>
            
        </div>
    </div>
<div class="row">
    <div class="divider"></div>
    <div class="section">
       <div class="row">
       <div class="col s2">
       <img src="{{ asset('integrantes/kleiton.png') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Kleiton Barone
       <strong>Participação:</strong> Fez a programação do Sistema Web, além de cuidar de partes de todo o resto do projeto.
       </div>
       <div class="col s2">
       <img src="{{ asset('integrantes/Luan.jpg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Luan Siqueira
       <strong>Participação:</strong> Cuidou da Administração do grupo e da parte de Banco de dados do Sistema.
       </div>
      <div class="col s2">
        <img src="{{ asset('integrantes/naliato.jpg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Lucas Naliato
       <strong>Participação:</strong> Cuidou da Parte do Front End e do Banco de dados do Projeto.
       </div>
       </div>
       </div>
       <br>
  <div class="divider"></div>
  <div class="section">
       <div class="row center">
       <div class="col s2">
       <img src="{{ asset('integrantes/marsao.jpg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Vitor Marsão
       <strong>Participação:</strong> Cuidou da Parte do Front End e do Banco de dados do Projeto.
       </div>
        <div class="col s2">
       <img src="{{ asset('integrantes/leosao.jpg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Leonardo Fernandes
       <strong>Participação:</strong> Cuidou da parte de Banco de dados e de Design do Projeto.
       </div>
      <div class="col s2">
       <img src="{{ asset('integrantes/biel.jpg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Gabriel Villa
       <strong>Participação:</strong> Cuidou da parte de Front end do Projeto.
       </div>
       </div>
       </div>
       <br>
  <div class="divider"></div>
  <div class="section">
       <div class="row center">
       <div class="col s2">
       <img src="{{ asset('integrantes/stephanie.jpg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Stephanie Orihuela
       <strong>Participação:</strong> Cuidou da parte do Design do Projeto.
       </div>
        <div class="col s2">
       <img src="{{ asset('integrantes/analaura.jpeg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Ana Laura Santos
       <strong>Participação:</strong> Cuidou da parte do Design do Projeto.
       </div>
      <div class="col s2">
       <img src="{{ asset('integrantes/nathalia.jpg') }}" class="circle materialboxed responsive-img" width="" height="" >
       </div>
       <div class="col s2">
       <strong>Nome:</strong>Nathalia Mandeli
       <strong>Participação:</strong> Cuidou da parte do Design do Projeto.
       </div>
    </div>
  </div>
</div>
    <br /><br /><br />
    </div>
    <br /><br /><br /><br /><br />
   
@endsection
