@extends('layout.cliente')

@section('titulo','Adicionar Evento')

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

                <h5 class="card-title  white-text">Cadastrar um novo Evento</h5>
               
            </div>
            <div class="card-content grey lighten-3" style="padding: 10px 25px;">


                      <div class="input-field">
                        <select name="modalidade" style=" width: 350px">
                            <!--<option value="" disabled selected>Escolha uma opção</option>-->
                              <option selected="" value="LICITAÇÃO PRESENCIAL">LICITAÇÃO PRESENCIAL</option>
                              <option value="LICITAÇÃO ELETRÔNICA">LICITAÇÃO ELETRÔNICA</option>
                              <option value="DISPENSA DE LICITAÇÃO">DISPENSA DE LICITAÇÃO</option>
                              <option value="INEXIGIBILIDADE DE LICITAÇÃO">INEXIGIBILIDADE DE LICITAÇÃO</option>
                              <option value="CREDENCIAMENTO">CREDENCIAMENTO</option>
                              <option value="PATROCÍNIO">PATROCÍNIO</option>
                          </select>
                        <label>MODALIDADE</label>
                      </div>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.fiscais.salvar')}}">
                        
                        {{ csrf_field() }}

                            <labe><H6>Editais disponíveis</H6></label><br>

                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_presencial" />
                                <label for="licitacao_presencial">Nome completo do editar 1</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_eletronica" />
                                <label for="licitacao_eletronica">Nome completo do editar 2</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="dispensa_licitacao"  />
                                <label for="dispensa_licitacao">Nome completo do editar 3</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="inexigibilidade_licitacao"  />
                                <label for="inexigibilidade_licitacao">Nome completo do editar 4</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="credenciamento"  />
                                <label for="credenciamento">Nome completo do editar 5</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 6</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 7</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 8</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 9</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 10</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 11</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 12</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 13</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 14</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 15</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 16</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 17</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 18</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 19</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Nome completo do editar 20</label>
                              </p>
                              
                            <BR><BR>



                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('cliente.eventos.adicionar')}}'" class="btn teal lighten-2">Prosseguir</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection