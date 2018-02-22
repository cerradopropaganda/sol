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

                <h5 class="card-title  white-text">Escolha do Objeto da Licitação</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.fiscais.salvar')}}">
                        
                        {{ csrf_field() }}

                            <labe><H6>OBJETOS DISPONÍVEIS</H6></label><br>

                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_presencial" />
                                <label for="licitacao_presencial">Material de consumo</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input name="tipo" type="radio" id="licitacao_eletronica" />
                                <label for="licitacao_eletronica">Serviços</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="dispensa_licitacao"  />
                                <label for="dispensa_licitacao">Material permanente</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="inexigibilidade_licitacao"  />
                                <label for="inexigibilidade_licitacao">Obras e serviços de engenharia</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="credenciamento"  />
                                <label for="credenciamento">Locações diversas</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Serviços e peças</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                <input class="with-gap" name="tipo" type="radio" id="patrocinio"  />
                                <label for="patrocinio">Material permanente e serviços</label>
                              </p>
                              
                            <BR><BR>



                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('cliente.eventos.escolher_objeto_tipo')}}'" class="btn teal lighten-2">Prosseguir</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection