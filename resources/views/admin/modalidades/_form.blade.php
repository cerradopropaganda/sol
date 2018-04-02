<div class="row">
	
	<div class="col s7 m7">



		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}" class="validate" required>
			<label>NOME DA MODALIDADE</label>
		</div>

		 <br><br>
        <labe><H6><b>FASES DA MODALIDADE</b></H6></label><br>


          <p style="margin-bottom: 1em">
            <input name="fases" type="radio" id="fase_inicial" value="0"  class="" {{ isset($registro->fases) && $registro->fases == '0' ? 'checked' : '' }}   />
            <label for="fase_inicial">APENAS FASE INICIAL</label>
          </p>

          <p style="margin-bottom: 1em">
            <input name="fases" type="radio" id="fase_inicial_final" value="1"  class="" {{ isset($registro->fases) &&  $registro->fases == '1' ? 'checked' : '' }} />
            <label for="fase_inicial_final">FASE INICIAL E FINAL</label>
          </p>


        <br>
		<label><H6>LICITAÇÃO ELETRÔNICA?</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="licitacao_eletronica" value="1"  {{ isset($registro->licitacao_eletronica) && $registro->licitacao_eletronica == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>


	</div>

	<div class="col s7 m7">

	</div>

</div>

@section('page-script')
<script type="text/javascript">

    /*
    * Este método valida o formulário
    */
    $("#frm_modalidades").validate({
          rules: {
              nome: {
                  required: true,
                  minlength: 2
              }        

          },
          //For custom messages
          messages: {
              nome: {
                  required: "Por favor insira um NOME",
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
            $("form#frm_modalidades").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>
@endsection