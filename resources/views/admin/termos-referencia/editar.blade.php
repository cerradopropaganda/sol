@extends('layout.admin')

@section('titulo','Editar Termo de Referência')

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

                <h5 class="card-title  white-text">Editar Termo de Referência</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="frm_termoReferencia" id="frm_termoReferencia" method="post" action="{{ route('admin.termos-referencia.atualizar',$registro->id)}}">
                        
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        @include('admin.termos-referencia._form')

                         <button class="btn blue darken-1">Editar Termo de Referência</button>


                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection