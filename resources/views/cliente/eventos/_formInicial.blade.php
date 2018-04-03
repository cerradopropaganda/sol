					<ul class="stepper parallel" >


                        	
                        	<!-- ETAPA INICIAL -->
	                        
	                         <li class="step @if(Auth::user()->nivel>3) disable_step @endif ">
	                         	<div data-step-label=""   class="step-title waves-effect waves-dark">Formulário inicial: Órgão solicitante, Objeto, Justificativas e Fiscal de contrato</div>
	                         	     <div class="step-content" >
								       <div class="row">

								          <input type="text" name="" style="height: 0px; border:0;">

								            <div class="input-field">
											    <select  name="id_orgao">
											      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
											      @foreach($orgaos as $orgao)                    
									                   <option value="{{ $orgao->id }}" @if (isset($registro->id_orgao)) @if ($registro->id_orgao == $orgao->id) selected  @endif @endif > {{ $orgao->nome }} </option> 
									              @endforeach
											    </select>
											    <label>ORGÃO SOLICITANTE</label>
											  </div>

											<br>

											<div class="input-field">
												<textarea class="materialize-textarea" name="objeto">{{isset($registro->objeto) ? $registro->objeto : ''}}</textarea>
												<label>OBJETO</label>
											</div>

											<div class="input-field">
												<textarea class="materialize-textarea" name="justificativa">{{isset($registro->justificativa) ? $registro->justificativa : ''}}</textarea>
												<label>JUSTIFICATIVA</label>
											</div>


											<div class="input-field">
												<input type="text" name="processo" value="{{isset($registro->processo) ? $registro->processo : ''}}">
												<label>NÚMERO DO PROCESSO</label>
											</div>
											
											<br>

											 <div class="input-field">
											    <select  name="id_fiscal">
											      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
											      @foreach($fiscais as $fiscal)                    
									                   <option value="{{ $fiscal->id }}" @if (isset($registro->id_fiscal)) @if ($registro->id_fiscal == $fiscal->id) selected  @endif @endif > {{ $fiscal->nome }} </option> 
									              @endforeach
											    </select>
											    <label>FISCAL DE CONTRATO</label>
											  </div>
											
								       </div>
								       <div class="step-actions">

								           <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">Salvar e escolher itens</button>   
								       </div>
								    </div>
							    
							 </li>



	                         <!-- ETAPA 2 -->
	                         <li class="step @if(Auth::user()->nivel>3) disable_step @endif ">
	                            <div data-step-label="" class="step-title waves-effect waves-dark">Itens e orçamentos</div>
	                            <div class="step-content">
	                               <div class="row">


	                               	<div class="card ">
							            <!--<div class="card-content teal lighten-2" style="padding: 10px 25px;">
							                <h5 class="card-title  white-text">ADICIONAR ITENS</h5>									               
							            </div>-->
							            <div class="card-content grey lighten-3" style="padding: 10px 25px;">

							                      <div class="input-field">
							                        <input type="text" id="search_itens" name="search_itens" />
							                        <label>Digite para procurar um item</label>
							                      </div>
							               
							            </div>
							            <!--<div class="card-content white" id="item-list'">


										            <span class="grey-text">
										              <p style="text-align: center;"><br>NENHUM ITEM ADICIONADO! PESQUISE UM ITEM E CLIQUE PARA ADICIONAR <br><br> </p>
										            </span>



							            </div>-->
							        </div>


							        <table id="table_evento_itens" class="responsive-table highlight  teal  lighten-5">
						                <thead>
						                  <tr>
						                    <th width="5%">ITEM</th>
						                    <th width="30%">DESCRIÇÃO</th>
						                    <th width="10%">UNID.</th>
						                    <th width="10%">QUANT.</th>
						                    <th width="10%">VAL. UNIT.</th>
						                    <th width="10%">VAL. TOTAL</th>
						                    <th width="25%">COTAÇÕES</th>
						                  </tr>
						                </thead>
						                <tbody  id="itens-list" name="itens-list">

						                	@if($Count>0)
									          @foreach($eventos_itens as $evento_item)                    
								                  	<tr class="item_{{ $evento_item->idItem }}">
								                   		<td><b>{{ $evento_item->codigo }}</b><br><center><a id="{{ $evento_item->idItem }}" class="excluir_item tooltipped" data-position="bottom" data-delay="0" data-tooltip="Excluir item do evento" href="{{ route('cliente.eventos.item.deletar',$evento_item->idItem) }}" onclick="return false;"><i class="material-icons red-text">delete_forever</i></a></center></td>
								                   		<td>{{ $evento_item->descricao }}</td>
								                   		<td>{{ $evento_item->unidade }}</td>
								                   		<td>
								                   			<div class="input-field">
										                        <input type="text" name="pregao" value="{{isset($evento_item->qtde ) ? $evento_item->qtde  : ''}}">
										                        <label>Quantidade</label>
										                    </div>
				                    					</td>
								                   		<td></td>
								                   		<td></td>
								                   		<td></td>
								                   	</tr>
								              @endforeach
								            @else
											        <tr class="no_item" style="background: #f2f2f2">
											        	<td colspan="7">
											             	<span class="black-text">
														        <p style="text-align: center;"><br>NENHUM ITEM ADICIONADO! PESQUISE UM ITEM E CLIQUE PARA ADICIONAR <br><br> </p>
														    </span>
														</td>
													</tr>
											@endif
							            </tbody>
						            </table>








									 <!-- <table class="responsive-table highlight  teal  lighten-5">
						                <tbody>
						                  <tr>
						                    <td>1</td>
						                    <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado,                                transparente e orifício lateral</td>
						                    <td>CX. C/ 50</td>
						                    <td>
						                      
						                      <div class="input-field">
						                        <input type="text" name="pregao" value="{{isset($registro->pregao) ? $registro->pregao : ''}}">
						                        <label>Quantidade</label>
						                      </div>

						                    </td>
						                    <td>0,53</td>
						                    <td>R$ 53,00</td>
						                    <td>
						                      

						                      <p>
						                        <input name="tipo" type="checkbox" id="licitacao_presencial" />
						                        <label for="licitacao_presencial">Empresa 1 - 0,86</label>
						                      </p>
						                      <p>
						                        <input name="tipo" type="checkbox" id="licitacao_eletronica" />
						                        <label for="licitacao_eletronica">Empresa 2 - 0,72</label>
						                      </p>
						                      <p>
						                        <input name="checkbox" type="checkbox" id="dispensa_licitacao"  />
						                        <label for="dispensa_licitacao">Empresa 3- 0,67</label>
						                      </p>
						                      <p class="right-align grey-text" style="display: block; border-top: 1px solid #999;">Média - 0,xx</p>

						                    </td>
						                  </tr>

						                  <tr>
						                    <td>2</td>
						                    <td>papel A4, 75g / m2, não reciclado, cor branca, resma com 500  folhas</td>
						                    <td>CX. C/ 10 UN.</td>
						                    <td>
						                      
						                      <div class="input-field">
						                        <input type="text" name="pregao" value="{{isset($registro->pregao) ? $registro->pregao : ''}}">
						                        <label>Quantidade</label>
						                      </div>

						                    </td>
						                    <td>16,80</td>
						                    <td>R$ 336,00</td>
						                    <td>
						                      

						                      <p>
						                        <input name="tipo" type="checkbox" id="licitacao_presencial" />
						                        <label for="licitacao_presencial">Empresa 1 - 0,86</label>
						                      </p>
						                      <p>
						                        <input name="tipo" type="checkbox" id="licitacao_eletronica" />
						                        <label for="licitacao_eletronica">Empresa 2 - 0,72</label>
						                      </p>
						                      <p>
						                        <input name="checkbox" type="checkbox" id="dispensa_licitacao"  />
						                        <label for="dispensa_licitacao">Empresa 3- 0,67</label>
						                      </p>
						                      <p class="right-align grey-text" style="display: block; border-top: 1px solid #999;">Média - 0,xx</p>

						                    </td>
						                  </tr>

						                  <tr>
						                    <td>1</td>
						                    <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado,                                transparente e orifício lateral</td>
						                    <td>CX. C/ 50</td>
						                    <td>
						                      
						                      <div class="input-field">
						                        <input type="text" name="pregao" value="{{isset($registro->pregao) ? $registro->pregao : ''}}">
						                        <label>Quantidade</label>
						                      </div>

						                    </td>
						                    <td>0,53</td>
						                    <td>R$ 53,00</td>
						                    <td>
						                      

						                      <p>
						                        <input name="tipo" type="checkbox" id="licitacao_presencial" />
						                        <label for="licitacao_presencial">Empresa 1 - 0,86</label>
						                      </p>
						                      <p>
						                        <input name="tipo" type="checkbox" id="licitacao_eletronica" />
						                        <label for="licitacao_eletronica">Empresa 2 - 0,72</label>
						                      </p>
						                      <p>
						                        <input name="checkbox" type="checkbox" id="dispensa_licitacao"  />
						                        <label for="dispensa_licitacao">Empresa 3- 0,67</label>
						                      </p>
						                      <p class="right-align grey-text" style="display: block; border-top: 1px solid #999;">Média - 0,xx</p>

						                    </td>
						                  </tr>
						                </tbody>
						                <thead>
						                  <tr>
						                    <th width="5%"></th>
						                    <th width="30%"></th>
						                    <th width="10%"></th>
						                    <th width="10%"></th>
						                    <th width="10%"></th>
						                    <th width="10%"></th>
						                    <th width="25%">Total: R$ 389,00</th>
						                  </tr>
						                </thead>

						                </table>-->
	                                
	                                <!--
				                    <div class="col s12">
				                      Adicionar Itens:&nbsp;&nbsp;&nbsp;
				                      <div class="input-field inline">
				                        <input id="email" type="email" class="validate">
				                        <label for="email" data-error="wrong" data-success="right">Buscar Itens</label>
				                      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				                      <a href="{{route('admin.termos-referencia.adicionar')}}" class="btn waves-effect waves-light teal lighten-2" >Incluir</a>
				                    </div>



	                                  <br>
	                                  









	                               </div>
	                               <div class="step-actions">
	                               	  <button class="waves-effect waves-dark btn teal lighten-2 next-step">Salvar e escolher TR</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 

	                               </div>-->
	                           		</div>
	                            </div>
	                         </li>

	                         <!-- ETAPA 3 -->
	                         <li class="step @if(Auth::user()->nivel>3) disable_step @endif ">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Escolher termo de referencia</div>
	                            <div class="step-content">
	                               <div class="row">




	                                 <!-- <div class="input-field col s12">
	                                     <input id name="password" type="password" class="validate" required>
	                                     <label for="password">Your password</label>
	                                  </div>-->
	                                  	<br>

	                                	<table  id="table_evento_itens_tr" class="responsive-table centered teal  lighten-5">
						                <thead>
						                  <tr>
						                    <th width="10%">ITEM</th>
						                    <th width="40%">DESCRIÇÃO</th>
						                    <th width="60%">TRs DISPONÍVEIS</th>
						                  </tr>
						                </thead>
						                <tbody  id="itens-list-tr" name="itens-list-tr">
						                	@if($Count>0)
									          @foreach($eventos_itens as $evento_item)                    
								                  	<tr class="item_{{ $evento_item->idItem }}">
								                   		<td><b>{{ $evento_item->codigo }}</b></td>
								                   		<td>{{ $evento_item->descricao }}</td>
								                   		<td class="trs">



								                   			
								                   			@if ($evento_item->trs != "")
															  @foreach(explode(',', $evento_item->trs) as $tr) 
															    @if($lista_trs->where( 'codigo' , '=' , $tr ))
															    	@foreach($lista_trs as $item_tr) 
															    	 @if($item_tr->codigo == $tr)

															    	 	{{ $item_tr->nome }},
													                  	
													                 @endif
													                @endforeach
														        @endif
															  @endforeach
															@endif





															<textarea style="display:none;" class="array_trs" id="trs_{{ $evento_item->idItem }}">[
																@if ($evento_item->trs != "") 	@foreach(explode(',', $evento_item->trs) as $tr) @if($lista_trs->where( 'codigo' , '=' , $tr )) @foreach($lista_trs as $item_tr) @if($item_tr->codigo == $tr)
																@if ($loop->first)
															        
															    @else
																,
															    @endif

																{"codigo":"{{$item_tr->codigo}}","nome":"{{$item_tr->nome}}"}

															@endif @endforeach @endif @endforeach @endif]</textarea>
								                   		</td>
								                   	</tr>
								              @endforeach
								            @else
											        <tr class="no_item" style="background: #f2f2f2">
											        	<td colspan="3">
											             	<span class="black-text">
														        <p style="text-align: center;"><br>VOLTE À ETAPA ANTERIOR E ADICIONE UM ITEM PARA LISTAR OS TR'S DISPONÍVEIS <br><br> </p>
														    </span>
														</td>
													</tr>
											@endif
						                  <!--<tr>
						                    <td>3453</td>
						                    <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado,transparente e orifício lateral</td>
						                    <td>TR MATERIAL DE CONSUMO, TR MATERIAL DE EXPEDIENTE</td>
						                  </tr>

						                  <tr>
						                    <td>7545</td>
						                    <td>papel A4, 75g / m2, não reciclado, cor branca, resma com 500  folhas</td>
						                    <td>TR MATERIAL DE CONSUMO, TR MATERIAL DE EXPEDIENTE</td>
						                  </tr>

						                  <tr>
						                    <td>2347</td>
						                    <td>caneta esferográfica, material plástico reciclado, quantidade cargas 1, material ponta latão com esfera de tungstênio, tipo escrita média, cor tinta azul, características adicionais corpo sextavado,                                transparente e orifício lateral</td>
						                    <td>TR MATERIAL DE CONSUMO, TR MATERIAL DE EXPEDIENTE</td>
						                  </tr>-->
						                </tbody>
						                </table>



						            <br><br>
					                <labe><H6><b>TRs DISPONÍVEIS</b></H6></label><br>


					                  <div id="lista_trs_disponiveis">
					                  	
					                  	


					                  		@if($Count>0)
					                  			
												  @foreach($intersect as $tr) 

													    @if($lista_trs->where( 'codigo' , '=' , $tr ))

													    	@foreach($lista_trs as $item_tr) 
														    	 @if($item_tr->codigo == $tr)												                  	

														    	 <p id="input_{{ $item_tr->codigo }}" style="margin-bottom: 1em"><input name="id_tr" type="radio" id="{{ $item_tr->codigo }}" value="{{ $item_tr->codigo }}" {{ $registro->id_tr == $item_tr->codigo ? 'checked' : '' }}   class="validate radio_TR" required  /><label for="{{ $item_tr->codigo }}">{{ $item_tr->nome }}</label></p>	

												                 @endif

											                @endforeach
												        @endif
												  @endforeach
												  
											@else
												ADICIONE ITENS NA ETAPA ANTERIOR PARA LISTAR OS TRs DISPONÍVEIS
											@endif
											

					                  </div>

		                              <!--<p style="margin-bottom: 1em">
		                                <input name="id_tr" type="radio" id="789" value="789"  class="validate" required  />
		                                <label for="789">TR MATERIAL DE EXPEDIENTE</label>
		                              </p>

		                              <p style="margin-bottom: 1em">
		                                <input name="id_tr" type="radio" id="456" value="456"  class="validate" required  />
		                                <label for="456">TR MATERIAL DE CONSUMO</label>
		                              </p>

		                              <p style="margin-bottom: 1em">
		                                <input name="id_tr" type="radio" id="123" value="123"  class="validate" required />
		                                <label for="123">TR COMBUSTÍVEIS</label>
		                              </p>
		                          		-->
		                              
		                            <BR>



	                               </div>
	                               
	                               <div class="step-actions step3" {{ $registro->id_tr <> '' ? '' : 'style="display: none;"' }}  >
	                               	  <input type="hidden" id="id_tr_atual" value="{{$registro->id_tr}}">
	                                  <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E PERSONALIZAR TERMO DE REFERÊNCIA</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                           		
	                            </div>
	                         </li>

	                         <!-- ETAPA 4 -->
	                         <li class="step @if(Auth::user()->nivel>3) disable_step @endif ">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Personalizar termo de referencia</div>
	                            <div class="step-content">
	                               <div class="row">

	                                  <span style="clear: both;">
									  <br>
									  <label><H6>TERMO DE REFERÊNCIA</H6></label>
  									  <textarea class="" style="height: 600px;" name="termo_referencia">{{isset($registro->termo_referencia) ? $registro->termo_referencia : ''}}</textarea>




	                               </div>
	                               <div class="step-actions">
	                                  <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E IR PARA DOTAÇÃO ORÇAMENTÁRIA</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                            </div>
	                         </li>
	                         

	                         
	                         <!-- ETAPA 5 -->
	                         <li class="step @if(Auth::user()->nivel==4) disable_step @endif ">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Formulário Dotação orçamentária </div>
	                            <div class="step-content">
	                               <div class="row">


	                                  <div class="input-field">
											<textarea class="materialize-textarea" name="dotacao_orcamentaria">{{isset($registro->dotacao_orcamentaria) ? $registro->dotacao_orcamentaria : ''}}</textarea>
											<label>DOTAÇÃO ORÇAMENTÁRIA</label>
									  </div>



	                               </div>
	                               <div class="step-actions">
	                                  <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E DEFINIR MODALIDADE E ITENS EXCLUSIVOS</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                            </div>
	                         </li>
	                        

							
	                         <!-- ETAPA 6 -->
	                         <li class="step  @if(Auth::user()->nivel<>4 && Auth::user()->nivel<>1) disable_step @endif">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Formulário CPL: Definição de modalidade e itens exclusivos</div>
	                            <div class="step-content">
	                               <div class="row">
	                               	 	<input type="text" name="" style="height: 0px; border:0;">

	                                  <div class="input-field">
											<select id="id_modalidade" name="id_modalidade">
											  @foreach($modalidades as $modalidade)                    
							                   <option value="{{ $modalidade->id }}" @if (isset($registro->id_modalidade)) @if ($registro->id_modalidade == $modalidade->id) selected  @endif @endif > {{ $modalidade->nome }} </option> 
							              		@endforeach
											</select>
											<label>MODALIDADE</label>
										</div>

										<BR>

										<div class="input-field" id="embasamento_legal" style="display: none;">
											<textarea class="materialize-textarea" name="embasamento_legal">{{isset($registro->embasamento_legal) ? $registro->embasamento_legal : ''}}</textarea>
											<label>EMBASAMENTO LEGAL DA DISPENSA</label>
										</div>

										<div class="input-field">
											<textarea class="materialize-textarea" name="tipo_julgamento">{{isset($registro->tipo_julgamento) ? $registro->tipo_julgamento : ''}}</textarea>
											<label>TIPO DE JULGAMENTO</label>
										</div>

										<label><H6>DESTINADA AO SRP?</H6></label>

											<div class="switch">
												<label>
												  Não
												  <input type="checkbox" name="destinada_srp" id="destinada_srp" value="1"  {{ isset($registro->destinada_srp) && $registro->destinada_srp == '1' ? 'checked' : '' }} >
												  <span class="lever"></span>
												  Sim
												</label>
											</div>
											
										<BR><BR>

										<div class="input-field">
											<input type="text" class="datepicker" name="prazo_vigencia_ata" value="{{isset($registro->prazo_vigencia_ata) ? $registro->prazo_vigencia_ata : ''}}">
											<label>PRAZO DE VIGÊNCIA DA ATA</label>
										</div>

										<br>
										
										<label><H6>Licitação exclusiva para ME e EPP?</H6></label>

											<div class="switch">
												<label>
												  Não
												  <input type="checkbox" name="exclusiva_me_epp" id="exclusiva_me_epp" value="1"  {{ isset($registro->exclusiva_me_epp) && $registro->exclusiva_me_epp == '1' ? 'checked' : '' }} >
												  <span class="lever"></span>
												  Sim
												</label>
											</div>
											
										<BR><BR>

										<label><H6>Licitação com itens destinados à participação exclusiva para ME e EPP?</H6></label>

											<div class="switch">
												<label>
												  Não
												  <input type="checkbox" name="itens_exclusivos_me_epp" id="itens_exclusivos_me_epp" value="1"  {{ isset($registro->itens_exclusivos_me_epp) && $registro->itens_exclusivos_me_epp == '1' ? 'checked' : '' }} >
												  <span class="lever"></span>
												  Sim
												</label>
											</div>
											
										<BR><BR>




	                               </div>
	                               <div class="step-actions">
	                                  <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E REVISAR TR</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                            </div>
	                         </li>
	                         

	                         
	                         <!-- ETAPA 7 -->
	                         <li class="step @if(Auth::user()->nivel>4) disable_step @endif">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Revisar Itens e Orçamentos</div>
	                            <div class="step-content">
	                               <div class="row">
	                                  <span style="clear: both;">
									  <br>
									  <label><H6>REVISAR TERMO DE REFERÊNCIA</H6></label>
  									  <textarea id="termo_referencia_revisao" class="" style="height: 600px;" readonly>{{isset($termo_referencia_revisado) ? $termo_referencia_revisado : ''}}</textarea>




	                               </div>
	                               <div class="step-actions">
	                                  <button class="waves-effect waves-dark btn teal lighten-2 next-step">FAZER DOWNLOAD DOS DOCUMENTOS DA FASE INICIAL</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                            </div>
	                         </li>
	                         

	                         
	                         <!-- ETAPA FINAL -->
	                         <li class="step  @if(Auth::user()->nivel>3) disable_step @endif">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Documentos da fase inicial</div>
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
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>OFÍCIO</td>
					                  </tr>
					                  <tr>
					                   <td>&nbsp&nbsp&nbsp&nbsp<a class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>TERMO DE REFERÊNCIA</td>
					                  </tr>

					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>ORÇAMENTOS</td>
					                  </tr>

					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>DECLARAÇÃO DE SALDO ORÇAMENTÁRIO</td>
					                  </tr>

					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>DECLARAÇÃO DE COMPATIBILIDADE COM PPA, LDO E LOA</td>
					                  </tr>

					                  <tr>
					                   <td>&nbsp&nbsp&nbsp&nbsp<a class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>DESPACHO DA CPL</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>AUTORIZAÇÃO PARA LICITAR</td>
					                  </tr>
					                  
					                  
					                  
					                  
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
	  	  //$('.time').mask('00:00:00');
	  	  //$('.date_time').mask('00/00/0000 00:00:00');
	  	  //$('.cep').mask('00000-000');
	  	  //$('.phone').mask('0000-0000');
	  	  //$('.phone_with_ddd').mask('(00) 0000-0000');
	  	  //$('.phone_us').mask('(000) 000-0000');
	  	  //$('.mixed').mask('AAA 000-S0S');
		  //$('.money').mask('000.000.000.000.000,00', {reverse: true});


  	});

  	$('.modal').modal({
	      //dismissible: true, // Modal can be dismissed by clicking outside of the modal
	      //opacity: .5, // Opacity of modal background
	      //inDuration: 300, // Transition in duration
	      //outDuration: 200, // Transition out duration
	      //startingTop: '4%', // Starting top style attribute
	      //endingTop: '10%', // Ending top style attribute
	      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
	        console.log("Ready");
	        //console.log(modal, trigger);
	      },
	      complete: function() { console.log('Closed'); } // Callback for Modal close
	    }
	);

  	/*$('#add_itens').on('click',function(e){
  	 	console.log('add itens');
  	 	$('#modal_itens').modal('open');
  	 	return false;

  	});*/

  	$(document).on('click','.excluir_item',function(e){ 
  		console.log('excluir item');	 	
  	 	var url_remove = $(this).attr('href');
  	 	var item_id = $(this).attr('id');
		mbox.confirm('Deseja realmente excluir o item desse Evento?', function(yes) {
		    if (yes) {
		        $.ajax({
		            type: "get",
		            url: url_remove,
		            processData: false,
		            contentType: false,
		            cache: false,
		            success: function () {

		               // remove linha nas tabelas de itens e trs
		               $(".item_" + item_id).remove();
		               
		               // limpa e apaga item da tabela de itens
		               var rowCount = $('#table_evento_itens>tbody>tr').length;
		               if( rowCount === 0 ) $('#table_evento_itens tbody').append('<tr class="no_item" style="background: #f2f2f2"><td colspan="7"><span class="black-text"><p style="text-align: center;"><br>NENHUM ITEM ADICIONADO! PESQUISE UM ITEM E CLIQUE PARA ADICIONAR <br><br> </p></span></td></tr>');

		               // limpa e apaga item da tabela de trs
		               var rowCount = $('#table_evento_itens_tr>tbody>tr').length;
		               if( rowCount === 0 ) {
		               		$('#table_evento_itens_tr tbody').append('<tr class="no_item" style="background: #f2f2f2"><td colspan="7"><span class="black-text"><p style="text-align: center;"><br>NENHUM ITEM ADICIONADO! PESQUISE UM ITEM E CLIQUE PARA ADICIONAR <br><br> </p></span></td></tr>');
		               		$('#lista_trs_disponiveis').html('ADICIONE ITENS NA ETAPA ANTERIOR PARA LISTAR OS TRs DISPONÍVEIS');
		               	}

		               









		               // cria array apenas com o código
						var listaArray= new Array();
						// cria array para colocar os outros arrays
						var listaArrayofArray= new Array();

						// percorre lista de trs nos campos textarea da tabela
						$('.array_trs').each(function ()
			            {
			                var jsonStr=$(this ).val();	
			                jsonStr = jsonStr.replace(/(\r\n\t|\n|\r\t)/gm,"");
			                jsonStr = jsonStr.replace(" ","");
			                //jsonStr.replace(/\s/g,'');
			                //console.log(jsonStr.replace(/\s/g,''));	

			                //var jsonStr = JSON.parse( jsonStr );
			                console.log(jsonStr);

							var obj = JSON.parse(jsonStr);	
							$.each(obj, function() {	
								// add código na lista de array
								listaArray.push(this.codigo);
				            })
				            // add array completo na lista com todos arrays
							listaArrayofArray.push(obj);
			            })	

						// concatena o array contendo apenas os códigos
			            var listaArrayConcat = [].concat.apply([], listaArray	); 	
			            var uniqueTr = [];	

			            // excluí os repetidos e cria um array com apenas os códigos únicos
						$.each(listaArrayConcat, function(i, el){
						    if($.inArray(el, uniqueTr) === -1) uniqueTr.push(el);
						});


			            var Tr_Error=false;
						var arrayLength = listaArrayofArray.length;		
						var listaArrayRemover= new Array();

						// percorre o array com itens únicos
						for (i = 0; i < uniqueTr.length; i++) { 
						    
						    var countValidTR_Geral=0;
						    //console.log('loop do item unico: '+ uniqueTr[i]);

						    for (var y = 0; y < arrayLength; y++) {
							    //console.log(listaArrayofArray[y]);
							    var countValidTR=0;
							     $.each(listaArrayofArray[y], function() {
							    	if(uniqueTr[i]==this.codigo){
							    		//console.log("encontrei"+this.codigo+' - '+this.nome);
							    		countValidTR++;
				    				}else{
				    					//console.log("não encontrado"+this.codigo+' - '+this.nome);					   
				    				}
							    });
							     //console.log('Total item:'+countValidTR);
							     if(countValidTR==0){
							     	console.log('remover item do array('+y+'): '+listaArrayofArray[y]);
							     	countValidTR_Geral++;
							     }
							}								
							// cria um array com os itens que não são em comum, para remover posteriormente
							if(countValidTR_Geral>0){
								//console.log('Total Geral: '+countValidTR_Geral+' - Remover item unico: '+uniqueTr[i]);

								listaArrayRemover.push(uniqueTr[i]);
							}
				    	}

				    	//console.log(uniqueTr);
				    	//console.log(listaArrayRemover);

				    	// percorre o array com a lista para remover, e exclui do array com itens únicos
				    	for (i = 0; i < listaArrayRemover.length; i++) { 
				    		var index = uniqueTr.indexOf(listaArrayRemover[i]);
							if (index > -1) {
							    uniqueTr.splice(index, 1);
							}
				    	}

				    	console.log(uniqueTr);

				    	// apaga os TRs anteriores pois o cálculo foi refeito
						$('#lista_trs_disponiveis').html('');




						var codigo;
						var nome;
						$.each(uniqueTr, function(i, el){

							console.log('add: '+el);

						 	for (var y = 0; y < arrayLength; y++) {
							     $.each(listaArrayofArray[y], function() {

							    	if(this.codigo==el){
							    		codigo = this.codigo;
							    		nome = this.nome;//console.log("encontrei"+this.codigo+' - '+this.nome);
							    		
				    				}
							    });
							}
							var item_tr='<p id="input_'+codigo+'" style="margin-bottom: 1em"><input name="id_tr" type="radio" id="'+codigo+'" value="'+codigo+'"  class="validate radio_TR" required  /><label for="'+codigo+'">'+nome+'</label></p>';		
							$('#lista_trs_disponiveis').append(item_tr);	 
						});





		            },
		            error: function (data) {
		                console.log('Error:', data);
		            }
		        });		        
		    }
		})
  	 	return false;
  	});
  	


  	$('#search_itens').autocomplete({
		    serviceUrl: '{{route("cliente.eventos.itens.search")}}',
    		minChars: 4,
    		preserveInput: true,
    		noCache: true,
    		params:{id_evento:$('#id_evento').val()},
		    onSelect: function (suggestion) {
		        //console.log($('#id_evento').val());
		        //console.log(suggestion.data);
		        //console.log('meta token:'+$('meta[name="_token"]').val());
		        $.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		            }
		        })
		        var formData = {
		            id_item: suggestion.data,
		            id_evento: $('#frm_evento input[name="id_evento"]').val(),
		            id_usuario: $('#frm_evento input[name="id_usuario"]').val(),
		            _token: $('#frm_evento input[name="_token"]').val()
		        }
		        //used to determine the http verb to use [add=POST], [update=PUT]
		        var state = 'add';
		        var type = "POST"; //for creating new resource
		        var my_url = '{{route("cliente.eventos.item.salvar")}}';
		        //if (state == "update"){
		        //    type = "PUT"; //for updating existing resource
		        //    my_url += '/' + task_id;
		        //}
		        $.ajax({
		            type: type,
		            url: my_url,
		            data: formData,
		            dataType: 'json',
		            success: function (data) {

		            	// remove linha com msg de itens vazio caso tenha itens
		                if( $('#table_evento_itens .no_item').length > 0 ) $( "#table_evento_itens .no_item" ).remove();
		                if( $('#table_evento_itens_tr .no_item').length > 0 ) $( "#table_evento_itens_tr .no_item" ).remove();

		                // adiciona itens na tabela de itens
		                var item = '<tr class="item_' + data.idItem + '">';
						 item += '	    <td><b>' + data.codigo + '</b><br><center><a  id="' + data.idItem + '" class="excluir_item tooltipped" data-position="bottom" data-delay="0" data-tooltip="Excluir item do evento" href={{url("cliente/eventos/itens/deletar")}}/' + data.idItem + '  onclick="return false;"><i class="material-icons red-text">delete_forever</i></a></center></td>';
						 item += '	    <td>' + data.descricao + '</td>';
						 item += '	    <td>' + data.unidade + '</td>';
						 item += '	    <td>';
						 item += '	    	<div class="input-field">';
						 item += '		          <input type="text" name="pregao" value="' + data.qtde + '">';
						 item += '		          <label>Quantidade</label>';
						 item += '		    </div>';
			             item += '      </td>';
						 item += '	    <td></td>';
						 item += '	    <td></td>';
						 item += '	    <td></td>';
						 item += '</tr>';		                 
		                $('#itens-list').prepend(item);

		                // adiciona itens na tabela de trs
		                var item = '<tr class="item_' + data.idItem + '">';
						 item += '	    <td><b>' + data.codigo + '</b></td>';
						 item += '	    <td>' + data.descricao + '</td>';
						 item += '	    <td class="trs"></td>';
						 item += '</tr>';		                 
		                $('#itens-list-tr').prepend(item);

		                
		                // faz pesquisa de quais TRs pertencem a esse ITEM
				        $.ajaxSetup({
				            headers: {
				                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				            }
				        })
				        var formData2 = {
				            id_item: data.id,
				            _token: $('#frm_evento input[name="_token"]').val()
				        }
		                $.ajax({
				            type: 'POST',
				            url: '{{route("cliente.eventos.itens.trs")}}',
				            data: formData2,
				            dataType: 'json',
				            success: function (data2) {
				            	//console.log($('tr.item_' + data.idItem + ' td.trs').html());

				            	//var json_obj = JSON.parse(data2);
				            	//console.log(data2);

				            	// converte lista de TRs em array
								var arrayJson_trs = JSON.stringify(data2);

								// adiciona um textarea com o array de trs
								$('#itens-list-tr tr.item_' + data.idItem + ' td.trs').append('<textarea style="display:none;" class="array_trs" id="trs_' + data.idItem + '">'+arrayJson_trs+'</textarea>');

								
								// insere tr na tabela de itens
				            	$.each(data2, function() {
								     $('#itens-list-tr tr.item_' + data.idItem + ' td.trs').append(this.nome+', ');
								});

				            	// cria array apenas com o código
								var listaArray= new Array();
								// cria array para colocar os outros arrays
								var listaArrayofArray= new Array();

								// percorre lista de trs nos campos textarea da tabela
								$('.array_trs').each(function ()
					            {
					                var jsonStr=$(this ).val();				
									var obj = JSON.parse(jsonStr);	
									$.each(obj, function() {	
										// add código na lista de array
										listaArray.push(this.codigo);
						            })
						            // add array completo na lista com todos arrays
									listaArrayofArray.push(obj);
					            })	

								// concatena o array contendo apenas os códigos
					            var listaArrayConcat = [].concat.apply([], listaArray	); 	
					            var uniqueTr = [];

					            // excluí os repetidos e cria um array com apenas os códigos únicos
								$.each(listaArrayConcat, function(i, el){
								    if($.inArray(el, uniqueTr) === -1) uniqueTr.push(el);
								});


					            var Tr_Error=false;
								var arrayLength = listaArrayofArray.length;		
								var listaArrayRemover= new Array();

								// percorre o array com itens únicos
								for (i = 0; i < uniqueTr.length; i++) { 
								    
								    var countValidTR_Geral=0;
								    //console.log('loop do item unico: '+ uniqueTr[i]);

								    for (var y = 0; y < arrayLength; y++) {
									    //console.log(listaArrayofArray[y]);
									    var countValidTR=0;
									     $.each(listaArrayofArray[y], function() {
									    	if(uniqueTr[i]==this.codigo){
									    		//console.log("encontrei"+this.codigo+' - '+this.nome);
									    		countValidTR++;
						    				}else{
						    					//console.log("não encontrado"+this.codigo+' - '+this.nome);					   
						    				}
									    });
									     //console.log('Total item:'+countValidTR);
									     if(countValidTR==0){
									     	console.log('remover item do array('+y+'): '+listaArrayofArray[y]);
									     	countValidTR_Geral++;
									     }
									}								
									// cria um array com os itens que não são em comum, para remover posteriormente
									if(countValidTR_Geral>0){
										//console.log('Total Geral: '+countValidTR_Geral+' - Remover item unico: '+uniqueTr[i]);

										listaArrayRemover.push(uniqueTr[i]);
									}
						    	}

						    	//console.log(uniqueTr);
						    	console.log(listaArrayRemover);

						    	// percorre o array com a lista para remover, e exclui do array com itens únicos
						    	for (i = 0; i < listaArrayRemover.length; i++) { 
						    		var index = uniqueTr.indexOf(listaArrayRemover[i]);
									if (index > -1) {
									    uniqueTr.splice(index, 1);
									}
						    	}

						    	//console.log(uniqueTr);

						    	// apaga os TRs anteriores pois o cálculo foi refeito
								$('#lista_trs_disponiveis').html('');

						    	// percorre o array geral, verifica se está no array de itens únicos e adiciona o campo rádio button para escolha de um TR apenas
						    	$.each(data2, function() {	
						    		if( $.inArray(this.codigo, uniqueTr) !== -1 ){		           		
									     // add campos radio box dos trs disponiveis (tem que ver como filtrar os em comum )
									     var item_tr='<p id="input_'+this.codigo+'" style="margin-bottom: 1em"><input name="id_tr" type="radio" id="'+this.codigo+'" value="'+this.codigo+'"  class="validate radio_TR" required  /><label for="'+this.codigo+'">'+this.nome+'</label></p>';		
									     $('#lista_trs_disponiveis').append(item_tr);	  
								 	}	

								});

								// verifica se existe algum TRs, caso não, mostra mensagem de erro
								if( $('#lista_trs_disponiveis .radio_TR').length == 0 ){
								 	 $( "#lista_trs_disponiveis").html('Volte à etapa anterior e exclua 1 ou mais itens do evento para que possa ter pelo menos 1 Termo de Referência em comum!');
								 	 $('.item_' + data.idItem).addClass('error');
								}
				               
				            },
				            error: function (data2) {
				                console.log('Error:', data);
				            }
				        });



		                //$('#frmTasks').trigger("reset");
		            },
		            error: function (data) {
		                console.log('Error:', data);
		            }
		        });
		    }
	})

function intersection2() {
  var result = [];
  var lists;

  if(arguments.length === 1) {
    lists = arguments[0];
  } else {
    lists = arguments;
  }

  for(var i = 0; i < lists.length; i++) {
    var currentList = lists[i];
    for(var y = 0; y < currentList.length; y++) {
        var currentValue = currentList[y];
      if(result.indexOf(currentValue) === -1) {
        var existsInAll = true;
        for(var x = 0; x < lists.length; x++) {
          if(lists[x].indexOf(currentValue) === -1) {
            existsInAll = false;
            break;
          }
        }
        if(existsInAll) {
          result.push(currentValue);
        }
      }
    }
  }
  return result;
}

function getCommonElements(arrays){//Assumes that we are dealing with an array of arrays of integers
  var currentValues = {};
  var commonValues = {};
  for (var i = arrays[0].length-1; i >=0; i--){//Iterating backwards for efficiency
    currentValues[arrays[0][i]] = 1; //Doesn't really matter what we set it to
  }
  for (var i = arrays.length-1; i>0; i--){
    var currentArray = arrays[i];
    for (var j = currentArray.length-1; j >=0; j--){
      if (currentArray[j] in currentValues){
        commonValues[currentArray[j]] = 1; //Once again, the `1` doesn't matter
      }
    }
    currentValues = commonValues;
    commonValues = {};
  }
  return Object.keys(currentValues).map(function(value){
    return parseInt(value);
  });
}


function intersection(arrayOfArrays) {
  return arrayOfArrays.reduce(function(intersection, subArray) {
    subArray.forEach(function(number) {
      var isPresentInAll = true;
      for (var i = 0; i < arrayOfArrays.length; i++) {
        if (arrayOfArrays[i].indexOf(number) === -1) {
          isPresentInAll = false;
        }
      }
      if (isPresentInAll === true && intersection.indexOf(number) === -1) {
        intersection.push(number);
      }
    });
    return intersection;
  }, []);
}


	function merge(input) {
	    var numberGroup = {}
	    var neighbors = new Array(input.length); // direct intersections
	    var processed = new Array(input.length); // for the dfs
	    
	    for (var arrayIndex = 0; arrayIndex < input.length; arrayIndex++) {
	        var array = input[arrayIndex];
	        neighbors[arrayIndex] = {}; // we don´t use [] because we don´t want to keep repeated neighbors
	        processed[arrayIndex] = false;
	        
	        for (var i = 0; i < array.length; i++) {
	          var number = array[i];
	          
	          if (numberGroup.hasOwnProperty(number) == false) { // haven´t seen the number before
	            numberGroup[number] = arrayIndex; // we mark its first apparition
	          } else { // we connect the node with the one where this number appeared for the first time
	            var neighbor = numberGroup[number]; 
	            neighbors[arrayIndex][neighbor] = true;
	            neighbors[neighbor][arrayIndex] = true;
	          }
	        }
	    }
	    
	    //inline function, could be taken outside and pass input , processed and neighbors
	    function makeGroup (index, group) { // dfs
	      if (processed[index] == false) {
	          processed[index] = true;
	          
	          for (var i = 0; i < input[index].length; i++) {
	            group[input[index][i]] = true; // we only care about key, so we put value true but could be false
	          }
	          
	          for (var neighbor in neighbors[index]) makeGroup(neighbor, group)
	          return true; // this makes a new group
	      }
	      return false; // this does not make a new group
	    }
	    
	    var result = [];
	    
	    for (var i = 0; i < input.length; i++) {
	      var group = {};
	      if(makeGroup(i, group)) {
	        result.push(Object.keys(group).map(Number).sort((a, b) => a - b)); // pass the keys to an array and sort it
	      }
	    }
	    
	    return result;
	}


	
	/*
    * Este método salva as etapas do evento
    */
        
    $('.save-step').on('click',function(e){
      	console.log('salvar step');
        var id_tr_atual=$('#id_tr_atual').val();
        var id_tr_selecionado =$('input[name=id_tr]:checked').val();
        console.log(id_tr_atual+' - '+id_tr_selecionado);
        // verifica se mudou o TR
        if(id_tr_atual != id_tr_selecionado){
        	console.log('alterar tr');
        	if(confirm("Você selecionou um novo TR, ao clicar em salvar o TR antigo será substituido pelo novo TR escolhido. Deseja continuar?")){

        		// muda id selecionado
        		$('#id_tr_atual').val(id_tr_selecionado);

        		// pega novo TR
        		$.ajax({
	                  type:"GET",
	                  url:'{{ route("admin.termos-referencia.mostrar") }}/'+id_tr_selecionado,
	                  cache: false,
	                  processData: false,
	                  success: function(data){  
	                  	$('textarea[name=termo_referencia]').val(data[0].termo_referencia);

	                  	// salva etapas e muda tr se necessário
        				salvar_etapa({{$registro->id}});

	                  },
	                  error: function(data){   }
	            })	        		
        	}
        }else{
        	// salva etapas e muda tr se necessário
        	salvar_etapa({{$registro->id}});
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
	            Materialize.toast($toastContent, 10000);                    
	            
	            // monta TR para revisão
	            montar_tr_revisao(id);            	


	          },
	          error: function(data){   }
        })
    }


    /*
    * Esta função monta um TR para revisão, substituindo as variaveis
    */
    function montar_tr_revisao(id){
        $.ajax({
              type:"GET",
              url:'{{ route("cliente.eventos.montar_tr") }}/'+id,
              cache: false,
              processData: false,
              success: function(data){  
              	$('#termo_referencia_revisao').val(data);
              },
              error: function(data){   }
          })
    }


    /*
    * Este método mostra o botão de salvar etapa 3 ( Escolher TR )
    */
     $('input[type=radio][name=id_tr]').on('change', function() { 

     	$('.step3').show();
     });


    /*
    * Este método mostra embasamento legal dependendo do tipo de modalidade
    */
	$('#id_modalidade').on('change', function() {
	  if( this.value == '7'){
	  	$("#embasamento_legal").show();
	  }else{
	  	$("#embasamento_legal").hide();
	  }
	})


	 /*
    * Este método adiciona um novo item
    */
    //$("#btn-save").click(function (e) {
       
    //});


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



