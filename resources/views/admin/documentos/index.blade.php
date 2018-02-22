@extends('layout.admin')

@section('titulo','Documentos')

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

                <h5 class="card-title  white-text">Cadastro de Documentos</h5>
               
            </div>

            
          
            
            
            <div class="card-content white">
              
               <!--<a href="{{ route('admin.usuarios.adicionar') }}" class="btn-floating btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>-->
               <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="95%">NOME</th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Ofício</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Despacho da CPL</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Autorização para Licitar</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Portaria de Fiscal de Contrato</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Carta de Credenciamento</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Minuta do Contrato</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Declaração de compatibilidade LDO e LOA</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Declaração de Saldo Orçamentário</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Declaração de Fatos Impeditivos</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Declaração que não emprega menor</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Declaração de Aceitação dos Termos do Edital</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Declaração de ME ou EPP</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.documentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>Declaração de Atendimentos aos requisitos de habilitação</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
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