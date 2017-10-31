@extends('layouts.app')

@section('ajuda', 'active')

@section('content')
<!-- Pagina FAQ do Site -->
<div class="container">
  <div class="row center">

    <div class="col s12">
      <h2>Ajuda</h2>
        <br /><br />
        <h4>Perguntas frequentes</h4>
        <div class="divider"></div>
        
      </div>
    </div>

  <div class="row">
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header"><i class="material-icons">chevron_right</i>Como me voluntariar?</div>
        <div class="collapsible-body"><span>
        Para se voluntáriar, é necessário ter uma conta. Depois disso pode ir no menu de trabalhos
        voluntários, e ao achar um de seu interesse, há um botao no final da pagina do trabalho para você 
        se voluntáriar. Depois é só comparecer conforme explica o trabalho voluntário em questão.
        </span></div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">chevron_right</i>Como me cadastrar?</div>
        <div class="collapsible-body"><span>
        Para se cadastrar é só clicar no botão superior direito que está escrito "Cadastro". Escolha na 
        aba se você sepresenta um voluntário ou uma instituição, preencha o formulário, e clique em cadastrar-se.
        Pronto você tem uma conta em nosso site!
        </span></div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">chevron_right</i>Como fazer doações?</div>
        <div class="collapsible-body"><span>
        Para fazer Doações, é necessário ter uma conta. Depois disso pode ir no menu de doações
        , e ao achar um de seu interesse, há um botao no final da pagina do trabalho para você 
        se voluntáriar. Depois é só comparecer com sua doação no local conforme expecifica a requisição da 
        doação em questão.
        </span></div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">chevron_right</i>Como procurar por Voluntários?</div>
        <div class="collapsible-body"><span>
        Na verdade nesse site, os voluntários vao vir até você! você só precisa fazer uma requisição de um trabalho
        voluntário ou uma doação, depois esperar até que os voluntários participem de sua requisição. Se quiser saber
        mais sobre quem está participando das suas requisições é só clickar em cima do nome do voluntário na lista de 
        participantes da sua requisição.
        </span></div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">chevron_right</i>O que eu ganho com isso?</div>
        <div class="collapsible-body"><span>
        Além da Gratitude de ajudar outras pessoas, é possivel conseguir conquistas que provem o quanto você
        ajudou os outros!
        </span></div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">chevron_right</i>Como denunciar uma instituição ou voluntário?</div>
        <div class="collapsible-body"><span>
        Na pagina de Perfil de cada usuário tem uma botão para denuncia-lo. Apos isso um de nossos administradores
        vai cuidar do caso para você.
        </span></div>
      </li>
    </ul>
    </div>
  <br /><br /><br />
  </div>
<br /><br /><br /><br /><br />
   
@endsection
