@extends('layout.admin')

@section('titulo','Modalidades')

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


            <div class="card-content blue" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Lista de Modalidades</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
              
               <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="95%">MODALIDADE</th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                      <td>
                        <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>LICITAÇÃO PRESENCIAL</b></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>LICITAÇÃO ELETRÔNICA</b></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>DISPENSA DE LICITAÇÃO</b></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>INEXIGIBILIDADE DE LICITAÇÃO</b></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>CREDENCIAMENTO</b></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>PATROCÍNIO</b></td>

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