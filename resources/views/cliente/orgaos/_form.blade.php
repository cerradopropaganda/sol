<div class="row">
	
	<div class="col s7 m7">

		<div class="input-field">
			<input type="text" name="nome_orgao" value="{{isset($registro->nome_orgao) ? $registro->nome_orgao : ''}}">
			<label>NOME DO ORGÃO</label>
		</div>

		<div class="input-field">
			<input type="text" name="cnpj" value="42.318.949/0001-84" disabled="disabled">
			<label>CNPJ</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="endereco">{{isset($registro->endereco) ? $registro->endereco : ''}}</textarea>
			<label>ENDEREÇO</label>
		</div>

		<div class="row">

			<div class="input-field  col s9">
				<input type="text" name="nome_ordenador" value="{{isset($registro->nome_ordenador) ? $registro->nome_ordenador : ''}}">
				<label>NOME DO ORDENADOR DE DESPESAS</label>
			</div>

			<div class="col s3">
			      <input name="sexo_ordenador" type="radio" id="Masculino" checked="checked" />
			      <label for="Masculino">Masculino</label>
			      <input name="sexo_ordenador" type="radio" id="Feminino" />
			      <label for="Feminino">Feminino</label>
			</div>

		</div>

		<div class="input-field">
			<input type="text" name="cargo_ordenador" value="{{isset($registro->cargo_ordenador) ? $registro->cargo_ordenador : ''}}">
			<label>CARGO DO ORDENADOR DE DESPESAS</label>
		</div>

		<div class="input-field">
			<input type="text" name="tipo_dirigente" value="{{isset($registro->tipo_dirigente) ? $registro->tipo_dirigente : ''}}">
			<label>TIPO DE DIRIGENTE DO ORGÃO SOLICITANTE</label>
		</div>

		<div class="row">
			
			<div class="input-field  col s9">
				<input type="text" name="nome_dirigente" value="{{isset($registro->nome_dirigente) ? $registro->nome_dirigente : ''}}">
				<label>NOME DO DIRIGENTE DO ORGÃO SOLICITANTE</label>
			</div>

			<div class="col s3">
			      <input name="sexo_dirigente" type="radio" id="Masculino2" checked="checked" />
			      <label for="Masculino2">Masculino</label>
			      <input name="sexo_dirigente" type="radio" id="Feminino2" />
			      <label for="Feminino2">Feminino</label>
			</div>

		</div>

		<div class="input-field">
			<input type="text" name="cpf_dirigente" value="{{isset($registro->cpf_dirigente) ? $registro->cpf_dirigente : ''}}">
			<label>CPF DO DIRIGENTE DO ORGÃO SOLICITANTE</label>
		</div>

		<div class="input-field">
			<input type="text" name="nome_pregoeiro" value="{{isset($registro->nome_pregoeiro) ? $registro->nome_pregoeiro : ''}}">
			<label>NOME DO PREGOEIRO</label>
		</div>

		<div class="input-field">
			<input type="text" name="ato_designacao" value="{{isset($registro->ato_designacao) ? $registro->ato_designacao : ''}}">
			<label>ATO DE DESIGNAÇÃO DA COMISSÃO DE LICITAÇÃO</label>
		</div>

	</div>

	<div class="col s7 m7">

	</div>

</div>

