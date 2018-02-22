@extends('layout.cliente')

@section('titulo','Logomarca e Cabeçalho')

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

                <h5 class="card-title  white-text">Cadastro de Logomarca e Cabeçalho</h5>
               
            </div>            
            
            <div class="card-content white">
              
               <a href="{{route('cliente.header.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light teal lighten-2" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="90%">NOME DO ORGÃO</th>
                    <th width="5%">Excluir</th>
                  </tr>
                </thead>
                <tbody>



                    <tr>
                      <td>
                        <a href="{{route('cliente.header.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 1</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.header.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <a href="{{route('cliente.header.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 2</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.header.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <a href="{{route('cliente.header.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 3</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.header.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <a href="{{route('cliente.header.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 4</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.header.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        <a href="{{route('cliente.header.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td>Orgão 5</td>
                      <td>
                        <!--,$registro->id-->
                        <a href="{{route('cliente.header.deletar') }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
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