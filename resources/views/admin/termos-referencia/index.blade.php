@extends('layout.admin')

@section('titulo','Termos de Referência')

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

                <h5 class="card-title  white-text">Cadastro de Termos de Referência</h5>
               
            </div>
            <div class="card-content grey lighten-3" style="padding: 10px 25px;">


                      <div class="input-field">
                        <select name="categoria" style=" width: 350px">
                            <!--<option value="" disabled selected>Escolha uma opção</option>-->
                              <option selected="" value="MATERIAL EXPEDIENTE">MATERIAL EXPEDIENTE</option>
                              <option value="MATERIAL DE CONSUMO">MATERIAL DE CONSUMO</option>
                              <option value="MATERIAL PERMANENTE">MATERIAL PERMANENTE</option>
                              <option value="SERVIÇOS">SERVIÇOS</option>
                              <option value="OBRAS E SERVIÇOS DE ENGENHARIA">OBRAS E SERVIÇOS DE ENGENHARIA</option>
                              <option value="LOCAÇÕES DIVERSAS">LOCAÇÕES DIVERSAS</option>
                              <option value="SERVIÇOS E PEÇAS">SERVIÇOS E PEÇAS</option>
                              <option value="MATERIAL PERMANENTE E SERVIÇOS">MATERIAL PERMANENTE E SERVIÇOS</option>
                          </select>
                        <label>CATEGORIA</label>
                      </div>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
              
               <!--<a href="{{ route('admin.usuarios.adicionar') }}" class="btn-floating btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>-->
               <a href="{{route('admin.termos-referencia.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="5%">CÓDIGO</th>
                    <th width="90%">NOME</th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                      <td>
                        <a href="{{route('admin.termos-referencia.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>00001</b></td>
                      <td>MATERIAL DE CONSUMO - ALIMENTOS PERECÍVEIS</td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.termos-referencia.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                       <td><b>00002</b></td>
                      <td>MATERIAL DE CONSUMO - ALIMENTOS PERECÍVEIS</td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.termos-referencia.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                       <td><b>00003</b></td>
                      <td>MATERIAL DE CONSUMO - ALIMENTOS PERECÍVEIS</td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.termos-referencia.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                       <td><b>00004</b></td>
                      <td>MATERIAL DE CONSUMO - ALIMENTOS PERECÍVEIS</td>
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