@extends('layout.cliente')

@section('titulo','Especificar Itens')

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

                <h5 class="card-title  white-text">ESPECIFICAÇÃO DE ITENS</h5>
               
            </div>
            <div class="card-content grey lighten-3" style="padding: 10px 25px 0 25px;">

                
                <div class="row">
                    <div class="col s12">
                      Termo de Referência 1:&nbsp;&nbsp;&nbsp;
                      <div class="input-field inline">
                        <input id="email" type="email" class="validate">
                        <label for="email" data-error="wrong" data-success="right">Buscar Itens</label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="{{route('admin.termos-referencia.adicionar')}}" class="btn waves-effect waves-light teal lighten-2" >Add Item</a>
                    </div>
                </div>

               
            </div>
            
            
          
            
            
            <div class="card-content white">

                <table class="responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">ITEM</th>
                    <th width="30%">DESCRIÇÃO</th>
                    <th width="10%">UNID.</th>
                    <th width="10%">QUANT.</th>
                    <th width="10%">VAL. UNIT.</th>
                    <th width="10%">VAL. TOTAL</th>
                    <th width="25%">COTAÇÕES</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado,                                transparente e orifício lateral</td>
                    <td>CX. C/ 50</td>
                    <td>
                      
                      <div class="input-field">
                        <input type="text" name="pregao" value="{{isset($registro->pregao) ? $registro->pregao : ''}}">
                        <label>Quantidade</label>
                      </div>

                    </td>
                    <td>0,53</td>
                    <td>R$ 53,00</td>
                    <td>
                      

                      <p>
                        <input name="tipo" type="checkbox" id="licitacao_presencial" />
                        <label for="licitacao_presencial">Empresa 1 - 0,86</label>
                      </p>
                      <p>
                        <input name="tipo" type="checkbox" id="licitacao_eletronica" />
                        <label for="licitacao_eletronica">Empresa 2 - 0,72</label>
                      </p>
                      <p>
                        <input name="checkbox" type="checkbox" id="dispensa_licitacao"  />
                        <label for="dispensa_licitacao">Empresa 3- 0,67</label>
                      </p>
                      <p class="right-align grey-text" style="display: block; border-top: 1px solid #999;">Média - 0,xx</p>

                    </td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>papel A4, 75g / m2, não reciclado, cor branca, resma com 500  folhas</td>
                    <td>CX. C/ 10 UN.</td>
                    <td>
                      
                      <div class="input-field">
                        <input type="text" name="pregao" value="{{isset($registro->pregao) ? $registro->pregao : ''}}">
                        <label>Quantidade</label>
                      </div>

                    </td>
                    <td>16,80</td>
                    <td>R$ 336,00</td>
                    <td>
                      

                      <p>
                        <input name="tipo" type="checkbox" id="licitacao_presencial" />
                        <label for="licitacao_presencial">Empresa 1 - 0,86</label>
                      </p>
                      <p>
                        <input name="tipo" type="checkbox" id="licitacao_eletronica" />
                        <label for="licitacao_eletronica">Empresa 2 - 0,72</label>
                      </p>
                      <p>
                        <input name="checkbox" type="checkbox" id="dispensa_licitacao"  />
                        <label for="dispensa_licitacao">Empresa 3- 0,67</label>
                      </p>
                      <p class="right-align grey-text" style="display: block; border-top: 1px solid #999;">Média - 0,xx</p>

                    </td>
                  </tr>

                  <tr>
                    <td>1</td>
                    <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado,                                transparente e orifício lateral</td>
                    <td>CX. C/ 50</td>
                    <td>
                      
                      <div class="input-field">
                        <input type="text" name="pregao" value="{{isset($registro->pregao) ? $registro->pregao : ''}}">
                        <label>Quantidade</label>
                      </div>

                    </td>
                    <td>0,53</td>
                    <td>R$ 53,00</td>
                    <td>
                      

                      <p>
                        <input name="tipo" type="checkbox" id="licitacao_presencial" />
                        <label for="licitacao_presencial">Empresa 1 - 0,86</label>
                      </p>
                      <p>
                        <input name="tipo" type="checkbox" id="licitacao_eletronica" />
                        <label for="licitacao_eletronica">Empresa 2 - 0,72</label>
                      </p>
                      <p>
                        <input name="checkbox" type="checkbox" id="dispensa_licitacao"  />
                        <label for="dispensa_licitacao">Empresa 3- 0,67</label>
                      </p>
                      <p class="right-align grey-text" style="display: block; border-top: 1px solid #999;">Média - 0,xx</p>

                    </td>
                  </tr>
                </tbody>
                <thead>
                  <tr>
                    <th width="5%"></th>
                    <th width="30%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th width="25%">Total: R$ 389,00</th>
                  </tr>
                </thead>

                </table>
                <br><br>
                <center><a href="{{route('cliente.eventos')}}" class="btn waves-effect waves-light teal lighten-2" >FINALIZAR E VOLTAR PARA EVENTOS EM ANDAMENTO</a></center>
                <br><br>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection