



<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}" class="validate" required>
			<label>NOME</label>
		</div>



		<span style="clear: both;">
		<br>
		<label><H6>EDITAL</H6></label>
		<textarea class="validate" required style="height: 600px;" name="edital">{{isset($registro->edital) ? $registro->edital : ''}}	</textarea>


		<br><br><br>

		<div class="input-field">
			<select name="id_modalidade">
				@foreach($modalidades as $modalidade)                    
                   <option value="{{ $modalidade->id }}" @if (isset($registro->id_modalidade)) @if ($registro->id_modalidade == $modalidade->id) selected  @endif @endif > {{ $modalidade->nome }} </option> 
                @endforeach
		    </select>
			<label>MODALIDADE</label>
		</div>

		<br>
		<label><H6>Destinada ao SRP</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="destinada_srp" value="1"  {{ isset($registro->destinada_srp) && $registro->destinada_srp == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>

		<label><H6>Licitação exclusiva para ME e EPP</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="exclusiva_me_epp" value="1"  {{ isset($registro->exclusiva_me_epp) && $registro->exclusiva_me_epp == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>

		<label><H6>Licitação com itens destinados à participação exclusiva para ME e EPP</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="exclusiva_itens_me_epp" value="1"  {{ isset($registro->exclusiva_itens_me_epp) && $registro->exclusiva_itens_me_epp == '1' ? 'checked' : '' }} >
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
    $("form#frm_editais").validate({
          rules: {
              nome: {
                  required: true,
                  minlength: 2
              },
              edital: {
                  required: true,
                  minlength: 2
              }     

          },
          //For custom messages
          messages: {
              nome: {
                  required: "Por favor insira um Nome para o Edital",
                  minlength: "Digite mais de 1 caracter"
              },
              edital: {
                  required: "Por favor preencha o Edital",
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
            $("form#frm_editais").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>
@endsection
