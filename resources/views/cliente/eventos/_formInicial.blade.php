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

											 <br>

											 <div class="input-field">
											    <select  name="id_pregoeiro">
											      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
											      @foreach($pregoeiros as $pregoeiro)                    
									                   <option value="{{ $pregoeiro->id }}" @if (isset($registro->id_pregoeiro)) @if ($registro->id_pregoeiro == $pregoeiro->id) selected  @endif @endif > {{ $pregoeiro->nome }} </option> 
									              @endforeach
											    </select>
											    <label>PREGOEIRO</label>
											  </div>

											  <label><H6>SERÁ EXIGIDA GARANTIA CONTRATUAL ?</H6></label>

												<div class="switch">
													<label>
													  Não
													  <input type="checkbox" name="garantia_contratual" id="garantia_contratual" value="1"  {{ isset($registro->garantia_contratual) && $registro->garantia_contratual == '1' ? 'checked' : '' }} >
													  <span class="lever"></span>
													  Sim
													</label>
												</div>
												
											<BR><BR>

											
											<div id="box_porcentagem_garantia" style="display: {{ isset($registro->garantia_contratual) && $registro->garantia_contratual == '1' ? '' : 'none' }};" >
												<div class="input-field">												
													 <select  name="porcentagem_garantia">
												      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
												                       
										                 <option value="1" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==1) selected  @endif @endif > 1% </option> 
										                 <option value="2" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==2) selected  @endif @endif > 2% </option> 
										                 <option value="3" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==3) selected  @endif @endif > 3% </option> 
										                 <option value="4" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==4) selected  @endif @endif > 4% </option> 
										                 <option value="5" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==5) selected  @endif @endif > 5% </option> 
										             
												    </select>										
													<label>PORCENTAGEM ( % )</label>
												</div>
												<br>
											</div>

											<div class="input-field">												
													 <select  name="tipo_preco">
												      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
												                       
										                 <option value="0" @if (isset($registro->tipo_preco)) @if ($registro->tipo_preco ==0) selected  @endif @endif> Menor preço por item</option> 
										                 <option value="1" @if (isset($registro->tipo_preco)) @if ($registro->tipo_preco ==1) selected  @endif @endif> Menor preço por lote </option> 
										                 <option value="2" @if (isset($registro->tipo_preco)) @if ($registro->tipo_preco ==2) selected  @endif @endif> Menor preço global </option> 

										             
												    </select>										
													<label>TIPO DE JULGAMENTO DA LICITAÇÃO ( ESSE NOME MESMO ? JÁ TEM NA ETAPA 6 ESSA PERGUNTA )</label>
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


	                              <!--<div class="row">
							        <div class="col s12">
							          Criar novo lote: {{$registro->tipo_preco}}
							          <div class="input-field inline">
							            <input id="email_inline" type="email" class="validate">
							            <label for="email_inline">Nome do Lote</label>
							          </div>
							          <div class="input-field inline">
							            <button class="save-step waves-effect waves-dark btn teal lighten-2 next-step">CRIAR</button>
							          </div>
							        </div>
							       </div>-->



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


							        


							        <table id="table_evento_itens" class="responsive-table striped teal  lighten-5">
							        	
							        	<!--<tr class="teal  lighten-4">
							               	<th colspan="7">LOTE 2 -  nome do lote</th>
							            </tr>
							            <tr>
						                    <th width="5%">ITEM</th>
						                    <th width="50%">DESCRIÇÃO</th>
						                    <th width="7%">UNID.</th>
						                    <th width="8%">QUANT.</th>
						                    <th width="8%">VAL. UNIT.</th>
						                    <th width="8%">VAL. TOTAL</th>
						                    <th width="14%">COTAÇÕES</th>
						                  </tr>

							            <tr class="item_48">
								                   		<td><center><b>2</b><br><a id="48" class="excluir_item tooltipped" data-position="bottom" data-delay="0" data-tooltip="Excluir item do evento" href="http://127.0.0.1:8000/cliente/eventos/itens/deletar/48" onclick="return false;" data-tooltip-id="4cbef8b0-e7d1-dd83-c451-0a27c4ab7d0a"><i class="material-icons red-text">delete_forever</i></a></center></td>
								                   		<td>DIETA ENTERAL, aspecto físico LÍQUIDO, características normocalórica, normoproteica, normolipídica, fonte de proteína caseinato e ptn isolada soja, fonte de carboidrato maltodextrina, fonte de lipídios óleos vegetais e/ou de peixe e/ou tcm e/ou lecitina soja, componentes adicionais aa´s, vitaminas, minerais, fibras,  características adicionais isento glúten, lactose, sacarose, sabor com ou sem sabor, aplicação sistema fechado. Embalagem contendo a informação nutricional, a quantidade líquida do produto, número do lote, registro no MS e prazo de validade mínimo de 6 meses a contar da data da entrega</td>
								                   		<td>un.</td>
								                   		<td data-iditem="48">
								                   			<div class="input-field">
										                        <input type="number" name="qtde" value="1">
										                        <label class="active">Quantidade</label>
										                    </div>
				                    					</td>
								                   		<td class="valor_unitario">R$ 38,78</td>
								                   		<td class="valor_total">R$ 38,78</td>
								                   		<td class="lista_orcamentos" data-iditem="48">
								                   			  
								                   															              
								                   															              
								                   															              
								                   															              
								                   															              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="21" id="item_48_orcamento_21"><label for="item_48_orcamento_21"> R$ <span class="media_valor">24,30</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="19" id="item_48_orcamento_19" checked=""><label for="item_48_orcamento_19"> R$ <span class="media_valor">31,40</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="18" id="item_48_orcamento_18" checked=""><label for="item_48_orcamento_18"> R$ <span class="media_valor">33,94</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="17" id="item_48_orcamento_17" checked=""><label for="item_48_orcamento_17"> R$ <span class="media_valor">50,99</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="20" id="item_48_orcamento_20"><label for="item_48_orcamento_20"> R$ <span class="media_valor">100,00</span></label></p><br>
												            												            												            <p class="right-align grey-text" style="display: none; border-top: 1px solid #999;">Média - <span class="valor_total">R$ 38,78</span></p>
								                   		</td>
								                   	</tr>


								        <tr class="item_48">
								                   		<td><center><b>2</b><br><a id="48" class="excluir_item tooltipped" data-position="bottom" data-delay="0" data-tooltip="Excluir item do evento" href="http://127.0.0.1:8000/cliente/eventos/itens/deletar/48" onclick="return false;" data-tooltip-id="4cbef8b0-e7d1-dd83-c451-0a27c4ab7d0a"><i class="material-icons red-text">delete_forever</i></a></center></td>
								                   		<td>DIETA ENTERAL, aspecto físico LÍQUIDO, características normocalórica, normoproteica, normolipídica, fonte de proteína caseinato e ptn isolada soja, fonte de carboidrato maltodextrina, fonte de lipídios óleos vegetais e/ou de peixe e/ou tcm e/ou lecitina soja, componentes adicionais aa´s, vitaminas, minerais, fibras,  características adicionais isento glúten, lactose, sacarose, sabor com ou sem sabor, aplicação sistema fechado. Embalagem contendo a informação nutricional, a quantidade líquida do produto, número do lote, registro no MS e prazo de validade mínimo de 6 meses a contar da data da entrega</td>
								                   		<td>un.</td>
								                   		<td data-iditem="48">
								                   			<div class="input-field">
										                        <input type="number" name="qtde" value="1">
										                        <label class="active">Quantidade</label>
										                    </div>
				                    					</td>
								                   		<td class="valor_unitario">R$ 38,78</td>
								                   		<td class="valor_total">R$ 38,78</td>
								                   		<td class="lista_orcamentos" data-iditem="48">
								                   			  
								                   															              
								                   															              
								                   															              
								                   															              
								                   															              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="21" id="item_48_orcamento_21"><label for="item_48_orcamento_21"> R$ <span class="media_valor">24,30</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="19" id="item_48_orcamento_19" checked=""><label for="item_48_orcamento_19"> R$ <span class="media_valor">31,40</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="18" id="item_48_orcamento_18" checked=""><label for="item_48_orcamento_18"> R$ <span class="media_valor">33,94</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="17" id="item_48_orcamento_17" checked=""><label for="item_48_orcamento_17"> R$ <span class="media_valor">50,99</span></label></p><br>
												            												              
								                   			                  
												                    <p><input type="checkbox" name="orcamento[]" value="20" id="item_48_orcamento_20"><label for="item_48_orcamento_20"> R$ <span class="media_valor">100,00</span></label></p><br>
												            												            												            <p class="right-align grey-text" style="display: none; border-top: 1px solid #999;">Média - <span class="valor_total">R$ 38,78</span></p>
								                   		</td>
								                   	</tr>

						                <tr class="teal  lighten-4">
						                    <th colspan="7">LOTE 1 - nome do lote</th>
						                </tr>
						                -->
						                <THEAD>
						                  <tr>
						                    <th width="5%">ITEM</th>
						                    <th width="50%">DESCRIÇÃO</th>
						                    <th width="7%">UNID.</th>
						                    <th width="8%">QUANT.</th>
						                    <th width="8%">VAL. UNIT.</th>
						                    <th width="8%">VAL. TOTAL</th>
						                    <th width="14%">COTAÇÕES</th>
						                  </tr>
						                </THEAD>
						                <tbody  id="itens-list" name="itens-list">

						                	@if($Count>0)
						                	@php $x=1 @endphp
						                	@php $contador=$Count @endphp
									          @foreach($eventos_itens as $evento_item)                    
								                  	<tr class="item_{{ $evento_item->idItem }}">
								                   		<td><center><b>{{ $contador }}</b><br><a id="{{ $evento_item->idItem }}" class="excluir_item tooltipped" data-position="bottom" data-delay="0" data-tooltip="Excluir item do evento" href="{{ route('cliente.eventos.item.deletar',$evento_item->idItem) }}" onclick="return false;"><i class="material-icons red-text">delete_forever</i></a></center></td>
								                   		<td>{{ $evento_item->descricao }}</td>
								                   		<td>{{ $evento_item->unidade }}</td>
								                   		<td data-iditem="{{ $evento_item->idItem }}">
								                   			<div class="input-field">
										                        <input type="number" name="qtde" value="{{isset($evento_item->qtde ) ? $evento_item->qtde  : ''}}">
										                        <label>Quantidade</label>
										                    </div>
				                    					</td>
								                   		<td class="valor_unitario">R$ {{isset($evento_item->valor_unitario ) ? number_format($evento_item->valor_unitario, 2, ',', '.')  : ''}}</td>
								                   		<td class="valor_total">R$ {{isset($evento_item->valor_total ) ? number_format($evento_item->valor_total, 2, ',', '.')   : ''}}</td>
								                   		<td class="lista_orcamentos" data-iditem="{{ $evento_item->idItem }}">
								                   			@foreach($orcamentos as $orcamento)  
								                   			@if($orcamento->id_item ==$evento_item->codigo)                  
												                    <p><input  type="checkbox" name="orcamento[]" value="{{ $orcamento->id }}" id="item_{{ $evento_item->idItem }}_orcamento_{{ $orcamento->id  }}" @if(preg_match(",$orcamento->id,", $evento_item->cotacoes)) checked  @endif  /><label for="item_{{ $evento_item->idItem }}_orcamento_{{ $orcamento->id  }}"><!--{{ $orcamento->orgao  }} - --> R$ <span class=media_valor>{{ number_format($orcamento->valor, 2, ',', '.')  }}</span></label></p><br>
												            @endif
												            @endforeach
												            <p class="right-align grey-text" style="display: none; border-top: 1px solid #999;">Média - <span class="valor_total">R$ {{isset($evento_item->valor_total ) ? number_format($evento_item->valor_total, 2, ',', '.')  : ''}}</span></p>
								                   		</td>
								                   	</tr>
								                   	@php $x++ @endphp
								                   	@php $contador-- @endphp
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

											
											<!--<tr>
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
						                  </tr>-->
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

	                                	<table  id="table_evento_itens_tr" class="responsive-table centered striped teal  lighten-5">
						                <thead>
						                  <tr>
						                    <th width="10%">ITEM</th>
						                    <th width="40%">DESCRIÇÃO</th>
						                    <th width="60%">TRs DISPONÍVEIS</th>
						                  </tr>
						                </thead>
						                <tbody  id="itens-list-tr" name="itens-list-tr">
						                	@if($Count>0)
						                	@php $x=1 @endphp
						                	@php $contador=$Count @endphp
									          @foreach($eventos_itens as $evento_item)                    
								                  	<tr class="item_{{ $evento_item->idItem }}">
								                   		<td><b>{{ $x }}</b></td>
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
								                   	@php $x++ @endphp
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
  									  <!--<textarea class="editor_basico" style="height: 600px;" name="termo_referencia" id="termo_referencia">{{isset($registro->termo_referencia) ? $registro->termo_referencia : ''}}</textarea>-->




  									  <textarea class="editor_basico" style="height: 600px;" name="termo_referencia" id="termo_referencia">{{isset($termo_referencia_revisado) ? $termo_referencia_revisado : ''}}</textarea>
  									 





	                               </div>
	                               <div class="step-actions">
	                                  <button id="btn_alteracoes_tr" class="save-step waves-effect waves-dark btn teal lighten-2">SALVAR TERMO DE REFERÊNCIA</button>   
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
	                         <li class="step  @if(Auth::user()->nivel<>4 && Auth::user()->nivel<>1 && Auth::user()->nivel<>3) disable_step @endif">
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

										<div class="input-field" id="embasamento_legal" style="display: {{ isset($registro->id_modalidade) && $registro->id_modalidade == '7' ? '' : 'none' }};" >
											<textarea class="materialize-textarea" name="embasamento_legal">{{isset($registro->embasamento_legal) ? $registro->embasamento_legal : ''}}</textarea>
											<label>EMBASAMENTO LEGAL DA DISPENSA</label>
										</div>

										<div class="input-field">
											<textarea class="materialize-textarea" name="tipo_julgamento">{{isset($registro->tipo_julgamento) ? $registro->tipo_julgamento : ''}}</textarea>
											<label>TIPO DE JULGAMENTO</label>
										</div>

										<label><H6>DESTINADO AO SRP (SISTEMA DE REGISTRO DE PREÇOS) ?</H6></label>

											<div class="switch">
												<label>
												  Não
												  <input type="checkbox" name="destinada_srp" id="destinada_srp" value="1"  {{ isset($registro->destinada_srp) && $registro->destinada_srp == '1' ? 'checked' : '' }} >
												  <span class="lever"></span>
												  Sim
												</label>
											</div>
											
										<BR><BR>

										
										<div id="box_prazo_vigencia_ata" style="display: {{ isset($registro->destinada_srp) && $registro->destinada_srp == '1' ? '' : 'none' }};" >
											<div class="input-field">												
												<input type="text"   name="prazo_vigencia_ata" value="{{isset($registro->prazo_vigencia_ata) ? $registro->prazo_vigencia_ata : ''}}">
												<span class="helper-text" >Ex: (2 meses )</span>											
												<label>PRAZO DE VIGÊNCIA DA ATA</label>
											</div>
											<br>
										</div>
										
										
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

										<div id="box_itens_exclusivos_me_epp" style="display: {{ isset($registro->exclusiva_me_epp) && $registro->exclusiva_me_epp == '1' ? 'none' : '' }};" >

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




	                               </div>
	                               <div class="step-actions">
	                                  <button id="btn_formulario_cpl" class="save-step waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E REVISAR TR</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                            </div>
	                         </li>
	                         

	                         
	                         <!-- ETAPA 7 -->
	                         <li class="step @if(Auth::user()->nivel>4) disable_step @endif">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Revisar Itens e Orçamentos</div>
	                            <div class="step-content">
	                               <div class="row">
	                                  <!--<span style="clear: both;">
									  <br>
									  <label><H6>REVISAR TERMO DE REFERÊNCIA</H6></label>-->
  									  <!--<textarea id="termo_referencia_revisao" class="" style="height: 600px;" readonly>{{isset($termo_referencia_revisado) ? $termo_referencia_revisado : ''}}</textarea>-->
  									  <!--<iframe frameborder="0" id="termo_referencia_revisao" style="border: 1px solid #a9a9a9; width: 100%; height: 600px; padding: 20px;"  src="{{ route('cliente.eventos.verTermoReferencia',$registro->id)}}"></iframe>-->

  									  <table  id="table_evento_itens_tr" class="responsive-table centered striped teal  lighten-5">
						                <thead>
						                  <tr>

						                    <th width="5%">ITEM</th>
						                    <th width="58%">DESCRIÇÃO</th>
						                    <th width="7%">UNID.</th>
						                    <th width="7%">QUANT.</th>
						                    <th width="10%">VAL. UNIT.</th>
						                    <th width="13%">VAL. TOTAL</th>
						                  </tr>
						                </thead>
						                <tbody  id="itens-list-tr-revisao" name="itens-list-tr-revisao">
						                	@if($Count>0)
						                	@php $x=1 @endphp
						                	@php $contador=$Count @endphp
									          @foreach($eventos_itens as $evento_item)                    
								                  	<tr class="item_{{ $evento_item->idItem }}">
								                   		<td><b>{{ $x }}</b></td>
								                   		<td>{{ $evento_item->descricao }}</td>
								                   		<td>{{ $evento_item->unidade  }}</td>
								                   		<td>{{ $evento_item->qtde }}</td>
								                   		<td>

								                   			R$ {{ number_format($evento_item->valor_unitario, 2, ',', '.')  }}

								                   			

								                   		</td>
								                   		<td>

								                   			R$ {{ number_format($evento_item->valor_total, 2, ',', '.')  }}

								                   			

								                   		</td>
								                   	</tr>
								                   	@php $x++ @endphp
								              @endforeach
								            @else
											        <tr class="no_item" style="background: #f2f2f2">
											        	<td colspan="3">
											             	<span class="black-text">
														        <p style="text-align: center;"><br>SEM ITENS ADICIONADOS, VOLTE À ETAPA 2 PARA ADICIONAR ITENS  <br><br> </p>
														    </span>
														</td>
													</tr>
											@endif

						                </tbody>
						                </table>



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
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/15" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>OFÍCIO</td>
					                  </tr>
					                  <tr>
					                   <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarTermoReferencia', $registro->id)}}" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>TERMO DE REFERÊNCIA</td>
					                  </tr>

					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/17" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>ORÇAMENTOS</td>
					                  </tr>

					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/8" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>DECLARAÇÃO DE SALDO ORÇAMENTÁRIO</td>
					                  </tr>

					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/9" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>DECLARAÇÃO DE COMPATIBILIDADE COM PPA, LDO E LOA</td>
					                  </tr>

					                  <tr>
					                   <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/14" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
					                    <td>DESPACHO DA CPL</td>
					                  </tr>
					                  <tr>
					                    <td>&nbsp&nbsp&nbsp&nbsp<a href="{{route('cliente.eventos.gerarDocumento', $registro->id)}}/13" target="_blank" class="waves-effect waves-dark btn teal lighten-2"><i class="large material-icons left">file_download</i>  DOWNLOAD</a></td>
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
	    * Este método apaga a mensagem de sucesso após 5 segundos
	    */
		@if ($message = Session::get('success'))
	      $("#msg_sucesso").show().delay(5000).fadeOut();
	      $('.stepper').openStep(2);
	    @endif  

		/*
	    * Este método inicializa editor ckeditor
	    
	    var myeditor = ClassicEditor
	        .create( document.querySelector( '.editor_basico' ), {
	        toolbar: [ 'bold', 'italic','numberedList', 'bulletedList','source' ]
	    } )
	       .then
    	   (editor => { editorinstance =editor;})
	    .catch( error => {
	        console.log( error );
	    } );
		*/

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


	//$("input[name='qtde']").bind('keyup mouseup', function () {
	$(document).on('keyup mouseup',"input[name='qtde']", function(){






    	var id_evento_item=$(this).parent().parent().attr('data-idItem');
 	   console.log('id item:'+id_evento_item);

		//idItem
		var soma_valor=0;
		var media_valor=0;
		var qtde_itens=$(this).val();
		var cotacoes =',';
		console.log($(this).parent().parent().next().next().next().html());
        var values = $(this).parent().parent().next().next().next().find('input:checkbox:checked').map(function () {
		  	console.log('orçamento:' +this.value +' - '+ $(this).next().find('.media_valor').html());
		  	cotacoes = cotacoes +this.value+',';
		  	valor_atual=parseFloat($(this).next().find('.media_valor').html().replace("," , ".")).toFixed(2);
			soma_valor +=parseFloat(valor_atual);
			//console.log(soma_valor);

		}).get();

		media_valor=parseFloat(soma_valor/$(this).parent().parent().next().next().next().find('input:checkbox:checked').length);

		if(isNaN(media_valor) == true) media_valor=0;

		valor_total=parseFloat(media_valor*qtde_itens);
		
		if(isNaN(valor_total) == true) valor_total=0;

		$('.item_' + id_evento_item + ' .valor_unitario').html(media_valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
		$('.item_' + id_evento_item + ' .valor_total').html(valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

		console.log(media_valor);
		console.log(valor_total);

		// salva o orçamento selecionado e atualiza valores médios dos itens
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        var formData = {
            //id_item: id_evento_item,
            id_evento: $('#frm_evento input[name="id_evento"]').val(),
            id_usuario: $('#frm_evento input[name="id_usuario"]').val(),
            qtde: qtde_itens,
            cotacoes: cotacoes,
            valor_unitario: media_valor,
            valor_total: valor_total,
            _token: $('#frm_evento input[name="_token"]').val()
        }
        var state = 'put';
        var type = "POST";
        var my_url = '{{route("cliente.eventos.item.atualizar")}}/'+id_evento_item;
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
            	console.log('iten atualizado com sucesso');
            },
            error: function (data3) {
                console.log('Error:', data3);
            }
        });        






	});


	$(document).on('change',".lista_orcamentos input[type='checkbox']", function(){
        
       

       var id_evento_item=$(this).parent().parent().attr('data-idItem');
 	   console.log('id item:'+id_evento_item);

		//idItem
		var soma_valor=0;
		var media_valor=0;
		var qtde_itens=$('.item_' + id_evento_item + ' input[name="qtde"]').val();
		var cotacoes =',';
		//console.log('qtde :'+qtde_itens);
        var values = $(this).parent().parent().find('input:checkbox:checked').map(function () {
		  	console.log('orçamento:' +this.value +' - '+ $(this).next().find('.media_valor').html());
		  	cotacoes = cotacoes +this.value+',';
		  	valor_atual=parseFloat($(this).next().find('.media_valor').html().replace("," , ".")).toFixed(4);
			soma_valor +=parseFloat(valor_atual);
			console.log('Valor Atual: '+valor_atual);
			console.log('Soma Valor: '+soma_valor);

		}).get();

		console.log('Soma Valor Fora: '+ parseFloat(0/0) );

		media_valor=parseFloat(soma_valor/$(this).parent().parent().find('input:checkbox:checked').length);

		if(isNaN(media_valor) == true) media_valor=0;

		valor_total=parseFloat(media_valor*qtde_itens);

		if(isNaN(valor_total) == true) valor_total=0;

		console.log('Length valor: '+$(this).parent().parent().find('input:checkbox:checked').length);
		console.log('Média valor: '+media_valor);
		console.log('Valor Total: '+valor_total);

		$('.item_' + id_evento_item + ' .valor_unitario').html(media_valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
		$('.item_' + id_evento_item + ' .valor_total').html(valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

		console.log(media_valor);

		// salva o orçamento selecionado e atualiza valores médios dos itens
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        var formData = {
            //id_item: id_evento_item,
            id_evento: $('#frm_evento input[name="id_evento"]').val(),
            id_usuario: $('#frm_evento input[name="id_usuario"]').val(),
            //qtde: '1',
            cotacoes: cotacoes,
            valor_unitario: media_valor,
            valor_total: valor_total,
            _token: $('#frm_evento input[name="_token"]').val()
        }
        var state = 'put';
        var type = "POST";
        var my_url = '{{route("cliente.eventos.item.atualizar")}}/'+id_evento_item;
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
            	console.log('iten atualizado com sucesso');
            },
            error: function (data3) {
                console.log('Error:', data3);
            }
        });        
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
		            qtde: '1',
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

		                var x=$('#itens-list').length + 1;

		                var rowCount = $('#itens-list tr').length + 1;

		                console.log($('#itens-list').length);

		                 // adiciona itens na tabela de itens // data.codigo 
		                var item = '<tr class="item_' + data.idItem + '">';
						 item += '	    <td><center><b>' + rowCount + '</b><br><a  id="' + data.idItem + '" class="excluir_item tooltipped" data-position="bottom" data-delay="0" data-tooltip="Excluir item do evento" href={{url("cliente/eventos/itens/deletar")}}/' + data.idItem + '  onclick="return false;"><i class="material-icons red-text">delete_forever</i></a></center></td>';
						 item += '	    <td>' + data.descricao + '</td>';
						 item += '	    <td>' + data.unidade + '</td>';
						 item += '	    <td data-idItem="' + data.idItem + '">';
						 item += '	    	<div class="input-field">';
						 item += '		          <input type="number" class="qtde" name="qtde" value="1">';
						 item += '		          <label>Quantidade</label>';
						 item += '		    </div>';
			             item += '      </td>';
						 item += '	    <td class="valor_unitario">R$ 0,00</td>';
						 item += '	    <td class="valor_total">R$ 0,00</td>';
						 item += '	    <td class="lista_orcamentos" data-idItem="' + data.idItem + '"></td>';
						 item += '</tr>';		                 
		                $('#itens-list').prepend(item);

		                /*
		                // adiciona itens na tabela de trs
		                */
		                var item = '<tr class="item_' + data.idItem + '">';
						 item += '	    <td><b>' + rowCount + '</b></td>';
						 item += '	    <td>' + data.descricao + '</td>';
						 item += '	    <td class="trs"></td>';
						 item += '</tr>';		                 
		                //$('#itens-list-tr').prepend(item);
		                $('#itens-list-tr').append(item);  

		                /*
		                // adiciona itens na tabela de revisão de itens
		                */
		                var item = '<tr class="item_' + data.idItem + '">';
						 item += '	    <td><b>' + rowCount + '</b></td>';
						 item += '	    <td>' + data.descricao + '</td>';
						 item += '	    <td>' + data.unidade + '</td>';
						 item += '	    <td>' + data.qtde + '</td>';
						 item += '	    <td>' + data.valor_unitario.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td>';
						 item += '	    <td>' + data.valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) + '</td>';
						 item += '</tr>';		                 
		                //$('#itens-list-tr').prepend(item);
		                $('#itens-list-tr-revisao').append(item);  

		                var row_id_item=data.idItem;
		                 // faz pesquisa de quais TRs pertencem a esse ITEM
				        $.ajaxSetup({
				            headers: {
				                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				            }
				        })
				        var formData3 = {
				            id_item: data.codigo,
				            _token: $('#frm_evento input[name="_token"]').val()
				        }
		                $.ajax({
				            type: 'POST',
				            url: '{{route("admin.orcamentos.listar")}}',
				            data: formData3,
				            dataType: 'json',
				            success: function (data3) {
				            	console.log(data3)

				            	var soma_valor=0;
				            	var media_valor=0;

				            	// insere tr na tabela de itens
				            	$.each(data3, function() {
				            		console.log(this.orgao);
				            		valor_atual=parseFloat(this.valor).toFixed(2);
				            		soma_valor +=parseFloat(valor_atual);
									console.log(soma_valor);
								     
								     $('.item_' + row_id_item + ' .lista_orcamentos').append('<p><input type="checkbox" name="orcamento[]" value="'+ this.id +'" id="orcamento_'+ this.id +'" /><label for="orcamento_'+ this.id +'"> <span class=media_valor>'+valor_atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+'</span></label></p><br> ');
								     //$('.item_' + row_id_item + ' .lista_orcamentos').append('<p><input type="checkbox" name="orcamento[]" value="'+ this.id +'" id="orcamento_'+ this.id +'" /><label for="orcamento_'+ this.id +'">'+this.orgao+' - <span class=media_valor>'+valor_atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+'</span></label></p><br> ');

								});


								media_valor=parseFloat(soma_valor/data3.length);

								//$('.item_' + row_id_item + ' .valor_unitario').append('<center>'+media_valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+'</center>');
								//$('.item_' + row_id_item + ' .valor_total').append('<center>'+media_valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+'</center>');
								$('.item_' + row_id_item + ' .lista_orcamentos').append('<p class="right-align grey-text" style="display: none; border-top: 1px solid #999;">Média - <span class="valor_total">R$ 0,00</span></p>'); //'+media_valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+'
								console.log('opa qtde');
								$('.item_' + row_id_item + ' .qtde').focus();
								$('select').material_select();
				               
				            },
				            error: function (data3) {
				                console.log('Error:', data3);
				            }
				        });






		               










		                
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


function formatReal( int )
{
        var tmp = int+'';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

        return tmp;
}

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

        var etapa=$(this).attr('id');
        console.log('etapa:'+etapa);
        //btn_formulario_cpl

       // alert($(this).attr("id"));

        // verifica se ainda está na primeira etapa
        if(typeof id_tr_selecionado != 'undefined'){

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
			                  	console.log(data);

			                  	
			                  	////console.log(Array.from( editorinstance.ui.componentFactory.names() ));

			                  	$('textarea[name=termo_referencia]').val(data);

			                  	$('textarea[name=termo_referencia]').trumbowyg('html', data);

			                  	////editorinstance.setData(data); 

			                  	// salva etapas e muda tr se necessário
		        				salvar_etapa('{{$registro->id}}');

			                  }
			            })	        		
		        	}
		        }else{
		        	// salva etapas e muda tr se necessário
		        	salvar_etapa('{{$registro->id}}');
		        }

    	}// fim verifica fim etapa

    	if(etapa=='btn_alteracoes_tr') return false;



    	//return false;
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
       // CKEDITOR.instances.SurveyBody.updateElement();
        //var formData = $('#frm_evento').serialize();


        // convert form data to array
		var data = $("#frm_evento").serializeArray();

		//const data_editor = editor.getData();
		////const data_editor = editorinstance.getData(); 
		var data_editor = $('textarea[name=termo_referencia]').trumbowyg('html');
		data.find(item => item.name === 'termo_referencia').value = data_editor;


		var garantia_contratual_status = $("input[name=garantia_contratual]").prop('checked');
		if (typeof data.find(item => item.name === 'garantia_contratual')  === "undefined") {
			//data.push({name: 'garantia_contratual', value: garantia_contratual});
		}else{
			data.find(item => item.name === 'garantia_contratual').value = garantia_contratual_status;
		}



		var destinada_srp_status = $("input[name=destinada_srp]").prop('checked');
		if (typeof data.find(item => item.name === 'destinada_srp')  === "undefined") {
			//data.push({name: 'destinada_srp', value: destinada_srp_status});
		}else{
			data.find(item => item.name === 'destinada_srp').value = destinada_srp_status;
		}

		var exclusiva_me_epp_status = $("input[name=exclusiva_me_epp]").prop('checked');
		if (typeof data.find(item => item.name === 'exclusiva_me_epp')  === "undefined") {
			//data.push({name: 'destinada_srp', value: destinada_srp_status});
		}else{
			data.find(item => item.name === 'exclusiva_me_epp').value = exclusiva_me_epp_status;
		}

		var itens_exclusivos_me_epp_status = $("input[name=itens_exclusivos_me_epp]").prop('checked');
		if (typeof data.find(item => item.name === 'itens_exclusivos_me_epp')  === "undefined") {
			//data.push({name: 'destinada_srp', value: destinada_srp_status});
		}else{
			data.find(item => item.name === 'itens_exclusivos_me_epp').value = itens_exclusivos_me_epp_status;
		}

		
		// OR using ES5
		/*data.forEach(function (item) {
		  if (item.name === 'entry[body]') {
		    item.value = "something else";
		  }
		});*/




        $.ajax({
	          type:"POST",
	          url:'{{route("cliente.eventos.atualizar")}}/'+id,
	          data: $.param(data),
	          dataType: 'json',
	          cache: false,
	          processData: false,
	          success: function(data){                    
	            var $toastContent = $('<span>ETAPA SALVA COM SUCESSO</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action">X</button>'));
	            Materialize.toast($toastContent, 10000);                    
	            
	            // monta TR para revisão
	            montar_tr_revisao(id);            	


	          },
	          error: function(data){  
	          	var $toastContent = $('<span>ERRO PARA SALVAR ESTA ETAPA, CONTACTE O ADMINISTRADOR DO SISTEMA. </span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action">X</button>'));
	            Materialize.toast($toastContent, 5000);  	          	
	          }
        })
    }


    /*
    * Esta função monta um TR para revisão, substituindo as variaveis
    */
    function montar_tr_revisao(id){
    	console.log('motando tr'+id);
    	$('#termo_referencia_revisao').attr('src','{{route("cliente.eventos.verTermoReferencia")}}/'+id);
        /*$.ajax({
              type:"GET",
              url:'{{ route("cliente.eventos.montar_tr") }}/'+id,
              cache: false,
              processData: false,
              success: function(data){  
              	$('#termo_referencia_revisao').val(data);
              },
              error: function(data){   }
          })*/
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
	  	$("textarea[name=embasamento_legal]").val('');
	  }
	})

	/*
    * Este método mostra embasamento legal dependendo do tipo de modalidade
    */
	$("#exclusiva_me_epp").on("click",function() {
		
	  var status = $("input[name=exclusiva_me_epp]").prop('checked');
	  console.log(status);
	  if( status == true){
	  	
	  	$("#box_itens_exclusivos_me_epp").hide();
	  	$( "input[name=itens_exclusivos_me_epp]" ).prop( "checked", false );
	  }else{
	  	$("#box_itens_exclusivos_me_epp").show();
	  }
	})

	/*
    * Este método mostra a prazo para vigência se marcado destinado ao SRP
    */
	$("#destinada_srp").on("click",function() {
		
	  var status = $("input[name=destinada_srp]").prop('checked');
	  console.log(status);
	  if( status == true){
	  	$("#box_prazo_vigencia_ata").show();
	  }else{
	  	$("#box_prazo_vigencia_ata").hide();
	  	$( "input[name=prazo_vigencia_ata]" ).val('');
	  }
	})

	/*
    * Este método mostra a porcentagem caso seja exigida garantia contratual
    */
	$("#garantia_contratual").on("click",function() {
		
	  var status = $("input[name=garantia_contratual]").prop('checked');
	  console.log(status);
	  if( status == true){
	  	$("#box_porcentagem_garantia").show();
	  }else{
	  	$("#box_porcentagem_garantia").hide();
	  	$( "input[name=porcentagem_garantia]" ).val('');
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



