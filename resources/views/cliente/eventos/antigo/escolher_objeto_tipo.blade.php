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

                <h5 class="card-title  white-text">OBJETO: MATERIAL DE CONSUMO</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.fiscais.salvar')}}">
                        
                        {{ csrf_field() }}

                            <labe><H6>MATERIAL DE CONSUMO</H6></label><br>

                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_presencial" />
                                <label for="licitacao_presencial">Adubos</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_eletronica" />
                                <label for="licitacao_eletronica">Agasalhos</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="dispensa_licitacao"  />
                                <label for="dispensa_licitacao">Água mineral</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="inexigibilidade_licitacao"  />
                                <label for="inexigibilidade_licitacao">Alimentos para merenda escolar</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="credenciamento"  />
                                <label for="credenciamento">Bebidas</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Camisetas</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Cestas básicas</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Cobertores</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Combustível</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Combustível em posto</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Coroas de flores</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Divisórias instaladas</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Enxovais para bebês</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Ferragens</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Ferramentas para serviços de manutenção</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input  name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Flores e arranjos naturais</label>
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