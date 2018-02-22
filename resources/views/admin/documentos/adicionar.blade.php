@extends('layout.admin')

@section('titulo','Adicionar Documento')

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

                <h5 class="card-title  white-text">Adicionar Documento</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('admin.documentos.salvar')}}">
                        
                        {{ csrf_field() }}

                        @include('admin.documentos._form')


                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('admin.documentos')}}'" class="btn blue darken-1">Salvar Documento</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection