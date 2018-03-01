@extends('layout.admin')

@section('titulo','Editar Modalidade')

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

                <h5 class="card-title  white-text">Editar Modalidade</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" id="frm_modalidades" method="post" action="{{ route('admin.modalidades.atualizar',$registro->id)}}">
                        
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        @include('admin.modalidades._form')

                        <button class="btn blue darken-1">Editar Modalidade</button>



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection