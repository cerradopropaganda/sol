<div class="row">
	
	<div class="col s7 m7">


		<!--<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME</label>
		</div>-->

		
		<div class="input-field">
			<textarea class="materialize-textarea" name="descricao">{{isset($registro->descricao) ? $registro->descricao : ''}}</textarea>
			<label>DESCRIÇÃO</label>
		</div>

		<div class="input-field">
			<input type="text" name="cod" value="{{isset($registro->cod) ? $registro->cod : ''}}">
			<label>CÓDIGO</label>
		</div>


		<div class="input-field">
			<input type="text" name="catmat" value="{{isset($registro->catmat) ? $registro->catmat : ''}}">
			<label>CAT. MAT</label>
		</div>

		<div class="input-field">
			<input type="text" name="el_despesa" value="{{isset($registro->el_despesa) ? $registro->el_despesa : ''}}">
			<label>EL DESPESA</label>
		</div>

		 <div class="input-field">
			<input type="text" name="unidade" value="{{isset($registro->unidade) ? $registro->unidade : ''}}">
			<label>UNIDADE</label>
		</div>
			
		<br>

	    <div class="input-field">
		    <select>
		      <option value="" disabled selected>Escolha uma opção</option>
		      <option value="1">MATERIAL CONSUMO</option>
		      <option value="2">MATERIAL PERMANENTE</option>
		      <option value="3">SERVIÇO</option>
		    </select>
		    <label>TIPO DE OBJETO</label>
	  	</div>

	  	<br>

	    <div class="input-field">
		    <select multiple>
			  <option value="" disabled selected>MATERIAL CONSUMO</option>		      
		      <option value="1">Coroas de flores</option>
		      <option value="2">Divisórias instaladas</option>
		      <option value="3">Enxovais para bebês</option>
		      <option value="3">Equipamentos de Proteção Individual</option>
		      <option value="3">Ferragens</option>
		      <option value="3">Ferramentas para serviços de manutenção</option>
		      <option value="" disabled>MATERIAL PERMANENTE</option>
		      <option value="1">Coroas de flores</option>
		      <option value="2">Divisórias instaladas</option>
		      <option value="3">Enxovais para bebês</option>
		      <option value="3">Equipamentos de Proteção Individual</option>
		      <option value="3">Ferragens</option>
		      <option value="3">Ferramentas para serviços de manutenção</option>
		      <option value="" disabled>SERVIÇO</option>
		      <option value="1">Coroas de flores</option>
		      <option value="2">Divisórias instaladas</option>
		      <option value="3">Enxovais para bebês</option>
		      <option value="3">Equipamentos de Proteção Individual</option>
		      <option value="3">Ferragens</option>

		    </select>
		    <label>CATEGORIAS DE OBJETO</label>
	  	</div>

	   
		<BR><BR>






	</div>

	<div class="col s7 m7">

	</div>

</div>

