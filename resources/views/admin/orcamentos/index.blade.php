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

                <h5 class="card-title  white-text">Lista de Orçamentos do item abaixo</h5>
               
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



              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  {{$item_descricao}}
                </div>
              </div>
              <br>
              
               <!--<a href="{{ route('admin.usuarios.adicionar') }}" class="btn-floating btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>-->
               <!--<a href="{{route('admin.orcamentos.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>          -->
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="10%">IDENTIFICAÇÃO DA COMPRA</th>
                    <th width="5%">NÚMERO ITEM</th>
                    <th width="15%">MODALIDADE</th>
                    <th width="20%">FORNECEDOR</th>
                    <th width="10%">UNIDADE</th>
                    <th width="10%">QTDE</th>
                    <th width="20%">VALOR UNITÁRIO</th>
                    <th width="5%">Excluir</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach($registros as $registro)
                    <tr>
                        <td>
                          <a href="{{ route('admin.orcamentos.editar',$registro->id) }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                        </td>
                        <td>{{ $registro->identificacao_compra }}</td>
                        <td>{{ $registro->numero_item }}</td>
                        <td>{{ $registro->modalidade }}</td>
                        <td>{{ $registro->fornecedor }}</td>
                        <td>{{ $registro->unidade }}</td>
                        <td>{{ $registro->qtde }}</td>
                        <td>R$ {{ number_format($registro->valor, 2, ',', '.')  }}</td>
                        <td>
                          <a href="{{ route('admin.itens.deletar',$registro->id) }}" class="delete btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                        </td>
                      </tr>
                  @endforeach

                    <!--<tr>
                      <td>
                        <a href="{{route('admin.orcamentos.adicionar')}}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                      </td>
                      <td><b>435108</b></td>
                      <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado, transparente e orifício lateral</td>
                      <td>CX. C/ 50</td>
                      <td>3.3.90.30.23</td>
                      <td><center><h5>5</h5> <a href="{{route('admin.orcamentos.adicionar')}}" class="btn waves-effect waves-light blue">Add Orçamento</a></center></td>
                  
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