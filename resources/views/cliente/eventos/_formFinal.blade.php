<ul class="stepper parallel">

                        	<!-- ETAPA INICIAL -->
	                         <li class="step">
	                            <div data-step-label="" class="step-title waves-effect waves-dark">Minuta do Edital</div>

	                            <div class="step-content">
	                               <div class="row">
										<textarea class="editor_basico" style="height: 600px;" name="minuta_edital">{{isset($minuta_edital_revisado) ? $minuta_edital_revisado : '' }}</textarea>

										
	                               </div>
	                               <div class="step-actions">
			                           <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">SALVAR MINUTA DO EDITAL</button>   
	                               </div>
	                            </div>
	                         </li>

	                         <!-- ETAPA FINAL -->
	                         <li class="step">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Imprimir Documentação para Análise Jurídica</div>
	                            <div class="step-content">
	                               

	                            	<br>

                                	<table class="responsive-table teal  lighten-5">
					                <tbody>
					                  <tr>
					                    <td  width="20%" >&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarEdital', $registro->id)}}/{{$edital->id}}" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>MINUTA DO EDITAL e ANEXOS</td>
					                  </tr>
					                </tbody>
					                </table>
					                <br><br>

	                            </div>
	                         </li>

	                         <!-- ETAPA 2 -->
	                         <li class="step">
	                            <div data-step-label="" class="step-title waves-effect waves-dark">Análise da Assessoria Jurídica</div>
	                            <div class="step-content">
	                               <div class="row">


	                               	<label><H6>EDITAL E ANEXO APROVADOS PELA ACESSÓRIA JURÍDICA</H6></label>

											<div class="switch">
												<label>
												  Não
												  <input type="checkbox" name="status" id="status" value="1"  {{ isset($registro->status) && $registro->status == '1' ? 'checked' : '' }} >
												  <span class="lever"></span>
												  Sim
												</label>
											</div>
											
										<BR>





	                               </div>
	                               <div class="step-actions">
	                               	  <button class="waves-effect waves-dark btn teal lighten-2 next-step">Salvar Aprovação</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button>   
	                                  <!--<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
	                                  <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>-->
	                               </div>
	                            </div>
	                         </li>

	                         <!-- ETAPA 4 -->
	                         <li class="step  @if(Auth::user()->nivel==3) disable_step @endif">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Formulário final: data, horário e endereço</div>
	                            <div class="step-content">
	                               <div class="row">


	                               		<div class="input-field">
											<input type="number" name="numero_licitacao" value="{{isset($registro->numero_licitacao) ? $registro->numero_licitacao : ''}}">
											<label>NÚMERO DA LICITAÇÃO 	 </label>
										</div>

										<div class="input-field">
											<input type="text" name="endereco_eletronico_edital" value="{{isset($registro->endereco_eletronico_edital) ? $registro->endereco_eletronico_edital : ''}}">
											<label>ENDEREÇO ELETRÔNICO DO EDITAL</label>
										</div>

										<div class="input-field">
											<textarea class="materialize-textarea" name="endereco_fisico_edital">{{isset($registro->endereco_fisico_edital) ? $registro->endereco_fisico_edital : ''}}</textarea>
											<label>ENDEREÇO FÍSICO PARA OBTENÇÃO DO EDITAL</label>
										</div>


										@if($licitacao_eletronica==0)
										<div class="input-field">
											<textarea class="materialize-textarea" name="endereco_certame">{{isset($registro->endereco_certame) ? $registro->endereco_certame : ''}}</textarea>
											<label>ENDEREÇO PARA REALIZAÇÃO DO CERTAME</label>
										</div>

										<div class="input-field">
											<input type="text" class="datepicker" name="data_abertura_sessao" value="{{isset($registro->data_abertura_sessao) ? $registro->data_abertura_sessao : ''}}">
											<label>DATA DE ABERTURA DA SESSÃO</label>
										</div>

										<div class="input-field">
											<input type="text" class="time" name="hora_abertura_sessao" value="{{isset($registro->hora_abertura_sessao) ? $registro->hora_abertura_sessao : ''}}">
											<label>HORÁRIO DE ABERTURA DA SESSÃO</label>
										</div>
										@endif

										<div class="input-field">
											<input type="email"  name="email_informacoes" value="{{isset($registro->email_informacoes) ? $registro->email_informacoes : ''}}">
											<label>EMAIL PARA SOLICITAÇÃO DE INFORMAÇÕES</label>
										</div>



										<!-- Se a modalidade for das modalidades "pregão eletrônico" ou "convite eletrônico", incluir os campos a seguir: -->
										@if($licitacao_eletronica==1)
										<div class="input-field">
											<textarea class="materialize-textarea" name="endereco_eletronico_conexao">{{isset($registro->endereco_eletronico_conexao) ? $registro->endereco_eletronico_conexao : ''}}</textarea>
											<label>ENDEREÇO ELETRÔNICO DE CONEXÃO PARA PARTICIPAÇÃO DO CERTAME</label>
										</div>

										<div class="input-field">
											<input type="text"  name="sistema_licitante" value="{{isset($registro->sistema_licitante) ? $registro->sistema_licitante : ''}}">
											<label>SISTEMA ONDE O LICITANTE DEVERÁ ESTAR CADASTRADO</label>
										</div>

										<div class="input-field">
											<input type="text" class="datepicker" name="data_inicio_proposta_eletronica" value="{{isset($registro->data_inicio_proposta_eletronica) ? $registro->data_inicio_proposta_eletronica : ''}}">
											<label>DATA DO INÍCIO DO PRAZO PARA ENVIO DA PROPOSTA ELETRÔNICA</label>
										</div>

										<div class="input-field">
											<input type="text" class="time" name="hora_inicio_proposta_eletronica" value="{{isset($registro->hora_inicio_proposta_eletronica) ? $registro->hora_inicio_proposta_eletronica : ''}}">
											<label>HORA DO INÍCIO DO PRAZO PARA ENVIO DA PROPOSTA ELETRÔNICA</label>
										</div>

										<div class="input-field">
											<input type="text" class="datepicker" name="data_termino_proposta_eletronica" value="{{isset($registro->data_termino_proposta_eletronica) ? $registro->data_termino_proposta_eletronica : ''}}">
											<label>DATA DO TÉRMINO DO PRAZO PARA ENVIO DA PROPOSTA ELETRÔNICA</label>
										</div>

										<div class="input-field">
											<input type="text" class="time" name="hora_termino_proposta_eletronica" value="{{isset($registro->hora_termino_proposta_eletronica) ? $registro->hora_termino_proposta_eletronica : ''}}">
											<label>HORA DO TÉRMINO DO PRAZO PARA ENVIO DA PROPOSTA ELETRÔNICA</label>
										</div>

										<div class="input-field">
											<input type="text"  class="minutos" name="tempo_duracao_sessao" value="{{isset($registro->tempo_duracao_sessao) ? $registro->tempo_duracao_sessao : ''}}">
											<label>TEMPO DE DURAÇÃO DA SESSÃO (MINUTOS)</label>
										</div>
										@endif





	                               </div>
	                               <div class="step-actions">
	                                  <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E IMPRIMIR DOCUMENTOS</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                            </div>
	                         </li>

	                         <!-- ETAPA FINAL -->
	                         <li class="step">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Imprimir Documentação completa</div>
	                            <div class="step-content">
	                               

	                            	<br>

                                	<table class="responsive-table teal  lighten-5">
					                <thead>
					                  <tr>
					                    <th width="20%" align="center"></th>
					                    <th width="80%">DOCUMENTO</th>

					                  </tr>
					                </thead>
					                <tbody>
					                	<!--<tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarEdital', $registro->id)}}/{{$edital->id}}" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>MINUTA DO EDITAL</td>
					                  </tr>-->
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarEdital', $registro->id)}}/{{$edital->id}}" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>EDITAL e ANEXOS</td>
					                  </tr>
					                  <!--<tr>
					                   <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarTermoReferencia', $registro->id)}}" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo I: Termo de Referência</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/11" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo II: Carta de Credenciamento</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/7" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo III: Declaração de Fatos Impeditivos</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/6" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo IV: Declaração que não emprega menor</td>
					                  </tr>
					                  <tr>
					                   <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/5" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo V: Declaração de Aceitação dos Termos do Edital</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/4" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo VI: Declaração de ME ou EPP</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/3" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo VII: Declaração de Atendimentos aos requisitos de habilitação</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="#" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo VIII: Modelo da Proposta</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/10" target="_blank"  class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>Anexo VIV: Minuta do Contrato</td>
					                  </tr>-->
					                </tbody>
					                </table>
					                <br><br>

	                            </div>
	                         </li>
	                    </ul>




	                    @section('page-script')
<script type="text/javascript">
	$(document).ready(function(){
		/*
	    * Este método gera máscaras para o formulário
	    */
  	  		//$('.cpf').mask('000.000.000-00', {reverse: true}); 	
	  	  //$('.date').mask('11/11/1111');
	  	  $('.time').mask('00:00');
	  	  $('.minutos').mask('000');
	  	  //$('.date_time').mask('00/00/0000 00:00:00');
	  	  //$('.cep').mask('00000-000');
	  	  //$('.phone').mask('0000-0000');
	  	  //$('.phone_with_ddd').mask('(00) 0000-0000');
	  	  //$('.phone_us').mask('(000) 000-0000');
	  	  //$('.mixed').mask('AAA 000-S0S');
		  //$('.money').mask('000.000.000.000.000,00', {reverse: true});

		  $('.editor_basico').trumbowyg({
		    btns: [
		        //['viewHTML'],
		        ['undo', 'redo'], // Only supported in Blink browsers
		        //['formatting'],
		        //['strong', 'em', 'del'],
		        ['strong'],
		        ['orderedList','unorderedList'],
		        //['superscript', 'subscript'],
		        //['link'],
		        //['insertImage'],
		        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
		        
		        //['horizontalRule'],
		        //['removeformat'],
		        ['fullscreen']
		    ]
		});

  	});


	/*
    * Este método salva as etapas do evento
    */
        
    $('.save-step').on('click',function(e){
      	console.log('salvar step');
        // salva etapas e muda tr se necessário
        salvar_etapa('{{$registro->id}}');
    });

	$('#id_modalidade').on('change', function() {
	  alert( this.value );
	})
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


    /*
    * Esta função salva as etapas do evento
    */
    function salvar_etapa(id){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        //e.preventDefault(e);
        $.ajax({
	          type:"POST",
	          url:'{{route("cliente.eventos.atualizar")}}/'+id,
	          data:$('#frm_evento').serialize(),
	          dataType: 'json',
	          cache: false,
	          processData: false,
	          success: function(data){                    
	            var $toastContent = $('<span>ETAPA SALVA COM SUCESSO</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action">X</button>'));
	            Materialize.toast($toastContent, 5000);  
	          },
	          error: function(data){  
	          	var $toastContent = $('<span>ERRO PARA SALVAR ESTA ETAPA, CONTACTE O ADMINISTRADOR DO SISTEMA. </span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action">X</button>'));
	            Materialize.toast($toastContent, 5000);  	          	
	          }
        })
    }

</script>
@endsection
