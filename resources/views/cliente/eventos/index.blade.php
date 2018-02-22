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

                <h5 class="card-title  white-text">Eventos em Andamento</h5>
               
            </div>            
            
            <div class="card-content white">
              
               <a href="{{route('cliente.eventos.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light teal lighten-2" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="15%">ORGÃO</th>
                    <th width="15%">OBJETO</th>
                    <th width="15%">N. PRCESSO</th>
                    <th width="15%">N. LICITAÇÃO</th>
                    <th width="35%">DOCUMENTOS</th>
                  </tr>
                </thead>
                <tbody>



                    <tr>
                      <td>
                        <a href="{{route('cliente.eventos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 1</td>
                      <td>Objeto 1</td>
                      <td>Processo 1</td>
                      <td>Licitação 1</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Int.</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Ext.</a>
                        <a href="{{route('cliente.eventos') }}" class="btn waves-effect waves-light red lighten-2">Concluir</a>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('cliente.eventos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 2</td>
                      <td>Objeto 2</td>
                      <td>Processo 2</td>
                      <td>Licitação 2</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Int.</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Ext.</a>
                        <a href="{{route('cliente.eventos') }}" class="btn waves-effect waves-light red lighten-2">Concluir</a>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('cliente.eventos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 3</td>
                      <td>Objeto 3</td>
                      <td>Processo 3</td>
                      <td>Licitação 3</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Int.</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Ext.</a>
                        <a href="{{route('cliente.eventos') }}" class="btn waves-effect waves-light red lighten-2">Concluir</a>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('cliente.eventos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 4</td>
                      <td>Objeto 4</td>
                      <td>Processo 4</td>
                      <td>Licitação 4</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Int.</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Ext.</a>
                        <a href="{{route('cliente.eventos') }}" class="btn waves-effect waves-light red lighten-2">Concluir</a>
                      </td>
                    </tr>



                </tbody>
              </table>

              <br>

            </div>

          </div>


          <br><br><br>
          <div class="card ">


            <div class="card-content teal lighten-2" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Eventos Finalizados</h5>
               
            </div>            
            
            <div class="card-content white">
           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="19%">ORGÃO</th>
                    <th width="19%">OBJETO</th>
                    <th width="15%">N. PRCESSO</th>
                    <th width="15%">N. LICITAÇÃO</th>
                    <th width="32%">DOCUMENTOS</th>
                  </tr>
                </thead>
                <tbody>



                    <tr>
                      <td>Orgão 1</td>
                      <td>Objeto 1</td>
                      <td>Processo 1</td>
                      <td>Licitação 1</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Interna</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Externa</a>
                      </td>
                    </tr>

                    <tr>
                      <td>Orgão 2</td>
                      <td>Objeto 2</td>
                      <td>Processo 2</td>
                      <td>Licitação 2</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Interna</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Externa</a>
                      </td>
                    </tr>

                    <tr>
                      <td>Orgão 3</td>
                      <td>Objeto 3</td>
                      <td>Processo 3</td>
                      <td>Licitação 3</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Interna</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Externa</a>
                      </td>
                    </tr>

                    <tr>
                      <td>Orgão 4</td>
                      <td>Objeto 4</td>
                      <td>Processo 4</td>
                      <td>Licitação 4</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.eventos.fase_interna') }}" class="btn waves-effect waves-light teal lighten-2">Fase Interna</a>
                        <a href="{{route('cliente.eventos.fase_externa') }}" class="btn waves-effect waves-light teal lighten-2">Fase Externa</a>
                      </td>
                    </tr>

                </tbody>
              </table>

              <br>

            </div>

          </div>


        </div>
    </div>




  </div>
@endsection