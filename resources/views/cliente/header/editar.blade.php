@extends('layout.cliente')

@section('titulo','Editar Logomarca e Cabeçalho')

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

                <h5 class="card-title  white-text">Editar Logomarca e Cabeçalho</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form  id="frm_header" class="" method="post" action="{{ route('cliente.header.atualizar' ,$registro->id)}}" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        @include('cliente.header._form')

                        <button class="btn  teal lighten-1">Editar Logomarca e Cabeçalho</button>



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection