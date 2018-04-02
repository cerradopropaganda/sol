@extends('layout.cliente')

@section('titulo','Editar Evento - Fase Inicial')

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

                <h5 class="card-title  white-text">Editar Evento - Fase Inicial</h5>
               
            </div>

            
          
            
            
            <div class="card-content white">

              <!-- MOSTRAR MENSAGEM DE SUCESSO -->
              @if ($message = Session::get('success'))
                    <div id="msg_sucesso" class="card-panel green lighten-2">
                        <p class="white-text"> <i class="inline-icon material-icons">check_circle</i> {{ $message }}</p>
                    </div>
              @endif
              
        
                      <form id="frm_evento" class="" method="post">
                        
                        {{ csrf_field() }}

                        @include('cliente.eventos._formInicial')

                        <input type="hidden" id="id_evento" name="id_evento" value="{{isset($registro->id) ? $registro->id: ''}}">
                        <input type="hidden" id="id_usuario" name="id_usuario" value="@if(Auth::user()->id_usuario==0){{Auth::user()->id}}@else@php

       $registro = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; foreach($registro as $user) { echo $user->id ;}

       @endphp@endif">
                       
                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection


@section('page-script')
<script type="text/javascript">
  $(document).ready(function(){
    @if ($message = Session::get('success'))
      $("#msg_sucesso").show().delay(5000).fadeOut();
      $('.stepper').openStep(2);
    @endif   
});
</script>
@endsection