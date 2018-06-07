<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME</label>
		</div>

		<div class="input-field">
			<input type="number" name="codigo" value="{{isset($registro->codigo) ? $registro->codigo : ''}}">
			<label>CÓDIGO</label>
		</div>

		<div class="input-field">
			<select name="id_categoria">
		      @foreach($categorias_tr as $categoriaTR)                    
                   <option value="{{ $categoriaTR->id }}" @if (isset($registro->id_categoria)) @if ($registro->id_categoria == $categoriaTR->id) selected  @endif @endif > {{ $categoriaTR->nome }} </option> 
                @endforeach
		    </select>
			<label>CATEGORIA</label>
		</div>

		<span style="clear: both;">
		<br>
		<label><H6>TERMO DE REFERÊNCIA</H6></label>
		<textarea class="ckeditor_basic" style="height: 600px;" name="termo_referencia">{{isset($registro->termo_referencia) ? $registro->termo_referencia : ''}}</textarea>
		

		
	</div>

	<div class="col s7 m7">

	</div>

</div>


@section('page-script')
<script type="text/javascript">

    //$('.ckeditor_basic').trumbowyg();

    /*
    * Este método valida o formulário
    */
    $("#frm_termoReferencia").validate({
          rules: {
              nome: {
                  required: true,
                  minlength: 2
              },
              codigo: {
                  required: true,
                  minlength: 1
              },
              termo_referencia: {
                  required: true,
                  minlength: 2
              }     

          },
          //For custom messages
          messages: {
              nome: {
                  required: "Por favor insira um Nome para o Termo de Referência",
                  minlength: "Digite mais de 1 caracter"
              },
              codigo: {
                  required: "Por favor insira um Código para o Termo de Referência",
                  minlength: "Digite mais de 1 caracter"
              },
              termo_referencia: {
                  required: "Por favor preencha o Termo de Referência",
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
            $("#frm_termoReferencia").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>
@endsection


