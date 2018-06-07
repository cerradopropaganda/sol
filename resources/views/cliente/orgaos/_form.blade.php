<div class="row">
	
	<div class="col s7 m7">

		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME DO ÓRGÃO</label>
		</div>

		<div class="input-field">
			<input type="text" class="cnpj" name="cnpj" value="@if(Auth::user()->id_usuario==0){{Auth::user()->cnpj}}@else@php

       $users = Auth::user()->select('cnpj')->where('id',Auth::user()->id_usuario)->get() ; foreach($users as $user) { echo $user->cnpj ;}

       @endphp@endif" readonly="readonly">
			<label>CNPJ</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>ENDEREÇO</label>
		</div>

		<div class="row">

			<div class="input-field  col s9">
				<input type="text" name="ordenador_nome" value="{{isset($registro->ordenador_nome) ? $registro->ordenador_nome : ''}}">
				<label>NOME DO ORDENADOR DE DESPESAS</label>
			</div>

			<div class="col s3">
			      <input name="ordenador_sexo"  {{ isset($registro->ordenador_sexo) && $registro->ordenador_sexo == 'masculino' ? 'checked' : '' }}  type="radio" id="ordenador_sexo_masculino" value="masculino" checked="checked" />
			      <label for="ordenador_sexo_masculino">Masculino</label>
			      <input name="ordenador_sexo" {{ isset($registro->ordenador_sexo) && $registro->ordenador_sexo == 'feminino' ? 'checked' : '' }} type="radio" id="ordenador_sexo_feminino"  value="feminino" />
			      <label for="ordenador_sexo_feminino">Feminino</label>
			</div>

		</div>

		<div class="input-field">
			<input type="text" name="ordenador_cargo" value="{{isset($registro->ordenador_cargo) ? $registro->ordenador_cargo : ''}}">
			<label>CARGO DO ORDENADOR DE DESPESAS</label>
		</div>

		<div class="input-field">
			<input type="text" name="dirigente_tipo" value="{{isset($registro->dirigente_tipo) ? $registro->dirigente_tipo : ''}}">
			<label>TIPO DE DIRIGENTE DO ÓRGÃO SOLICITANTE</label>
		</div>

		<div class="row">
			
			<div class="input-field  col s9">
				<input type="text" name="dirigente_nome" value="{{isset($registro->dirigente_nome) ? $registro->dirigente_nome : ''}}">
				<label>NOME DO DIRIGENTE DO ÓRGÃO SOLICITANTE</label>
			</div>

			<div class="col s3">
			      <input name="dirigente_sexo"  {{ isset($registro->dirigente_sexo) && $registro->dirigente_sexo == 'masculino' ? 'checked' : '' }}  type="radio" id="dirigente_sexo_masculino" value="masculino" checked="checked" />
            <label for="dirigente_sexo_masculino">Masculino</label>
            <input name="dirigente_sexo" {{ isset($registro->dirigente_sexo) && $registro->dirigente_sexo == 'feminino' ? 'checked' : '' }} type="radio" id="dirigente_sexo_feminino"  value="feminino" />
            <label for="dirigente_sexo_feminino">Feminino</label>
			</div>

		</div>

		<div class="input-field">
			<input type="text" class="cpf" name="dirigente_cpf" value="{{isset($registro->dirigente_cpf) ? $registro->dirigente_cpf : ''}}">
			<label>CPF DO DIRIGENTE DO ÓRGÃO SOLICITANTE</label>
		</div>


	</div>

	<div class="col s7 m7">
		<input type="hidden" name="id_usuario" value="@if(Auth::user()->id_usuario==0){{Auth::user()->id}}@else@php

       $registro = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; foreach($registro as $user) { echo $user->id ;}

       @endphp@endif">
	</div>

</div>

@section('page-script')
<script type="text/javascript">

	$(document).ready(function(){
		/*
	    * Este método gera máscaras para o formulário
	    */
  	  	$('.cnpj').mask('00.000.000/0000-00', {reverse: true});	 
  	  	$('.cpf').mask('000.000.000-00', {reverse: true}); 	
	  	  //$('.date').mask('11/11/1111');
	  	  //$('.time').mask('00:00:00');
	  	  //$('.date_time').mask('00/00/0000 00:00:00');
	  	  //$('.cep').mask('00000-000');
	  	  //$('.phone').mask('0000-0000');
	  	  //$('.phone_with_ddd').mask('(00) 0000-0000');
	  	  //$('.phone_us').mask('(000) 000-0000');
	  	  //$('.mixed').mask('AAA 000-S0S');
		  //$('.money').mask('000.000.000.000.000,00', {reverse: true});

  	});

    /*
    * Este método valida o formulário
    */
    $("form#frm_orgao").validate({
          rules: {
              nome: {
                  required: true,
                  minlength: 2
              },
              cnpj: {
                  required: true,
                  minlength: 18,
                  maxlength: 18
              },
              
              endereco: {
              	  required:true,
                  minlength: 2
              },
              ordenador_nome: {
              	  required:true,
                  minlength: 2
              },
              //ordenador_sexo: {
              //    required: true
              //},
              ordenador_cargo: {
                  required: true,
                  minlength: 2
              },
              dirigente_tipo: {
                  required: true,
                  minlength: 2
              },
              dirigente_nome: {
                  required: true,
                  minlength: 2
              },
              //dirigente_sexo: {
              //    required: true
                 // equalTo: "#pass"
              //},
              dirigente_cpf: {
                  required: true,
                  minlength: 14,
                  maxlength: 14
              }

          },
          //For custom messages
          messages: {
              nome: {
                  required: "Por favor insira um Nome para o Órgão",
                  minlength: "Digite mais de 1 caracter"
              },
              cnpj: {
                  required: "Por favor insira um CNPJ correto",
                  minlength: "Digite mais de 1 caracter"
              },
              
              endereco: {
              	  required: "Por favor insira o Endereço do Órgão",
                  minlength: "Digite mais de 1 caracter"
              },
              ordenador_nome: {
              	  required: "Por favor insira um Nome para o Ordenador",
                  minlength: "Digite mais de 1 caracter"
              },
             // ordenador_sexo: {
             //     required: "Escolha um sexo para o Ordenador"
              //},
              ordenador_cargo: {
                  required: "Por favor insira um Cargo para o Ordenador",
                  minlength: "Digite mais de 1 caracter"
              },
              dirigente_tipo: {
                  required: "Por favor escolha um tipo de dirigente",
                  minlength: "Digite mais de 1 caracter"
              },
              dirigente_nome: {
                  required: "Por favor insira um Nome para o dirigente",
                  minlength: "Digite mais de 1 caracter"
              },
             // dirigente_sexo: {
              //    required: "Escolha um sexo para o dirigente"
              //},
              dirigente_cpf: {
                  required: "Por favor insira um CPF correto",
                  minlength: "Digite mais de 1 caracter"
              },
              pregoeiro_nome: {
                  required: "Por favor insira um Nome para o Pregoeiro",
                  minlength: "Digite mais de 1 caracter"
              },
              ato_designacao: {
                  required: "Por favor insira um Ato de Desinação",
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
            $("form#frm_orgao").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>
@endsection
