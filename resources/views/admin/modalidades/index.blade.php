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

            <!-- MOSTRAR MENSAGEM DE SUCESSO -->
            @if ($message = Session::get('success'))
                  <div id="msg_sucesso" class="card-panel green lighten-2">
                      <p class="white-text"> <i class="inline-icon material-icons">check_circle</i> {{ $message }}</p>
                  </div>
            @endif
              
               <a href="{{route('admin.modalidades.adicionar')}}" class="btn-floating halfway-fab btn-large left waves-effect waves-light blue" ><i class="material-icons left">add</i></a>           
              <table class="dataTable responsive-table highlight striped">
                <thead>
                  <tr>
                    <th width="5%">Editar</th>
                    <th width="95%">MODALIDADE</th>
                    <th width="5%">Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($registros as $registro)
                      <tr>
                        <td>
                          <a href="{{ route('admin.modalidades.editar',$registro->id) }}" class="btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">create</i></a>
                        </td>
                        <td><b>{{ $registro->nome }}</b></td>
                        <td>
                          <a href="{{ route('admin.modalidades.deletar',$registro->id) }}" class="delete btn-floating waves-effect waves-light grey lighten-1"><i class="material-icons">delete_forever</i></a>
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
    $("#msg_sucesso").show().delay(5000).fadeOut();
</script>
@endsection