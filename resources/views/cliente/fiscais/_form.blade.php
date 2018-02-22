<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
		    <select>
		      <option value="" disabled selected>Escolha um Orgão Solicitante</option>
		      <option value="1">Orgão 1</option>
		      <option value="2">Orgão 2</option>
		      <option value="3">Orgão 3</option>
		    </select>
		    <label>NOME DO ORGÃO</label>
		  </div>


		<div class="input-field">
			<input type="text" name="nome_pregoeiro" value="{{isset($registro->nome_pregoeiro) ? $registro->nome_pregoeiro : ''}}">
			<label>NOME DO FISCAL</label>
		</div>

		<div class="input-field">
			<input type="text" name="nome_pregoeiro" value="{{isset($registro->nome_pregoeiro) ? $registro->nome_pregoeiro : ''}}">
			<label>NÚMERO DA MATRÍCULA</label>
		</div>

		<div class="input-field">
			<input type="text" name="cpf" value="{{isset($registro->cpf) ? $registro->cpf : ''}}">
			<label>CPF</label>
		</div>


		<div class="input-field">
			<input type="text" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
			<label>E-MAIL</label>
		</div>


	</div>

	<div class="col s7 m7">

	</div>

</div>

