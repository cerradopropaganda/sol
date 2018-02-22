@extends('layout.cliente')

@section('titulo','Orgão Solicitante')

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

                <h5 class="card-title  white-text">Cadastro de Orgão Solicitante</h5>
               
            </div>            
            
            <div class="card-content white">
              
               <a href="{{route('cliente.orgaos.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light teal lighten-2" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="23%">NOME DO ORGÃO</th>
                    <th width="23%">NOME DO ORDENADOR</th>
                    <th width="22%">NOME DO DILIGENTE</th>
                    <th width="22%">NOME DO PREGOEIRO</th>
                    <th width="5%">Excluir</th>
                  </tr>
                </thead>
                <tbody>



                    <tr>
                      <td>
                        <a href="{{route('cliente.orgaos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 1</td>
                      <td>Ordenador 1</td>
                      <td>Diligente 1</td>
                      <td>Pregoeiro 1</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.orgaos.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('cliente.orgaos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 2</td>
                      <td>Ordenador 2</td>
                      <td>Diligente 2</td>
                      <td>Pregoeiro 2</td>
                      <td>
                        <a href="{{route('cliente.orgaos.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('cliente.orgaos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 3</td>
                      <td>Ordenador 3</td>
                      <td>Diligente 3</td>
                      <td>Pregoeiro 3</td>
                      <td>
                        <a href="{{route('cliente.orgaos.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('cliente.orgaos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 4</td>
                      <td>Ordenador 4</td>
                      <td>Diligente 4</td>
                      <td>Pregoeiro 4</td>
                      <td>
                        <a href="{{route('cliente.orgaos.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
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