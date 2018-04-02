@extends('layout.cliente')

@section('titulo','Editar Orgão Solicitante')

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

                <h5 class="card-title  white-text">Editar Órgão Solicitante</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form id="frm_orgao"  class="" method="post" action="{{ route('cliente.orgaos.atualizar',$registro->id)}}">
                        
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        @include('cliente.orgaos._form')

                        <button class="btn teal lighten-1">Editar Órgão</button>



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection