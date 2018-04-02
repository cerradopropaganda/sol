<div class="row">
	
	<div class="col s7 m7">

  

    <div class="input-field">
      <select  name="nivel">

          @if(Auth::user()->nivel==1)
          <option value="2" @if (isset($registro->nivel)) @if ($registro->nivel == 2) selected  @endif @endif > NIVEL 2 </option> 
          @endif
          <option value="3" @if (isset($registro->nivel)) @if ($registro->nivel == 3) selected  @endif @endif > NIVEL 3 </option> 
          <option value="4" @if (isset($registro->nivel)) @if ($registro->nivel == 4) selected  @endif @endif > NIVEL 4 </option> 
          <option value="5" @if (isset($registro->nivel)) @if ($registro->nivel == 5) selected  @endif @endif > NIVEL 5 </option> 
      </select>
      <label>NIVEL DE PERMISSÃO</label>
    </div>



		<div class="input-field">
			<input type="text" name="nome_contato" value="{{isset($registro->nome_contato) ? $registro->nome_contato : ''}}" class="validate">
			<label data-error="Digite um nome">NOME DO CONTATO</label>
		</div>

		<div class="input-field">
			<input type="email" name="email_contato" value="{{isset($registro->email_contato) ? $registro->email_contato : ''}}" class="validate">
			<label data-error="Digite um e-mail válido">E-MAIL DO CONTATO</label>
		</div>

		<div class="input-field">
			<input type="text" name="username" value="{{isset($registro->username) ? $registro->username : ''}}" class="validate">
			<label data-error="">USUÁRIO</label>
		</div>

		<div class="input-field">
			<input type="password" name="password" value="" class="validate">
			<label data-error="">PASSWORD</label>
		</div>

		<div class="input-field">
			<input type="text" name="fone1" value="{{isset($registro->fone1) ? $registro->fone1 : ''}}" class="validate phone">
			<label data-error="">TELEFONE 1</label>
		</div>

		<div class="input-field">
			<input type="text" name="fone2" value="{{isset($registro->fone2) ? $registro->fone2 : ''}}" class="phone">
			<label data-error="">TELEFONE 2</label>
		</div>

		<div class="input-field">
			<input type="text" name="fone3" value="{{isset($registro->fone3) ? $registro->fone3 : ''}}" class="phone">
			<label data-error="">TELEFONE 3</label>
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
    * Este método corrige os telefones de são paulo
    */
	  var maskBehavior = function (val) {
		  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
		options = {onKeyPress: function(val, e, field, options) {
		  field.mask(maskBehavior.apply({}, arguments), options);
		}};

    /*
    * Este método gera máscaras para o formulário
    */		 
		$('.phone').mask(maskBehavior, options);
  	  	$('.cnpj').mask('00.000.000/0000-00', {reverse: true});	  	
  	  //$('.date').mask('11/11/1111');
  	  //$('.time').mask('00:00:00');
  	  //$('.date_time').mask('00/00/0000 00:00:00');
  	  //$('.cep').mask('00000-000');
  	  //$('.phone').mask('0000-0000');
  	  //$('.phone_with_ddd').mask('(00) 0000-0000');
  	  //$('.phone_us').mask('(000) 000-0000');
  	  //$('.mixed').mask('AAA 000-S0S');
  	  //$('.cpf').mask('000.000.000-00', {reverse: true});

  	  //$('.money').mask('000.000.000.000.000,00', {reverse: true});
  	});

    /*
    * Este método valida o formulário
    */
    $("#frm_usuarios").validate({
          rules: {
              cnpj: {
                  required: true,
                  minlength: 18,
                  maxlength: 18
              },
              nome_contato: {
                  required: true,
                  minlength: 2
              },
              email_contato: {
                  required: true,
                  email:true
              },
              username: {
                  required: true,
                  minlength: 2
              },
              //password: {
                 // required: true,
                  //minlength: 3,
                 // equalTo: "#pass"
              //},
              fone1: {
                  required: true
                  //minlength: 15
              }


              

          },
          //For custom messages
          messages: {
              cnpj: {
                  required: "Por favor insira um CNPJ",
                  minlength: "Verifique o CNPJ informado"
              },
              nome_contato: {
                  required: "Por favor insira um NOME DE CONTATO",
                  minlength: "Digite mais de 1 caracter"
              },
              email_contato: {
                  required: "Por favor insira um E-MAIL",
                  email: "Digite um e-mail válido"
              },
              username: {
                 required: "Por favor insira um NOME DE USUÁRIO",
                  minlength: "Digite mais de 1 caracter"
              },
              fone1: {
                  required: "Por favor insira um TELEFONE",
                  minlength: "Confira o número do telefone informado"
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
            $("form#frm_usuarios").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>

@endsection

