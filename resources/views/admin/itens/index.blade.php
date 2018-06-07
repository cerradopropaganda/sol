@extends('layout.admin')

@section('titulo','Itens')

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

                <h5 class="card-title  white-text">Lista de Itens</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">

              <!-- MOSTRAR MENSAGEM DE SUCESSO -->
              @if ($message = Session::get('success'))
                    <div id="msg_sucesso" class="card-panel green lighten-2">
                        <p class="white-text"> <i class="inline-icon material-icons">check_circle</i> {{ $message }}</p>
                    </div>
              @endif

              <!-- MOSTRAR MENSAGEM DE ERRO -->
              @if ($message = Session::get('error'))
                    <div id="msg_erro" class="card-panel red lighten-2">
                        <p class="white-text"> <i class="inline-icon material-icons">priority_high</i> {{ $message }}</p>
                    </div>
              @endif
              
               <!--<a href="{{ route('admin.usuarios.adicionar') }}" class="btn-floating btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>-->
              <a href="{{route('admin.itens.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
              <a href="#modal_import_csv_itens" id="add_itens" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue modal-trigger" style="margin-left: 70px;" ><img style="margin-top: 11px; margin-left: 3px;" width="60%" src="{{ asset('img/icon_csv.png') }}" /></a> 
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="5%">CÓDIGO</th>
                    <th width="10%">CAT. MAT</th>
                    <th width="37%">DESCRIÇÃO</th>
                    <th width="10%">UNIDADE</th>
                    <th width="13%">EL DESPESA</th>
                    <th width="20%">ORÇAMENTOS VÁLIDOS</th>
                    <th width="5%">Excluir</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($registros as $registro)
                    <tr>
                        <td>
                          <a href="{{ route('admin.itens.editar',$registro->id) }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                        </td>
                        <td><b>{{ $registro->codigo }}</b></td>
                        <td><b>{{ $registro->cat_mat }}</b></td>
                        <td>{{ $registro->descricao }}</td>
                        <td>{{ $registro->unidade }}</td>
                        <td>{{ $registro->el_despesa }}</td>
                        <td>
                          <center>
                            <h5>{{ $count = $orcamentos->where('id_item', $registro->codigo)->count() }}</h5> 
                            <a href="#modal_import_csv_orcamentos_{{ $registro->codigo }}" class="btn waves-effect waves-light blue modal-trigger">Add Orçamento</a>
                            <a style="margin-top: 10px;" href="{{route('admin.orcamentos',$registro->codigo)}}" class="btn waves-effect waves-light grey">Visualizar</a>
                          </center>


                            <!-- Modal import orçamentos csv -->
                            <div id="modal_import_csv_orcamentos_{{ $registro->codigo }}" class="modal" style="width: 600px;">
                              

                                <div class="card " style="margin:0;">


                                      <div class="card-content blue" style="padding: 10px 25px;">

                                          <h5 class="card-title  white-text">Importar Orçamentos para este item</h5>
                                         
                                      </div>
                                      
                                      <div class="card-content white">

                                        

                                        <form id="frm_orcamentos_csv" class="" method="post" action="{{ route('admin.orcamentos.salvar_csv')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                            <div class="col s12">

                                              <p>Anexe o arquivo .CSV com os orçamentos para este item e clique em importar</p>
                                              <div class="file-field input-field">
                                                  <div class="btn  blue darken-1">
                                                    <span>ARQUIVO .CSV</span>
                                                    <input type="file"  name="file_csv">
                                                  </div>
                                                  <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                  </div>
                                              </div>
                                              <br><br>
                                              <input type="hidden" name="id_item" id="id_item" value="{{ $registro->codigo }}">
                                              <button class="btn right blue darken-1">Importar Orçamentos</button>      
                                              <br><br>



                                            </div>
                                            </div>
                                        
                                        </form>
                                      </div>

                                </div>
                            </div>












                        </td>
                        <td>
                          <a href="{{ route('admin.itens.deletar',$registro->id) }}" class="delete btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                        </td>
                      </tr>
                  @endforeach

                   <!-- <tr>
                      <td>
                        <a href="{{route('admin.itens.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>00001</b></td>
                      <td>435108</td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>5</h5> <a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.itens.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>00002</b></td>
                      <td>435108</td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>3</h5><a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.itens.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>00003</b></td>
                      <td>435108</td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>1</h5><a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>

                    </tr>

                    <tr>
                      <td>
                        <a href="{{route('admin.itens.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>00004</b></td>
                      <td>435108</td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>8</h5><a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>
                      <td>
                        <a href="#" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
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


  <!-- Modal import itens csv -->
  <div id="modal_import_csv_itens" class="modal" style="width: 600px;">
    

      <div class="card " style="margin:0;">


            <div class="card-content blue" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Importar Itens para o sistema</h5>
               
            </div>
            
            <div class="card-content white">

              

              <form id="frm_itens_csv" class="" method="post" action="{{ route('admin.itens.salvar_csv')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                  <div class="col s12">

                    <p>Anexe o arquivo .CSV com os itens e clique em importar</p>
                    <div class="file-field input-field">
                        <div class="btn  blue darken-1">
                          <span>ARQUIVO .CSV</span>
                          <input type="file"  name="file_csv">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <br><br>
                    <button class="btn right blue darken-1">Importar Itens</button>      
                    <br><br>



                  </div>
                  </div>
              
              </form>
            </div>

      </div>
  </div>



@endsection

@section('page-script')
<script type="text/javascript">
  $(document).ready(function(){

      $("#msg_sucesso").show().delay(5000).fadeOut();



  });


</script>
@endsection