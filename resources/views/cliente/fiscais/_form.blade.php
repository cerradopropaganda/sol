<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
		    <select  name="id_orgao">
		      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
		      @foreach($orgaos as $orgao)                    
                   <option value="{{ $orgao->id }}" @if (isset($registro->id_orgao)) @if ($registro->id_orgao == $orgao->id) selected  @endif @endif > {{ $orgao->nome }} </option> 
              @endforeach
		    </select>
		    <label>NOME DO ÓRGÃO</label>
		  </div>


		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME DO FISCAL</label>
		</div>

		<div class="input-field">
			<input type="text" name="matricula" value="{{isset($registro->matricula) ? $registro->matricula : ''}}">
			<label>NÚMERO DA MATRÍCULA</label>
		</div>

		<div class="input-field">
			<input class="cpf" type="text" name="cpf" value="{{isset($registro->cpf) ? $registro->cpf : ''}}">
			<label>CPF</label>
		</div>


		<div class="input-field">
			<input type="text" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
			<label>E-MAIL</label>
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
    $("#frm_fiscal").validate({
          rules: {
              nome: {
                  required: true,
                  minlength: 2
              },
              matricula: {
                  required: true,
                  minlength: 2
              },
              cpf: {
                  required: true,
                  minlength: 14,
                  maxlength: 14
              },
              email: {
                  required: true,
                  email:true
              }     

          },
          //For custom messages
          messages: {
              nome: {
                  required: "Por favor insira um Nome para o Fiscal de Contrato",
                  minlength: "Digite mais de 1 caracter"
              },
              matricula: {
                  required: "Por favor insira um número de Matrícula",
                  minlength: "Digite mais de 1 caracter"
              },
              cpf: {
                  required: "Por favor insira um CPF correto",
                  minlength: "Digite mais de 1 caracter"
              },
              email: {
                  required: "Por favor insira um E-MAIL para o Fiscal de Contrato",
                  email: "Digite um e-mail válido"
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
            $("#frm_fiscal").submit();
            e.preventDefault();
            return false;
        }
    }); 

</script>
@endsection


