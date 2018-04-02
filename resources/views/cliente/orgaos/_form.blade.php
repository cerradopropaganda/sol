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
			      <input name="ordenador_sexo" type="radio" id="Masculino" checked="checked" />
			      <label for="Masculino">Masculino</label>
			      <input name="ordenador_sexo" type="radio" id="Feminino" />
			      <label for="Feminino">Feminino</label>
			</div>

		</div>

		<div class="input-field">
			<input type="text" name="ordenador_cargo" value="{{isset($registro->ordenador_cargo) ? $registro->ordenador_cargo : ''}}">
			<label>CARGO DO ORDENADOR DE DESPESAS</label>
		</div>

		<div class="input-field">
			<input type="text" name="diligente_tipo" value="{{isset($registro->diligente_tipo) ? $registro->diligente_tipo : ''}}">
			<label>TIPO DE DIRIGENTE DO ÓRGÃO SOLICITANTE</label>
		</div>

		<div class="row">
			
			<div class="input-field  col s9">
				<input type="text" name="diligente_nome" value="{{isset($registro->diligente_nome) ? $registro->diligente_nome : ''}}">
				<label>NOME DO DIRIGENTE DO ÓRGÃO SOLICITANTE</label>
			</div>

			<div class="col s3">
			      <input name="diligente_sexo" type="radio" id="Masculino2" checked="checked" />
			      <label for="Masculino2">Masculino</label>
			      <input name="diligente_sexo" type="radio" id="Feminino2" />
			      <label for="Feminino2">Feminino</label>
			</div>

		</div>

		<div class="input-field">
			<input type="text" class="cpf" name="diligente_cpf" value="{{isset($registro->diligente_cpf) ? $registro->diligente_cpf : ''}}">
			<label>CPF DO DIRIGENTE DO ÓRGÃO SOLICITANTE</label>
		</div>

		<div class="input-field">
			<input type="text" name="pregoeiro_nome" value="{{isset($registro->pregoeiro_nome) ? $registro->pregoeiro_nome : ''}}">
			<label>NOME DO PREGOEIRO</label>
		</div>

		<div class="input-field">
			<input type="text" name="ato_designacao" value="{{isset($registro->ato_designacao) ? $registro->ato_designacao : ''}}">
			<label>ATO DE DESIGNAÇÃO DA COMISSÃO DE LICITAÇÃO</label>
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
              diligente_tipo: {
                  required: true,
                  minlength: 2
              },
              diligente_nome: {
                  required: true,
                  minlength: 2
              },
              //diligente_sexo: {
              //    required: true
                 // equalTo: "#pass"
              //},
              diligente_cpf: {
                  required: true,
                  minlength: 14,
                  maxlength: 14
              },
              pregoeiro_nome: {
                  required: true,
                  minlength: 2
              },
              ato_designacao: {
                  required: true,
                  minlength: 2
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
              diligente_tipo: {
                  required: "Por favor escolha um tipo de Diligente",
                  minlength: "Digite mais de 1 caracter"
              },
              diligente_nome: {
                  required: "Por favor insira um Nome para o Diligente",
                  minlength: "Digite mais de 1 caracter"
              },
             // diligente_sexo: {
              //    required: "Escolha um sexo para o Diligente"
              //},
              diligente_cpf: {
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
