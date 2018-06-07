@extends('layout.cliente')

@section('titulo','Adicionar Pregoeiro')

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

                <h5 class="card-title  white-text">Adicionar Pregoeiro</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form id="frm_pregoeiro" class="" method="post" action="{{ route('cliente.pregoeiros.salvar')}}">
                        
                        {{ csrf_field() }}

                        @include('cliente.pregoeiros._form')


                        <button class="btn teal lighten-1">Salvar Pregoeiro</button>              



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection