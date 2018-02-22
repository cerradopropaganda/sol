<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
			<input type="text" name="cnpj" value="{{isset($registro->cnpj) ? $registro->cnpj : ''}}">
			<label>CNPJ</label>
		</div>

		<div class="input-field">
			<input type="text" name="fantasia" value="{{isset($registro->fantasia) ? $registro->fantasia : ''}}">
			<label>NOME FANTASIA</label>
		</div>

		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_inicio" value="{{isset($registro->data_contrato_inicio) ? $registro->data_contrato_inicio : ''}}">
			<label>DATA INÍCIO DO CONTRATO</label>
		</div>

		<div class="input-field">
			<input type="text" class="datepicker" name="data_contrato_final" value="{{isset($registro->data_contrato_final) ? $registro->data_contrato_final : ''}}">
			<label>DATA FINAL DO CONTRATO</label>
		</div>

		<div class="input-field">
			<input type="text" name="nome_contato" value="{{isset($registro->nome_contato) ? $registro->nome_contato : ''}}">
			<label>NOME DO CONTATO</label>
		</div>

		<div class="input-field">
			<input type="text" name="email_contato" value="{{isset($registro->email_contato) ? $registro->email_contato : ''}}">
			<label>E-MAIL DO CONTATO</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>ENDEREÇO</label>
		</div>

		<div class="input-field">
			<input type="text" name="cidade" value="{{isset($registro->cidade) ? $registro->cidade : ''}}">
			<label>CIDADE</label>
		</div>

		<div class="input-field">
			<input type="text" name="uf" value="{{isset($registro->uf) ? $registro->uf : ''}}">
			<label>ESTADO</label>
		</div>

		<div class="input-field">
			<input type="text" name="website" value="{{isset($registro->website) ? $registro->website : ''}}">
			<label>WEBSITE</label>
		</div>

		<div class="input-field">
			<input type="text" name="username" value="{{isset($registro->username) ? $registro->username : ''}}">
			<label>USUÁRIO</label>
		</div>

		<div class="input-field">
			<input type="text" name="password" value="">
			<label>PASSWORD</label>
		</div>

		<div class="input-field">
			<input type="text" name="fone1" value="{{isset($registro->fone1) ? $registro->fone1 : ''}}">
			<label>TELEFONE 1</label>
		</div>

		<div class="input-field">
			<input type="text" name="fone2" value="{{isset($registro->fone2) ? $registro->fone2 : ''}}">
			<label>TELEFONE 2</label>
		</div>

		<div class="input-field">
			<input type="text" name="fone3" value="{{isset($registro->fone3) ? $registro->fone3 : ''}}">
			<label>TELEFONE 3</label>
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

