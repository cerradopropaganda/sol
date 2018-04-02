@extends('layout.cliente')

@section('titulo','Editar Evento - Fase Final')

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

                <h5 class="card-title  white-text">Editar Evento - Fase Final</h5>
               
            </div>

            
          
            
            
            <div class="card-content white">

              <!-- MOSTRAR MENSAGEM DE SUCESSO -->
              @if ($message = Session::get('success'))
                    <div id="msg_sucesso" class="card-panel green lighten-2">
                        <p class="white-text"> <i class="inline-icon material-icons">check_circle</i> {{ $message }}</p>
                    </div>
              @endif
        
                      <form  id="frm_evento" class="" method="post" action="{{ route('cliente.eventos.atualizar',$registro->id)}}">
                        
                        {{ csrf_field() }}

                        
                        @include('cliente.eventos._formFinal')


                        <input type="hidden" name="id_usuario" value="@if(Auth::user()->id_usuario==0){{Auth::user()->id}}@else@php

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
    

    $(function(){



        $('.save-step').on('click',function(e){

          /*e.preventDefault();

            var url             = '{{route("cliente.eventos.atualizar",$registro->id)}}';
            var $post             = {};
            $post.id            = $(this).attr('rel');
            $post.id_orgao            = $('#size_' + $post.id_orgao).val();
            $post.objeto        = $('#objeto_' + $post.objeto).val();
            $post.justificativa            = $('#justificativa_' + $post.justificativa).val();

            $.ajax({
            type: "POST",
            url: url,
            data: $post,
            cache: false,
            success: function(data){
               return data;
            }
            });
            return false;
*/

                 $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                  });
                  e.preventDefault(e);
                  $.ajax({

                      type:"POST",
                      url:'{{route("cliente.eventos.atualizar",$registro->id)}}',
                      data:$('#frm_evento').serialize(),
                      dataType: 'json',
                      cache: false,
                      processData: false,
                      success: function(data){
                        console.log('atualizado com sucesso');
                          console.log(data);
                      },
                      error: function(data){

                      }
                  })

        });

    });

});
</script>
@endsection