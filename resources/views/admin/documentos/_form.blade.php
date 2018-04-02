<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME</label>
		</div>
		<span style="clear: both;">
		<br>
		<label><H6>DOCUMENTO</H6></label>
		<textarea class="" style="height: 600px;" name="documento">{{isset($registro->documento) ? $registro->documento : ''}}


		</textarea>
		

		
	</div>

	<div class="col s7 m7">

	</div>

</div>

@section('page-script')
<script type="text/javascript">

    /*
    * Este método valida o formulário
    */
    $("form#frm_documento").validate({
          rules: {
              nome: {
                  required: true,
                  minlength: 2
              },
             /* documento: {
                  required: true,
                  minlength: 2
              }*/     

          },
          //For custom messages
          messages: {
              nome: {
                  required: "Por favor insira um Nome para o Documento",
                  minlength: "Digite mais de 1 caracter"
              }/*,
              documento: {
                  required: "Por favor preencha o Documento",
                  minlength: "Digite mais de 1 caracter"
              }*/
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
            $("form#frm_documento").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>
@endsection
