
@extends('layout.cliente')

@section('titulo','Documentos da Fase Interna')

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

<div class="container">
   <div class="row">
        <div class="col s12 m12">
          <br>
          <div class="card ">


            <div class="card-content teal lighten-2" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Selecione os documentos da Fase Interna</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.fiscais.salvar')}}">
                        
                        {{ csrf_field() }}



                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="checkbox" id="licitacao_presencial" />
                                <label for="licitacao_presencial">Ofício</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="checkbox" id="licitacao_eletronica" />
                                <label for="licitacao_eletronica">Despacho da CPL</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="checkbox" id="dispensa_licitacao"  />
                                <label for="dispensa_licitacao">Autorização para Licitar</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="inexigibilidade_licitacao"  />
                                <label for="inexigibilidade_licitacao">Portaria de Fiscal de Contrato</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="credenciamento"  />
                                <label for="credenciamento">Carta de Credenciamento</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="patrocinio"  />
                                <label for="patrocinio">Minuta do Contrato</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="patrocinio"  />
                                <label for="patrocinio">Declaração de Saldo Orçamentário</label>
                              </p>





                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="checkbox" id="licitacao_eletronica" />
                                <label for="licitacao_eletronica">Declaração de Fatos Impeditivos</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="checkbox" id="dispensa_licitacao"  />
                                <label for="dispensa_licitacao">Declaração que não emprega menor </label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="inexigibilidade_licitacao"  />
                                <label for="inexigibilidade_licitacao">Declaração de Aceitação dos Termos do Edital </label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="credenciamento"  />
                                <label for="credenciamento">Declaração de ME ou EPP </label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="patrocinio"  />
                                <label for="patrocinio">Declaração de Atendimentos aos requisitos de habilitação</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="patrocinio"  />
                                <label for="patrocinio">  Edital de pregão presencial </label>
                              </p>
                              

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="patrocinio"  />
                                <label for="patrocinio">  Edital de pregão presencial </label>
                              </p>


                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="checkbox" id="patrocinio"  />
                                <label for="patrocinio">   Carta de credenciamento pregão  </label>
                              </p>
       
                            <BR><BR>



                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('cliente.eventos.fase_interna_download')}}'" class="btn teal lighten-2">GERAR PDFs</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection