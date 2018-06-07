<div class="row">
	
	<div class="col s9 m9">

		<div class="input-field">
		    <select name="id_orgao">
		      @foreach($orgaos as $orgao)                    
                   <option value="{{ $orgao->id }}" @if (isset($registro->id_orgao)) @if ($registro->id_orgao == $orgao->id) selected  @endif @endif > {{ $orgao->nome }} </option> 
              @endforeach
		    </select>
		    <label>NOME DO ÓRGÃO</label>
		</div>
		  
		<span style="clear: both;">
		<br>

   <div class="file-field input-field">
      <div class="btn">
        <span>LOGOMARCA</span>
        <input type="file"  name="logomarca">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    @if(isset($registro->logomarca))
    <div class="input-field">
      <img src="{{asset($registro->logomarca)}}" width="150">
    </div>
    @endif


      <label><H6>CABEÇALHO</H6></label>
      <textarea class="editor" style="height: 300px;" name="cabecalho">   </textarea>

      <label><H6>RORDAPÉ</H6></label>
      <textarea class="editor" style="height: 300px;" name="cabecalho">   </textarea>


	</div>

	<div class="col s7 m7">
		<input type="hidden" name="id_usuario" value="@if(Auth::user()->id_usuario==0){{Auth::user()->id}}@else@php

       $registro = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; foreach($registro as $user) { echo $user->id ;}

       @endphp@endif">
	</div>

</div>




@section('page-script')
<script type="text/javascript">

    /*
    * Este método inicia o editor TRHUMBYG
    */
    $('.editor').trumbowyg();

    /*
    * Este método valida o formulário
    */
    $("#frm_header").validate({
          rules: {
              cabecalho: {
                  required: true,
                  minlength: 2
              }     

          },
          //For custom messages
          messages: {
              cabecalho: {
                  required: "Por favor preencha um Cabeçalho para esse Orgão",
                  minlength: "Digite mais de 1 caracter"
              }
          },
          errorElement : 'div',
          errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
              $(placement).append(error)
            } else {
              error.insertAfter(element);
            }
          }
    });

    /*
    * Este método salva a página via ctrl+s
    */
    $(document).bind('keydown', function(e) {
        if(e.ctrlKey && (e.which === 83)) {
            $("#frm_header").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>
@endsection


