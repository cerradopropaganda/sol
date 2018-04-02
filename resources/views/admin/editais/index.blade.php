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
                        <select id="id_modalidade" name="id_modalidade" style=" width: 350px">
                          <option value="" disabled selected>Escolha uma modalidade</option>-->
                             @foreach($modalidades as $modalidade)                    
                                 <option value="{{ $modalidade->nome }}" > {{ $modalidade->nome }} </option> 
                             @endforeach
                          </select>
                        <label>MODALIDADE</label>
                      </div>
               
            </div>
            
            
          
            
            
            <div class="card-content white">

              <!-- MOSTRAR MENSAGEM DE SUCESSO -->
              @if ($message = Session::get('success'))
                    <div id="msg_sucesso" class="card-panel green lighten-2">
                        <p class="white-text"> <i class="inline-icon material-icons">check_circle</i> {{ $message }}</p>
                    </div>
              @endif
                
               <!--<a href="{{ route('admin.usuarios.adicionar') }}" class="btn-floating btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>-->
               <a href="{{route('admin.editais.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
              <table id="tbl_edital" class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="50%">EDITAL</th>
                    <th width="45%">MODALIDADE</th>
                    <th width="5%">Excluir</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr id="{{ $registro->id_modalidade }}">
                        <td>
                          <a href="{{ route('admin.editais.editar',$registro->id) }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                        </td>
                        <td><b>{{ $registro->nome }}</b></td>
                        <td><b>{{ $registro->modalidadeNome }}</b></td>
                        <td>
                          <a href="{{ route('admin.editais.deletar',$registro->id) }}" class="delete btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>

              <br>

            </div>

          </div>


        </div>
    </div>




  </div>
@endsection

@section('page-script')
<script type="text/javascript">
  $(document).ready(function(){
      //console.log('var table: '+oTable);

          var oTable = $('.dataTable').dataTable();
          $('#id_modalidade').on('change', function() {
            //alert( this.value );
            oTable.fnFilter( this.value);
          });

      $("#msg_sucesso").show().delay(5000).fadeOut();



  });
</script>
@endsection