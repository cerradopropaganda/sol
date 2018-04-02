@extends('layout.cliente')

@section('titulo','Eventos')

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
  <style type="text/css">.btn{margin-bottom: 0.5em!important;}</style>
  <div class="container">
	 <div class="row">
        <div class="col s12 m12">
          <br>

          <div class="card ">


            <div class="card-content teal lighten-2" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Eventos Concluídos</h5>
               
            </div>            
            
            <div class="card-content white">

              <!-- MOSTRAR MENSAGEM DE SUCESSO -->
              @if ($message = Session::get('success'))
                    <div id="msg_sucesso" class="card-panel green lighten-2">
                        <p class="white-text"> <i class="inline-icon material-icons">check_circle</i> {{ $message }}</p>
                    </div>
              @endif
           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="20%">ORGÃO</th>
                    <th width="20%">OBJETO</th>
                    <th width="20%">N. PRCESSO</th>
                    <th width="20%">N. LICITAÇÃO</th>
                    <th width="20%">DOCUMENTOS</th>
                  </tr>
                </thead>
                <tbody>

                   @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nome_orgao }}</td>
                        <td>{{ $registro->objeto }}</td>
                        <td>{{ $registro->processo }}</td>
                        <td> </td>
                        <td>
                           <a href="{{route('cliente.eventos.concluidos_download') }}" class="btn waves-effect waves-light teal lighten-2">Download</a>
                        </td>
                      </tr>
                  @endforeach



                    <!--<tr>
                      <td>Orgão 1</td>
                      <td>Objeto 1</td>
                      <td>Processo 1</td>
                      <td>Licitação 1</td>
                      <td>
                        <a href="{{route('cliente.eventos.concluidos_download') }}" class="btn waves-effect waves-light teal lighten-2">Download</a>
                      </td>
                    </tr>

                    <tr>
                      <td>Orgão 2</td>
                      <td>Objeto 2</td>
                      <td>Processo 2</td>
                      <td>Licitação 2</td>
                      <td>
                        <a href="{{route('cliente.eventos.concluidos_download') }}" class="btn waves-effect waves-light teal lighten-2">Download</a>
                      </td>
                    </tr>

                    <tr>
                      <td>Orgão 3</td>
                      <td>Objeto 3</td>
                      <td>Processo 3</td>
                      <td>Licitação 3</td>
                      <td>
                        <a href="{{route('cliente.eventos.concluidos_download') }}" class="btn waves-effect waves-light teal lighten-2">Download</a>
                      </td>
                    </tr>

                    <tr>
                      <td>Orgão 4</td>
                      <td>Objeto 4</td>
                      <td>Processo 4</td>
                      <td>Licitação 4</td>
                      <td>
                        <a href="{{route('cliente.eventos.concluidos_download') }}" class="btn waves-effect waves-light teal lighten-2">Download</a>
                      </td>
                    </tr>-->

                </tbody>
              </table>

              <br>

            </div>

          </div>


        </div>
    </div>




  </div>
@endsection



@section('page-script')
<script type="text/javascript">
  $(document).ready(function(){
    @if ($message = Session::get('success'))
      $("#msg_sucesso").show().delay(5000).fadeOut();
    @endif
  });
</script>
@endsection