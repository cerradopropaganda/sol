@extends('layout.home')

@section('titulo','SOL - Sistema Otimizador de Licitação')

@section('breadcrumb')

  <!-- <nav>
    <div class="nav-wrapper grey lighten-3">
      <div class="col s12">
        <a href="#!" class="breadcrumb">/home</a>
      </div>
    </div>
  </nav>
-->
@endsection

@section('conteudo')
    <br><br>
    <div class="container">
    <div class="row">

        <div class="col s12 m6">
          <div class="card teal lighten-2">
            <div class="card-content white-text">
              <span class="card-title">ÁREA DO CLIENTE</span><br>
              <p>No painel CLIENTE, você poderá fazer cadastros, criar Eventos, gerar Documentos, imprimir Cotações e solicitar novos Itens/Orçamentos</p><br><br>
              <a href="{{route('cliente.index')}}" class="btn halfway-fab btn-large left waves-effect waves-light blue-grey darken-1" ><i class="material-icons left">chevron_right</i>Acessar</a>
            </div>
            <!-- <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div> -->
          </div>
        </div>

        <div class="col s12 m6">
          <div class="card blue darken-1">
            <div class="card-content white-text">
              <span class="card-title">ÁREA ADMINISTRATIVA</span><br>
              <p>No painel ADMINISTRADOR, você poderá fazer cadastros, incluir documentos, gerar relatórios e receber solicitações</p><br><br>
              <a href="{{route('admin.index')}}" class="btn halfway-fab btn-large left waves-effect waves-light blue-grey darken-1" ><i class="material-icons left">chevron_right</i>Acessar</a>
            </div>
            <!-- <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div> -->
          </div>
        </div>

      </div>

    </div>
@endsection