<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
		    <select>
		      <option value="" disabled selected>Escolha uma opção</option>
		      <option value="1">Item 1</option>
		      <option value="2">Item 2</option>
		      <option value="3">Item 3</option>
		    </select>
		    <label>ÓRGÃO SOLICITANTE</label>
	  	</div>

	  	<br>

	  	<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>OBJETO</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>JUSTIFICATIVA</label>
		</div>


		<div class="input-field">
			<input type="text" name="objeto" value="{{isset($registro->cnpj) ? $registro->cnpj : ''}}">
			<label>NÚMERO DO PROCESSO</label>
		</div>

		<div class="input-field">
			<input type="text" name="fantasia" value="{{isset($registro->fantasia) ? $registro->fantasia : ''}}">
			<label>NÚMERO DA LICITAÇÃO</label>
		</div>

		<!--<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>ORIGEM DOS RECURSOS PARA A CONTRATAÇÃO</label>
		</div>-->

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>DOTAÇÃO ORÇAMENTÁRIA</label>
		</div>

		<div class="input-field">
			<input type="text" name="objeto" value="{{isset($registro->cnpj) ? $registro->cnpj : ''}}">
			<label>NÚMERO DA FICHA DO QDD</label>
		</div>
		<br>
		<label><H6>SERÁ EXIGIDA A GARANTIAL CONTRATUAL?</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="status" id="status" value="1"  {{ isset($registro->status) && $registro->status == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>DADOS BANCÁRIOS PARA DEPÓSITO DE CAUÇÃO</label>
		</div>

		<label><H6>EXIGIR COMPROVAÇÃO DE QUALIFICAÇÃO TÉCNICA?</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="status" id="status" value="1"  {{ isset($registro->status) && $registro->status == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>


		<div class="input-field">
			<input type="text" name="objeto" value="{{isset($registro->cnpj) ? $registro->cnpj : ''}}">
			<label>ENDEREÇO ELETRÔNICO DO EDITAL</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>ENDEREÇO FÍSICO PARA OBTENÇÃO DO EDITAL</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>LOCAL PARA OBTER INFORMAÇÕES SOBRE O EDITAL</label>
		</div>

		<div class="input-field">
		    <select>
		      <option value="" disabled selected>Escolha uma opção</option>
		      <option value="1">Item 1</option>
		      <option value="2">Item 2</option>
		      <option value="3">Item 3</option>
		    </select>
		    <label>FISCAL DE CONTRATO</label>
	  	</div>

	  	<br>

	  	<div class="input-field">
			<input disabled="" value="Nome do Pregoeiro" type="text"  name="nome_pregoeiro" value="{{isset($registro->nome_pregoeiro) ? $registro->nome_pregoeiro : ''}}">
			<label>NOME DO PREGOEIRO</label>
		</div>

		<div class="input-field">
			<input disabled="" value="Ato de Designação da CPL" type="text"  name="ato_designacao" value="{{isset($registro->ato_designacao) ? $registro->ato_designacao : ''}}">
			<label>ATO DE DESIGNAÇÃO DA CPL</label>
		</div>
	  	<!--<br>

	  	<div class="input-field">
		    <select>
		      <option value="" disabled selected>Escolha uma opção</option>
		      <option value="1">Item 1</option>
		      <option value="2">Item 2</option>
		      <option value="3">Item 3</option>
		    </select>
		    <label>ATO DE DESIGNAÇÃO DA CPL</label>
	  	</div>
		-->
	  	<br>

	  	<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>ENDEREÇO DA REALIZAÇÃO DO CERTAME</label>
		</div>

		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_final" value="{{isset($registro->data_contrato_final) ? $registro->data_contrato_final : ''}}">
			<label>DATA DE ABERTURA DA SESSÃO</label>
		</div>

		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_final" value="{{isset($registro->data_contrato_final) ? $registro->data_contrato_final : ''}}">
			<label>HORÁRIO DE ABERTURA DA SESSÃO</label>
		</div>

		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_final" value="{{isset($registro->data_contrato_final) ? $registro->data_contrato_final : ''}}">
			<label>DATA DE ENCERRAMENTO DA SESSÃO</label>
		</div>

		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_final" value="{{isset($registro->data_contrato_final) ? $registro->data_contrato_final : ''}}">
			<label>HORÁRIO DE ENCERRAMENTO DA SESSÃO</label>
		</div>

		<BR>

		<label><H6>LICITAÇÃO EXCLUSIVA PARA ME e EPP?</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="status" id="status" value="1"  {{ isset($registro->status) && $registro->status == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>

		<label><H6>LICITAÇÃO COM ITENS DESTINADOS À PARTICIPAÇÃO PARA ME E EPP?</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="status" id="status" value="1"  {{ isset($registro->status) && $registro->status == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>



		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>EMAIL PARA SOLICITAÇÃO DE INFORMAÇÕES</label>
		</div>



		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>TIPO DE JULGAMENTO</label>
		</div>

		




	</div>

	<div class="col s7 m7">

	</div>

</div>

