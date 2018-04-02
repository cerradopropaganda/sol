<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
			<input type="text" name="cnpj" value="{{isset($registro->cnpj) ? $registro->cnpj : ''}}" class="validate cnpj">
			<label for="cnpj" class="active" data-error="Preencha o CNPJ">CNPJ</label>
		</div>

		<div class="input-field">
			<input type="text" name="fantasia" value="{{isset($registro->fantasia) ? $registro->fantasia : ''}}" class="validate">
			<label data-error="">NOME DO ÓRGÃO SOLICITANTE</label>
		</div>
		<br>
		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_inicio" value="{{isset($registro->data_contrato_inicio) ? date( 'd/m/Y' , strtotime($registro->data_contrato_inicio )) : ''}}" class="validate">
			<label >DATA INÍCIO DO CONTRATO</label>
		</div>
		<br>
		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_final" value="{{isset($registro->data_contrato_final) ? date( 'd/m/Y' , strtotime($registro->data_contrato_final )) : ''}}" class="validate">
			<label data-error="">DATA FINAL DO CONTRATO</label>
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
			<textarea class="materialize-textarea validate" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label data-error="">ENDEREÇO</label>
		</div>

		<div class="input-field">
			<input type="text" name="cidade" value="{{isset($registro->cidade) ? $registro->cidade : ''}}" class="validate">
			<label data-error="">CIDADE</label>
		</div>

		<div class="input-field">
			<input type="text" name="uf" value="{{isset($registro->uf) ? $registro->uf : ''}}" class="validate">
			<label data-error="">ESTADO</label>
		</div>

		<div class="input-field">
			<input type="text" name="website" value="{{isset($registro->website) ? $registro->website : ''}}">
			<label data-error="">WEBSITE</label>
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

		<label><H6>USUÁRIO HABILITADO</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="status" id="status" value="1"  {{ isset($registro->status) && $registro->status == '1' ? 'checked' : '' }} >
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
              fantasia: {
                  required: true,
                  minlength: 2
              },
              data_contrato_inicio: {
              	  required:true,
              	  dateBR: true
              },
              data_contrato_final: {
              	  required:true,
              	   dateBR: true
              },
              nome_contato: {
                  required: true,
                  minlength: 2
              },
              email_contato: {
                  required: true,
                  email:true
              },
              endereco: {
                  required: true,
                  minlength: 2
              },
              cidade: {
                  required: true,
                  minlength: 2
              },
              uf: {
                  required: true,
                  minlength: 2,
                  maxlength: 3
                 // equalTo: "#pass"
              },
              //website: {
                  //required: true,
                  //minlength: 2
              //},
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
              fantasia: {
                 required: "Por favor insira um Nome Fantasia",
                  minlength: "Digite mais de 1 caracter"
              },
              data_contrato_inicio: {
              	  required: "Por favor insira um DATA DE INÍCIO DE CONTRATO",
                  date: "Insira uma data válida"
              },
              data_contrato_final: {
              	  required: "Por favor insira um DATA DE INÍCIO DE CONTRATO",
                  date: "Insira uma data válida"
              },
              nome_contato: {
                  required: "Por favor insira um NOME DE CONTATO",
                  minlength: "Digite mais de 1 caracter"
              },
              email_contato: {
                  required: "Por favor insira um E-MAIL",
                  email: "Digite um e-mail válido"
              },
              endereco: {
                  required: "Por favor insira um ENDEREÇO",
                  minlength: "Digite mais de 1 caracter"
              },
              cidade: {
                  required: "Por favor insira uma CIDADE",
                  minlength: "Digite mais de 1 caracter"
              },
              uf: {
                  required: "Por favor insira um ESTADO",
                  minlength: "Digite 2 caracter",
                  maxlength: "Digite 2 caracter"
                 // equalTo: "#pass"
              },
              //website: {
                  //required: "Por favor insira um WEBSITE",
                  //minlength: "Digite mais de 1 caracter"
              //},
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
    * Este método pode ser adicionado dentro do $('ducument').ready();
    */
    $.validator.addMethod("dateBR", function(value, element) {
                if(value.length!=10) return false;
                // verificando data
                var data       = value;
                var dia         = data.substr(0,2);
                var barra1   = data.substr(2,1);
                var mes        = data.substr(3,2);
                var barra2   = data.substr(5,1);
                var ano         = data.substr(6,4);
                if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
                if((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
                if(mes==2  &&  (dia>29||(dia==29 && ano%4!=0)))return false;
                if(ano < 1900)return false;
                return true;
            }, "Informe uma data válida");  // Mensagem padrão


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

