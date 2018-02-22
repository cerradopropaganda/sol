@extends('layout.admin')

@section('titulo','Adicionar Termo de Referência')

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

                <h5 class="card-title  white-text">Adicionar Termo de Referência</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('admin.termos-referencia.salvar')}}">
                        
                        {{ csrf_field() }}

                        @include('admin.termos-referencia._form')


                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('admin.termos-referencia')}}'" class="btn blue darken-1">Salvar Termo de Referência</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection