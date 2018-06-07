<div class="row">
	
	<div class="col s7 m7">

<!--
		<div class="file-field input-field">
	      <div class="btn grey">
	        <span>ARQUIVO .CSV</span>
	        <input type="file">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text">
	      </div>
	    </div>-->

		 <div class="input-field">
			<input type="text" name="identificacao_compra" value="{{isset($registro->identificacao_compra) ? $registro->identificacao_compra : ''}}">
			<label>IDENTIFICAÇÃO DA COMPRA</label>
		</div>

		<div class="input-field">
			<input type="text" name="numero_item" value="{{isset($registro->numero_item) ? $registro->numero_item : ''}}">
			<label>NÚMERO ITEM</label>
		</div>

		<div class="input-field">			
			<input type="text" name="modalidade" value="{{isset($registro->modalidade) ? $registro->modalidade : ''}}">
			<label>MODALIDADE</label>
		</div>

		<div class="input-field">
			<input type="text" name="cat_mat" value="{{isset($registro->cat_mat) ? $registro->cat_mat : ''}}">
			<label>CAT. MAT.</label>
		</div>


		<div class="input-field">
			<input type="text" name="item" value="{{isset($registro->item) ? $registro->item : ''}}">
			<label>ITEM</label>
		</div>

		
		<div class="input-field">
			<input type="text" name="unidade" value="{{isset($registro->unidade) ? $registro->unidade : ''}}">
			<label>UNIDADE</label>
		</div>

		<div class="input-field">
			<input type="text" name="qtde" value="{{isset($registro->qtde) ? $registro->qtde : ''}}">
			<label>QUANTIDADE</label>
		</div>

		<div class="input-field">
			<input type="text" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
			<label>VALOR UNITÁRIO</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="fornecedor">{{isset($registro->fornecedor) ? $registro->fornecedor : ''}}</textarea>
			<label>FORNECEDOR</label>
		</div>

		<div class="input-field">
			<input type="text" name="orgao" value="{{isset($registro->orgao) ? $registro->orgao : ''}}">
			<label>ORGÃO</label>
		</div>

		<div class="input-field">
			<textarea class="materialize-textarea" name="unidade_gestora">{{isset($registro->unidade_gestora) ? $registro->unidade_gestora : ''}}</textarea>
			<label>UNIDADE GESTORA</label>
		</div>

		<div class="input-field">
			<input type="text" class="datepicker" name="data_compra" value="{{isset($registro->data_compra) ? $registro->data_compra : ''}}">
			<label>DATA DA COMPRA</label>
		</div>

		<span style="clear: both;">
		<br>

	   <div class="file-field input-field">
	      <div class="btn">
	        <span>ANEXO PDF</span>
	        <input type="file"  name="anexo">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text">
	      </div>
	    </div>

	    @if(isset($registro->anexo))
	    <div class="input-field">
	      <img src="{{asset($registro->anexo)}}" width="150">
	    </div>
	    @endif

		<input type="hidden" name="id_item" value="{{isset($registro->id_item) ? $registro->id_item : ''}}">

			
		<BR><BR>




	</div>

	<div class="col s7 m7">

	</div>

</div>

