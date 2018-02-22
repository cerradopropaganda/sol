
@extends('layout.cliente')

@section('titulo','Documentos gerados da Fase Externa')

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

                <h5 class="card-title  white-text">Documentos gerados da Fase Externa</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.fiscais.salvar')}}">
                        
                        {{ csrf_field() }}



                              <p style="margin-bottom: 1em">
                                
                                <label for="licitacao_presencial">Ofício</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                
                                <label for="licitacao_eletronica">Despacho da CPL</label>
                              </p>
                              <p style="margin-bottom: 1em">
                                
                                <label for="dispensa_licitacao">Autorização para Licitar</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                
                                <label for="inexigibilidade_licitacao">Portaria de Fiscal de Contrato</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                
                                <label for="credenciamento">Carta de Credenciamento</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                
                                <label for="patrocinio">Minuta do Contrato</label>
                              </p>

                              <p style="margin-bottom: 1em">
                                
                                <label for="patrocinio">Declaração de Saldo Orçamentário</label>
                              </p>
       
                            <BR><BR>



                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('cliente.eventos')}}'" class="btn teal lighten-2">FAZER DOWNLOAD DOS PDFs</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection