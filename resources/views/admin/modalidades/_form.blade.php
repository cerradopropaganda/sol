<div class="row">
	
	<div class="col s7 m7">



		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME DA MODALIDADE</label>
		</div>

		 <br><br>
        <labe><H6><b>FASES DA MODALIDADE</b></H6></label><br>


          <p style="margin-bottom: 1em">
            <input name="tr_escolhido" type="radio" id="789" value="789"  class="validate" required  />
            <label for="789">APENAS FASE INICIAL</label>
          </p>

          <p style="margin-bottom: 1em">
            <input name="tr_escolhido" type="radio" id="456" value="456"  class="validate" required  />
            <label for="456">FASE INICIAL E FINAL</label>
          </p>


        <br>
		<label><H6>LICITAÇÃO ELETRÔNICA?</H6></label>

			<div class="switch">
				<label>
				  Não
				  <input type="checkbox" name="licitacao_eletronica" id="licitacao_eletronica" value="1"  {{ isset($registro->licitacao_eletronica) && $registro->licitacao_eletronica == '1' ? 'checked' : '' }} >
				  <span class="lever"></span>
				  Sim
				</label>
			</div>
			
		<BR><BR>






	</div>

	<div class="col s7 m7">

	</div>

</div>

