@extends('layout.admin')

@section('titulo','Editais')

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

                <h5 class="card-title  white-text">Cadastro de Editais</h5>
               
            </div>
            <div class="card-content grey lighten-3" style="padding: 10px 25px;">


                      <div class="input-field">
                        <select name="modalidade" style=" width: 350px">
                            <!--<option value="" disabled selected>Escolha uma opção</option>-->
                              <option selected="" value="LICITAÇÃO PRESENCIAL">LICITAÇÃO PRESENCIAL</option>
                              <option value="LICITAÇÃO ELETRÔNICA">LICITAÇÃO ELETRÔNICA</option>
                              <option value="DISPENSA DE LICITAÇÃO">DISPENSA DE LICITAÇÃO</option>
                              <option value="INEXIGIBILIDADE DE LICITAÇÃO">INEXIGIBILIDADE DE LICITAÇÃO</option>
                              <option value="CREDENCIAMENTO">CREDENCIAMENTO</option>
                              <option value="PATROCÍNIO">PATROCÍNIO</option>
                          </select>
                        <label>MODALIDADE</label>
                      </div>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
              
               <!--<a href="{{ route('admin.usuarios.adicionar') }}" class="btn-floating btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>-->
               <a href="{{route('admin.editais.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
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
                        <a href="{{route('admin.editais.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>EDITAL 1</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.editais.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>EDITAL 2</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.editais.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>EDITAL 3</b></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.editais.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>EDITAL 4</b></td>
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