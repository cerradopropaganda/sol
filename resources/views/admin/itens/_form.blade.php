<div class="row">
	
	<div class="col s7 m7">


		<!--<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME</label>
		</div>-->

		
		<div class="input-field">
			<textarea class="materialize-textarea" name="descricao">{{isset($registro->descricao) ? $registro->descricao : ''}}</textarea>
			<label>DESCRIÇÃO</label>
		</div>

		<div class="input-field">
			<input type="number" name="codigo" value="{{isset($registro->codigo) ? $registro->codigo : ''}}">
			<label>CÓDIGO</label>
		</div>


		<div class="input-field">
			<input type="text" name="cat_mat" value="{{isset($registro->cat_mat) ? $registro->cat_mat : ''}}">
			<label>CAT. MAT</label>
		</div>

		<div class="input-field">
			<input type="text" name="el_despesa" value="{{isset($registro->el_despesa) ? $registro->el_despesa : ''}}">
			<label>EL DESPESA</label>
		</div>

		 <div class="input-field">
			<input type="text" name="unidade" value="{{isset($registro->unidade) ? $registro->unidade : ''}}">
			<label>UNIDADE</label>
		</div>


    <div class="input-field">
      <select multiple name="trs[]" id="trs">
            @foreach($trs as $tr)                    
                     <option value="{{ $tr->id }}" @if(preg_match(",$tr->id,", $registro->trs)) selected  @endif  > {{ $tr->nome  }} </option> 
           @endforeach
      </select>
      <label>TRs VÍNCULADOS</label>
    </div>

    <br>



	</div>

	<div class="col s7 m7">

	</div>

</div>

<style>
 /*label.input-field {    top: -26px;}*/
</style>

@section('page-script')
<script type="text/javascript">
	/*
    * Este método carrega o dropdow de categorias dos tipos dos itens
    
	$(document).ready(function($){
	    $('#id_tipo').change(function(){
	    	var option = $(this).val();
			var categorias = @if (isset($registro->id_tipo)) '{{ $registro->categorias }}'; @else ''; @endif    	

	    	var url = '/admin/itens/dropdown/'+$(this).val();
	        $.get(url, 
	        function(data) {
	        	console.log(data.length);
	        	if( data.length == '0' ) {
	        		console.log('vazio');
		        	$('#categorias').empty(); 
					$('#categorias').append("<option disabled selected>NENHUMA CATEGORIA CADASTRADA</option>");
		            $('select').material_select();
		           
	        	}else{
	        		console.log('tem itens');
	        		$('#categorias').empty(); 
		            $.each(data, function(key, element) {
						var selected='';
		            	if(categorias.match(","+key+",")) {selected='selected';}
		                $('#categorias').append("<option value='" + key +"' "+ selected +">" + element + "</option>");
		            }); 
		            $('select').material_select();
	        	}

	        });
	    });

	});*/

    /*
    * Este método valida o formulário
    */
	$.validator.setDefaults({
	       ignore: []
	});

	$('select').change(function(){ $('select').valid(); })
    $("form#frm_item").validate({
          rules: {
              codigo: {
                  required: true,
                  minlength: 1
              },
              descricao: {
                  required: true,
                  minlength: 2
              },
              cat_mat: {
                  required: true,
                  minlength: 2
              },
             // el_despesa: {
              //    required: true,
              //    minlength: 2
             // },
              unidade: {
                  required: true,
                  minlength: 2
              }/*,
              id_tipo: {
                  required: true
              },
              categorias: {
                  required: true
              } */

          },
          //For custom messages
          messages: {
              codigo: {
                  required: "Por favor insira um Código para esse item",
                  minlength: "Digite mais de 1 caracter"
              },
              descricao: {
                  required: "Por favor preencha a Descrição do Item",
                  minlength: "Digite pelo menos 1 caracter"
              },
              cat_mat: {
                  required: "Por favor preencha o CAT. MAT do Item",
                  minlength: "Digite mais de 1 caracter"
              },
             // el_despesa: {
             //     required: "Por favor preencha o El. Despesa do Item",
              //    minlength: "Digite mais de 1 caracter"
              //},
              unidade: {
                  required: "Por favor preencha a Unidade do Item",
                  minlength: "Digite mais de 1 caracter"
              }/*,
              
              id_tipo: {
                  required: "Por favor escolha um tipo de objeto"
              },
              categorias: {
                  required: "Por favor escolha as categorias do objeto"
              }*/
          },

          errorClass: "invalid form-error",    // corrige select   
          errorElement : 'div',
          errorPlacement: function(error, element) {
			//error.appendTo( element.parent() ); // corrige select
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
            $("form#frm_item").submit();
            e.preventDefault();
            return false;
        }
    }); 


</script>
@endsection
