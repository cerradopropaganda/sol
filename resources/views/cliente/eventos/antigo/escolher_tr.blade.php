@extends('layout.cliente')

@section('titulo','Escolher Objeto')

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

                <h5 class="card-title  white-text">Escolha o Termo de Referência</h5>
               
            </div>
            <div class="card-content grey lighten-3" style="padding: 10px 25px;">


                      <div class="input-field">
                        <select name="categoria" style=" width: 350px">
                            <!--<option value="" disabled selected>Escolha uma opção</option>-->
                              <option selected="" value="MATERIAL EXPEDIENTE">MATERIAL EXPEDIENTE</option>
                              <option value="MATERIAL DE CONSUMO">MATERIAL DE CONSUMO</option>
                              <option value="MATERIAL PERMANENTE">MATERIAL PERMANENTE</option>
                              <option value="SERVIÇOS">SERVIÇOS</option>
                              <option value="OBRAS E SERVIÇOS DE ENGENHARIA">OBRAS E SERVIÇOS DE ENGENHARIA</option>
                              <option value="LOCAÇÕES DIVERSAS">LOCAÇÕES DIVERSAS</option>
                              <option value="SERVIÇOS E PEÇAS">SERVIÇOS E PEÇAS</option>
                              <option value="MATERIAL PERMANENTE E SERVIÇOS">MATERIAL PERMANENTE E SERVIÇOS</option>
                          </select>
                        <label>CATEGORIA</label>
                      </div>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.fiscais.salvar')}}">
                        
                        {{ csrf_field() }}

                            <labe><H6>Termos de Referência disponíveis</H6></label><br>

                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_presencial" />
                                <label for="licitacao_presencial">Nome completo do termo de referência 1</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_eletronica" />
                                <label for="licitacao_eletronica">Nome completo do termo de referência 2</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="dispensa_licitacao"  />
                                <label for="dispensa_licitacao">Nome completo do termo de referência 3</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="inexigibilidade_licitacao"  />
                                <label for="inexigibilidade_licitacao">Nome completo do termo de referência 4</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="credenciamento"  />
                                <label for="credenciamento">Nome completo do termo de referência 5</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do termo de referência 6</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do termo de referência 7</label>
                              </p>
                              
                            <BR><BR>



                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('cliente.eventos.especificar_itens')}}'" class="btn teal lighten-2">Especificar Itens</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection