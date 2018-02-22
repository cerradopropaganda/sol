@extends('layout.cliente')

@section('titulo','Adicionar Fiscal de Contrato')

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

                <h5 class="card-title  white-text">Adicionar Fiscal de Contrato</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.fiscais.salvar')}}">
                        
                        {{ csrf_field() }}

                        @include('cliente.fiscais._form')


                        <!--<button class="btn blue darken-1">Salvar Item</button>-->
                        <a onclick="location.href ='{{ route('cliente.fiscais')}}'" class="btn teal lighten-2">Salvar Fiscal</a>                       



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection