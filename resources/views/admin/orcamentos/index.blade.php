@extends('layout.admin')

@section('titulo','Orçamentos')

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

                <h5 class="card-title  white-text">Lista de Orçamentos</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
              
               <!--<a href="{{ route('admin.usuarios.adicionar') }}" class="btn-floating btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>-->
               <a href="{{route('admin.itens.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="10%">CAT. MAT</th>
                    <th width="45%">DESCRIÇÃO</th>
                    <th width="10%">UNIDADE</th>
                    <th width="10%">EL DESPESA</th>
                    <th width="20%">ORÇAMENTOS VÁLIDOS</th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                      <td>
                        <a href="{{route('admin.orcamentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>435108</b></td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>5</h5> <a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.orcamentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>435108</b></td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>3</h5><a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.orcamentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>435108</b></td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>1</h5><a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>
                      <!--<td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                      </td>-->
                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.orcamentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>435108</b></td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>8</h5><a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>
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