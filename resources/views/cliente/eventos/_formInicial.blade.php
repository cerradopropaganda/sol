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
								                   		<td><b>{{ $evento_item->codigo }}</b><br><center><a id="{{ $evento_item->idItem }}" class="excluir_item tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir item do evento" href="{{ route('cliente.eventos.item.deletar',$evento_item->idItem) }}" onclick="return false;"><i class="material-icons red-text">delete_forever</i></a></center></td>
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

														    	 <p id="input_{{ $item_tr->codigo }}" style="margin-bottom: 1em"><input name="tr_escolhido" type="radio" id="{{ $item_tr->codigo }}" value="{{ $item_tr->codigo }}"  class="validate radio_TR" required  /><label for="{{ $item_tr->codigo }}">{{ $item_tr->nome }}</label></p>	

												                 @endif

											                @endforeach
												        @endif
												  @endforeach
												  
											@else
												ADICIONE ITENS NA ETAPA ANTERIOR PARA LISTAR OS TRs DISPONÍVEIS
											@endif
											

					                  </div>

		                              <!--<p style="margin-bottom: 1em">
		                                <input name="tr_escolhido" type="radio" id="789" value="789"  class="validate" required  />
		                                <label for="789">TR MATERIAL DE EXPEDIENTE</label>
		                              </p>

		                              <p style="margin-bottom: 1em">
		                                <input name="tr_escolhido" type="radio" id="456" value="456"  class="validate" required  />
		                                <label for="456">TR MATERIAL DE CONSUMO</label>
		                              </p>

		                              <p style="margin-bottom: 1em">
		                                <input name="tr_escolhido" type="radio" id="123" value="123"  class="validate" required />
		                                <label for="123">TR COMBUSTÍVEIS</label>
		                              </p>
		                          		-->
		                              
		                            <BR>



	                               </div>
	                               <!--
	                               <div class="step-actions">
	                                  <button class="waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E PERSONALIZAR TERMO DE REFERÊNCIA</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                           		-->
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
  <textarea class="" style="height: 600px;" name="termo_referencia">{{isset($registro->termo_referencia) ? $registro->termo_referencia : ''}}
		MATERIAL DE EXPEDIENTE

	ÓRGÃO SOLICITANTE: (CS1)

	1. DO OBJETO
	1.1. O presente processo tem por objeto: (CL2))

	2. JUSTIFICATIVA
	2.1. (CL3)) 

	3. ESPECIFICAÇÃO DO OBJETO E ESTIMATIVA DE PREÇOS
	3.1. (NESTE LOCAL SERÁ INSERIDA A TABELA COM OS ITENS E SUAS COTAÇÕES DE PREÇOS).
	3.2. O valor total estimado para a aquisição dos produtos a serem licitados é de R$ {copiar o total do item acima} (valor por extenso automático).
	3.3. Os preços apresentados na proposta devem incluir todos os custos e despesas, tais como: custos diretos e indiretos, seguros, carga, transporte, descarga, embalagens, tributos, vencimentos e vantagens, encargos sociais e trabalhistas, lucros e ainda todas as despesas que direta ou indiretamente incidirem sobre o fornecimento dos produtos.
	3.4. Os preços serão fixos e irreajustáveis até a data do término do fornecimento dos produtos.
	3.5. Os preços, excepcionalmente, poderão ser revistos, para mais ou para menos, na superveniência de legislação federal, estadual ou municipal, ou de ato, ou de fato que altere ou modifique as relações que as partes pactuaram inicialmente, de forma a manter o equilíbrio econômico e financeiro do contrato.
	3.6. A proposta de preços deverá apresentar validade mínima de 60 (sessenta) dias corridos, contados a partir da data da sua apresentação.

	4. DA FONTE DE RECURSOS
	4.1. Os recursos para o pagamento das despesas relativas à aquisição dos bens advém da seguinte dotação orçamentária: 
	(CL6).

	5. DA EXECUÇÃO DO OBJETO
	5.1. Os produtos adquiridos deverão ser entregues de acordo com as necessidades da contratante, no prazo máximo de [incluir texto] (valor por extenso automático) dias úteis, mediante Autorização de Fornecimento, emitida pela mesma, cujo quantitativo poderá variar, a seu critério.
	5.2. A entrega dos produtos adquiridos deverá ocorrer no horário entre [incluir texto], de segunda a sexta feira, exceto feriados, no seguinte local: [incluir texto].
	5.3. Observado o disposto nos artigos 73 a 76, da Lei Federal nº 8.666/93, o recebimento do objeto será realizado da seguinte forma:
	5.3.1. Provisoriamente, assim que efetuada a entrega, para efeito de posterior verificação da conformidade com as especificações técnicas.
	5.3.2. Definitivamente, até [incluir texto] (valor por extenso automático) dias úteis da entrega, após verificação da qualidade, quantidade do item e das especificações exigidas neste Termo de Referência, com a sua consequente aceitação, que ficará a cargo da Comissão de Recebimento.
	5.3.3. No caso de consideradas insatisfatórias as condições do objeto recebido provisoriamente, serão lavradas Termo de Recusa, no qual se consignarão as desconformidades, devendo o produto ser recolhido e substituído.
	5.3.4. Após a notificação à contratada, o prazo decorrido até então, será desconsiderado, iniciando-se nova contagem tão logo sanada a situação.
	5.3.5. O fornecedor terá prazo de [incluir texto] (valor por extenso automático) dias úteis para providenciar a substituição do item, a partir da comunicação oficial feita pela Comissão de Recebimento, sem qualquer custo adicional para a contratante.
	5.4. A contratante poderá recusar todos e quaisquer produtos que estejam em desacordo com a Autorização de Fornecimento, ou com as especificações da proposta apresentada pela contratada, ou ainda, que apresentem defeitos ou avarias decorrentes da fabricação, bem como avarias ocorridas no transporte ou descarga, que comprometam seu uso ou consumo regular e adequado.
	5.5. Poderá a contratante, a seu critério, exigir a troca sem ônus para a mesma, dos produtos que forem entregues em desacordo com as normas e especificações contidas no edital de licitação.
	5.6. Nenhuma alteração ou modificação de forma, qualidade ou quantidade do objeto poderá ser feita pela contratada, podendo, entretanto, a contratante determinar modificações recomendáveis, desde que justificadas nos, nos termos da lei nº 8.666/93.

	6. DO PAGAMENTO
	6.1. O pagamento será efetuado em até [incluir texto] (valor por extenso automático) dias após a apresentação da(s) nota(s) fiscal(s), conferida(s) e atestada(s) pelo responsável designado para o acompanhamento e recebimento dos produtos e da competente liquidação da despesa.
	6.2. Se os produtos não forem entregues conforme as especificações da proposta, o pagamento ficará suspenso até o seu recebimento definitivo.
	6.3. Em caso de irregularidade na emissão dos documentos fiscais, ou pendência de qualquer obrigação financeira que lhe for imposta, nenhum pagamento será feito à contratada, e o prazo de pagamento será contado a partir de sua reapresentação, desde que devidamente regularizados.
	6.4. O pagamento só será realizado após a comprovação de regularidade para com a Fazenda Nacional (certidão conjunta emitida pela Secretaria da Receita Federal do Brasil e Procuradoria-Geral da Fazenda Nacional, quanto aos demais tributos federais e à Divida Ativa da União, por elas administrados); prova de regularidade com a Seguridade Social (INSS);  prova de regularidade com o Fundo de Garantia do Tempo de Serviço (FGTS);  prova de regularidade com a Fazenda Pública Estadual; e prova de regularidade com a Fazenda Municipal do domicílio ou sede do licitante.
	6.5. Se houver atraso após o prazo previsto, as faturas serão pagas acrescidas de juros simples de mora de 6% (seis por cento) ao ano, aplicando-se a pro-rata-die da data do vencimento até o efetivo pagamento, desde que solicitado pela contratada.

	7. DAS OBRIGAÇÕES DA CONTRATADA
	7.1. Entregar o objeto em perfeitas condições, conforme proposta apresentada e exigências contidas no Edital e anexos;
	7.2. Efetuar a troca (quando estiverem fora das especificações, ou impróprios para o consumo), sem ônus para a contratante, arcando com todas as despesas com carga, transporte e descarga, no prazo máximo de [incluir texto] (valor por extenso automático) dias, a contar da data da notificação.
	7.3. Entregar os produtos nas embalagens adequadas, contendo rótulo de identificação, lacres, ou outros dispositivos que assegurem a inviolabilidade do produto, seu prazo de validade, e todas as demais informações que assegurem a qualidade dos produtos entregues.
	7.4. Atender prontamente qualquer exigência ou esclarecimento solicitado pelo representante da CONTRATANTE inerente ao objeto ou execução do contrato.
	7.5. Comunicar à fiscalização da contratante, por escrito, quando se verificar quaisquer condições inadequadas para o fornecimento dos produtos, ou a iminência de fatos que possam prejudicar a perfeita execução do contrato.
	7.6. Executar fielmente o objeto contratado de acordo com as normas legais, zelando sempre pelo seu bom desempenho, entregando o objeto em conformidade com a proposta apresentada e com as orientações da contratante, observando os critérios de qualidade dos produtos a serem fornecidos.
	7.7. Ressarcir prejuízos de quaisquer natureza causados ao patrimônio da contratante ou de terceiros, decorrentes direta ou indiretamente da execução do contrato, por negligência, imprudência ou imperícia dos funcionários, prepostos ou representantes da contratada, a preços atualizados, dentro do prazo de [incluir texto] (valor por extenso automático) dias, contados a partir da comprovação de sua responsabilidade.
	7.8. Substituir, sempre que exigido pela contratante, independentemente de justificativa por parte desta, qualquer funcionário cuja atuação, permanência ou comportamento, sejam julgados prejudiciais, inconvenientes ou insatisfatórios à disciplina da contratante ou ao interesse do serviço público.
	7.9. Assumir a responsabilidade por todas as providências e obrigações estabelecidas na legislação de acidentes de trabalho, quando na sua ocorrência, forem vítimas os seus funcionários ou terceiros, no desempenho dos serviços ou em conexão com eles, ainda que ocorrido nas dependências da contratante.
	7.10. Indicar preposto que responderá junto à contratante, pela perfeita execução do fornecimento, e realizará a interlocução entre a Contratante e a Contratada.
	7.11. Manter, durante a vigência do contrato, as mesmas condições de habilitação e qualificação exigidos na licitação, nos termos do art. 55 inciso XIII, da lei nº 8.666/93.
	7.12. Não transferir a outrem, no todo ou em parte, o presente contrato, sem a prévia e expressa anuência da contratante.
	7.13. A contratada se obriga a fornecer os produtos obedecendo às disposições contidas no edital, e somente poderá efetuar modificações que tenham sido prévia e expressamente aprovadas pela contratante.
	7.14. Nenhuma alteração ou modificação de forma, qualidade ou quantidade do objeto poderá ser feita pela contratada, podendo, entretanto, a contratante determinar modificações recomendáveis, desde que justificadas nos, nos termos da lei nº 8.666/93.

	8. DAS OBRIGAÇÕES DA CONTRATANTE
	8.1. Acompanhar e fiscalizar a execução do contrato e atestar as faturas, conforme previsto no artigo 67 da Lei 8.666/93.
	8.2. Receber os materiais, fazer a conferência e, quando atenderem ao objeto licitado, aprová-los, guardando-os adequadamente.
	8.3. Liquidar o empenho e efetuar o pagamento das faturas da contratada dentro dos prazos e condições pactuados.
	8.4. Proporcionar todas as facilidades para que a contratada possa desempenhar seus serviços dentro das condições estabelecidas.
	8.5. Rejeitar, no todo ou em parte, os serviços e materiais entregues em desacordo com as obrigações assumidas pela empresa contratada.
	8.6. Recusar Notas Fiscais ou Faturas que estejam em desacordo com as exigências editalícias, informando à contratada e sobrestando o pagamento até a regularização da condição.
	8.7. Relacionar-se com a contratada através de servidor designado pela contratante, Fiscal do Contrato, o qual acompanhará e fiscalizará a execução do objeto contratado, verificando os aspectos quantitativos e qualitativos, anotando em registro próprio as falhas porventura detectadas, comunicando à contratada as ocorrências de quaisquer fatos que, a seu critério, exijam medidas saneadoras.

	9. DO PRAZO CONTRATUAL
	9.1. O prazo de vigência do contrato terá início na data de sua assinatura, e término em [incluir texto], podendo ser prorrogado, de acordo com o disposto no artigo 57 da Lei federal nº 8.666/93, com suas alterações posteriores.

	10. DOS ACRÉSCIMOS E SUPRESSÕES
	10.1. A contratada ficará obrigada a aceitar, nas mesmas condições contratuais, acréscimos ou supressões que se fizerem necessários no quantitativo do objeto contratado, até o limite de 25% (vinte e cinco por cento) do valor inicial atualizado do contrato.
	10.2. É facultada a supressão além do limite acima estabelecido, mediante acordo entre as partes.

	11. DA AMOSTRA
	11.1. PARA APRESENTAÇÃO DE AMOSTRAS FORA DA SESSÃO PÚBLICA:
	11.1.1. Após a apuração da melhor proposta, a sessão será suspensa para que as empresas classificadas apresentem as amostras, fichas técnicas ou prospectos detalhados dos seguintes itens, para análise técnica: [incluir texto].
	11.1.2. As amostras, fichas técnicas ou prospectos detalhados serão analisados por servidor(es) designado(s) pelo órgão solicitante.
	11.1.3. Nenhuma amostra, ficha técnica ou prospecto detalhado será recebido sem a presença de um representante da licitante, nem fora do horário estipulado.
	11.1.4. A licitante poderá apresentar apenas 01 (uma) amostra, ficha técnica ou prospecto detalhado de cada item cotado. Não serão aceitas eventuais complementações, ajustes, modificações ou substituições na amostra, ficha técnica ou prospecto detalhado apresentado.
	11.1.5. As amostras, fichas técnicas ou prospectos detalhados não poderão ser entregues em outro local, sob pena de não serem aceitos pelo órgão solicitante.
	11.1.6. As marcas e especificações das amostras, fichas técnicas ou prospectos detalhados deverão estar em conformidade com a proposta apresentada na sessão pública.
	11.1.7. O agendamento para a apresentação das amostras, fichas técnicas ou prospectos detalhados, bem como da reabertura da sessão serão determinados pelo Pregoeiro.
	11.1.8. – Caso a amostra, ficha técnica ou prospecto detalhado da empresa que ofertou o menor preço não seja compatível com o objeto da licitação, será convocada a empresa subsequente, na ordem de classificação, para apresentação de amostra, ficha técnica ou prospecto detalhado.
	11.1.9. A amostra, ficha técnica ou prospecto detalhado da empresa contratada ficará retido até a entrega total do objeto licitado para aferição e comparação com os produtos entregues, quando será descartado ou devolvido ao fornecedor.
	11.2. PARA APRESENTAÇÃO DE AMOSTRAS NA PRÓPRIA SESSÃO PÚBLICA:
	11.2.1. Após a apuração da melhor proposta, na mesma sessão pública, as empresas classificadas deverão apresentar amostras, fichas técnicas ou prospectos detalhados, dos seguintes itens, para análise técnica: [incluir texto].
	11.2.2. As amostras, fichas técnicas ou prospectos detalhados, serão analisadas por servidor(es) designado(s) pelo órgão solicitante, os quais emitirão, na própria sessão, parecer técnico dos produtos apresentados.
	11.2.3. A licitante poderá apresentar apenas 01 (uma) amostra, ficha técnica ou prospecto detalhado de cada item cotado. Não serão aceitas eventuais complementações, ajustes, modificações ou substituições na amostra, ficha técnica ou prospecto detalhado apresentado.
	11.2.4. As amostras, fichas técnicas ou prospectos detalhados não poderão ser entregues em outro momento ou outro local, sob pena de não serem aceitos pelo órgão solicitante.
	11.2.5. As marcas e especificações das amostras, fichas técnicas ou prospectos detalhados deverão estar em conformidade com a proposta apresentada na sessão pública.
	11.2.6. Caso a amostra, ficha técnica ou prospecto detalhado da empresa que ofertou o menor preço não seja compatível com o objeto da licitação, será convocada a empresa subsequente, na ordem de classificação, para apresentação de amostra, ficha técnica ou prospecto detalhado.
	11.2.7. A amostra, ficha técnica ou prospecto detalhado da empresa contratada ficará retido até a entrega total do objeto licitado, para aferição e comparação com os produtos entregues, quando será descartado ou devolvido ao fornecedor.

	12. DA GARANTIA DO OBJETO
	12.1. O prazo mínimo de garantia exigido para os bens a serem adquiridos obedecerá a tabela abaixo:
	12.1.1. Para os itens [incluir texto], será exigida a garantia mínima de [incluir texto] (valor por extenso automático) meses, contados a partir da data de emissão da nota fiscal, contra defeitos de fabricação.
	12.1.2. Para os itens [incluir texto], será exigida a garantia mínima de [incluir texto] (valor por extenso automático) meses, contados a partir da data de emissão da nota fiscal, contra defeitos de fabricação.
	...
	12.2. A contratada ficará obrigada, durante todo o período de garantia, caso os bens apresentem defeitos, a substituí-los por outros novos, e com as mesmas especificações. No caso de os produtos a serem substituídos não serem mais produzidos, fica a contratada obrigada a promover a substituição por bens tecnologicamente equivalentes ou superiores, sem nenhum ônus para a contratante.

	13. DA FISCALIZAÇÃO
	13.1. A execução do contrato será acompanhada e fiscalizada pela contratante, por intermédio de responsável especialmente designado.
	13.2. Cabe ao fiscal do contrato fiscalizar, acompanhar e verificar sua perfeita execução, em todas as fases, até o recebimento do objeto, competindo-lhe, primordialmente, sob pena de responsabilidade:
	13.2.1. Anotar, em registro próprio, as ocorrências relativas à execução do contrato, determinando as providências necessárias à correção das falhas ou defeitos observados;
	13.2.2. Transmitir ao contratado instruções e comunicar alterações de prazos, cronogramas de execução e especificações do projeto, quando for o caso;
	13.2.3. Dar imediata ciência aos seus superiores e ao órgão central de controle, acompanhamento e avaliação financeira de contratos e convênios dos incidentes e ocorrências da execução que possam acarretar a imposição de sanções ou a rescisão contratual;
	13.2.4. Adotar, junto a terceiros, as providências necessárias para a regularidade da execução do contrato;
	13.2.5. Promover, com a presença do contratado, a verificação dos fornecimentos já efetuados, emitindo a competente habilitação para o recebimento de pagamentos;
	13.2.6. Esclarecer prontamente as dúvidas do contratado, solicitando ao setor competente da Administração, se necessário, parecer de especialistas;
	13.2.7. Fiscalizar a obrigação do contratado de manter, durante toda a execução do contrato, em compatibilidade com as obrigações assumidas, as condições de habilitação e qualificação exigidas na licitação, bem como o regular cumprimento das obrigações trabalhistas e previdenciárias;
	13.2.8. Aplicar multa, suspender o pagamento, caso a contratada desobedeça a quaisquer das Cláusulas estabelecidas no Edital;
	13.2.9. Expedir, por escrito, as comunicações dirigidas à contratada.
	13.3. O fiscal do contrato poderá, se necessário, sustar ou recusar qualquer recebimento de produtos que estejam em desacordo com o edital de licitação.
	13.4. A fiscalização não exclui nem reduz a responsabilidade da contratada pelos danos causados ao contratante ou a terceiros, resultantes de ação ou omissão culposa ou dolosa de qualquer de seus funcionários, prepostos ou representantes.

	14. DA QUALIFICAÇÃO TÉCNICA
	14.1. Para fins de comprovação de qualificação técnica, exigir-se-á dos interessados, a seguinte documentação: 
	14.1.1. Atestado de Capacidade Técnica, expedido por pessoa jurídica de direito público ou privado, que comprove já haver fornecido bens compatíveis ao objeto licitado.

									  </textarea>




	                               </div>
	                               <div class="step-actions">
	                                  <button class="waves-effect waves-dark btn teal lighten-2 next-step">SALVAR E IR PARA DOTAÇÃO ORÇAMENTÁRIA</button>   
									  <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button> 
	                               </div>
	                            </div>
	                         </li>
	                         

	                         
	                         <!-- ETAPA 5 -->
	                         <li class="step @if(Auth::user()->nivel==4) disable_step @endif ">
	                            <div data-step-label=""  class="step-title waves-effect waves-dark">Formulário Dotação orçamentária {{ Auth::user()->nivel }}</div>
	                            <div class="step-content">
	                               <div class="row">


	                                  <div class="input-field">
											<textarea class="materialize-textarea" name="dotacao_orcamentaria">{{isset($registro->endereco) ? $registro->dotacao_orcamentaria : ''}}</textarea>
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
  <textarea class="" style="height: 600px;" name="termo_referencia">{{isset($registro->termo_referencia) ? $registro->termo_referencia : ''}}
		MATERIAL DE EXPEDIENTE

	ÓRGÃO SOLICITANTE: (CS1)

	1. DO OBJETO
	1.1. O presente processo tem por objeto: (CL2))

	2. JUSTIFICATIVA
	2.1. (CL3)) 

	3. ESPECIFICAÇÃO DO OBJETO E ESTIMATIVA DE PREÇOS
	3.1. (NESTE LOCAL SERÁ INSERIDA A TABELA COM OS ITENS E SUAS COTAÇÕES DE PREÇOS).
	3.2. O valor total estimado para a aquisição dos produtos a serem licitados é de R$ {copiar o total do item acima} (valor por extenso automático).
	3.3. Os preços apresentados na proposta devem incluir todos os custos e despesas, tais como: custos diretos e indiretos, seguros, carga, transporte, descarga, embalagens, tributos, vencimentos e vantagens, encargos sociais e trabalhistas, lucros e ainda todas as despesas que direta ou indiretamente incidirem sobre o fornecimento dos produtos.
	3.4. Os preços serão fixos e irreajustáveis até a data do término do fornecimento dos produtos.
	3.5. Os preços, excepcionalmente, poderão ser revistos, para mais ou para menos, na superveniência de legislação federal, estadual ou municipal, ou de ato, ou de fato que altere ou modifique as relações que as partes pactuaram inicialmente, de forma a manter o equilíbrio econômico e financeiro do contrato.
	3.6. A proposta de preços deverá apresentar validade mínima de 60 (sessenta) dias corridos, contados a partir da data da sua apresentação.

	4. DA FONTE DE RECURSOS
	4.1. Os recursos para o pagamento das despesas relativas à aquisição dos bens advém da seguinte dotação orçamentária: 
	(CL6).

	5. DA EXECUÇÃO DO OBJETO
	5.1. Os produtos adquiridos deverão ser entregues de acordo com as necessidades da contratante, no prazo máximo de [incluir texto] (valor por extenso automático) dias úteis, mediante Autorização de Fornecimento, emitida pela mesma, cujo quantitativo poderá variar, a seu critério.
	5.2. A entrega dos produtos adquiridos deverá ocorrer no horário entre [incluir texto], de segunda a sexta feira, exceto feriados, no seguinte local: [incluir texto].
	5.3. Observado o disposto nos artigos 73 a 76, da Lei Federal nº 8.666/93, o recebimento do objeto será realizado da seguinte forma:
	5.3.1. Provisoriamente, assim que efetuada a entrega, para efeito de posterior verificação da conformidade com as especificações técnicas.
	5.3.2. Definitivamente, até [incluir texto] (valor por extenso automático) dias úteis da entrega, após verificação da qualidade, quantidade do item e das especificações exigidas neste Termo de Referência, com a sua consequente aceitação, que ficará a cargo da Comissão de Recebimento.
	5.3.3. No caso de consideradas insatisfatórias as condições do objeto recebido provisoriamente, serão lavradas Termo de Recusa, no qual se consignarão as desconformidades, devendo o produto ser recolhido e substituído.
	5.3.4. Após a notificação à contratada, o prazo decorrido até então, será desconsiderado, iniciando-se nova contagem tão logo sanada a situação.
	5.3.5. O fornecedor terá prazo de [incluir texto] (valor por extenso automático) dias úteis para providenciar a substituição do item, a partir da comunicação oficial feita pela Comissão de Recebimento, sem qualquer custo adicional para a contratante.
	5.4. A contratante poderá recusar todos e quaisquer produtos que estejam em desacordo com a Autorização de Fornecimento, ou com as especificações da proposta apresentada pela contratada, ou ainda, que apresentem defeitos ou avarias decorrentes da fabricação, bem como avarias ocorridas no transporte ou descarga, que comprometam seu uso ou consumo regular e adequado.
	5.5. Poderá a contratante, a seu critério, exigir a troca sem ônus para a mesma, dos produtos que forem entregues em desacordo com as normas e especificações contidas no edital de licitação.
	5.6. Nenhuma alteração ou modificação de forma, qualidade ou quantidade do objeto poderá ser feita pela contratada, podendo, entretanto, a contratante determinar modificações recomendáveis, desde que justificadas nos, nos termos da lei nº 8.666/93.

	6. DO PAGAMENTO
	6.1. O pagamento será efetuado em até [incluir texto] (valor por extenso automático) dias após a apresentação da(s) nota(s) fiscal(s), conferida(s) e atestada(s) pelo responsável designado para o acompanhamento e recebimento dos produtos e da competente liquidação da despesa.
	6.2. Se os produtos não forem entregues conforme as especificações da proposta, o pagamento ficará suspenso até o seu recebimento definitivo.
	6.3. Em caso de irregularidade na emissão dos documentos fiscais, ou pendência de qualquer obrigação financeira que lhe for imposta, nenhum pagamento será feito à contratada, e o prazo de pagamento será contado a partir de sua reapresentação, desde que devidamente regularizados.
	6.4. O pagamento só será realizado após a comprovação de regularidade para com a Fazenda Nacional (certidão conjunta emitida pela Secretaria da Receita Federal do Brasil e Procuradoria-Geral da Fazenda Nacional, quanto aos demais tributos federais e à Divida Ativa da União, por elas administrados); prova de regularidade com a Seguridade Social (INSS);  prova de regularidade com o Fundo de Garantia do Tempo de Serviço (FGTS);  prova de regularidade com a Fazenda Pública Estadual; e prova de regularidade com a Fazenda Municipal do domicílio ou sede do licitante.
	6.5. Se houver atraso após o prazo previsto, as faturas serão pagas acrescidas de juros simples de mora de 6% (seis por cento) ao ano, aplicando-se a pro-rata-die da data do vencimento até o efetivo pagamento, desde que solicitado pela contratada.

	7. DAS OBRIGAÇÕES DA CONTRATADA
	7.1. Entregar o objeto em perfeitas condições, conforme proposta apresentada e exigências contidas no Edital e anexos;
	7.2. Efetuar a troca (quando estiverem fora das especificações, ou impróprios para o consumo), sem ônus para a contratante, arcando com todas as despesas com carga, transporte e descarga, no prazo máximo de [incluir texto] (valor por extenso automático) dias, a contar da data da notificação.
	7.3. Entregar os produtos nas embalagens adequadas, contendo rótulo de identificação, lacres, ou outros dispositivos que assegurem a inviolabilidade do produto, seu prazo de validade, e todas as demais informações que assegurem a qualidade dos produtos entregues.
	7.4. Atender prontamente qualquer exigência ou esclarecimento solicitado pelo representante da CONTRATANTE inerente ao objeto ou execução do contrato.
	7.5. Comunicar à fiscalização da contratante, por escrito, quando se verificar quaisquer condições inadequadas para o fornecimento dos produtos, ou a iminência de fatos que possam prejudicar a perfeita execução do contrato.
	7.6. Executar fielmente o objeto contratado de acordo com as normas legais, zelando sempre pelo seu bom desempenho, entregando o objeto em conformidade com a proposta apresentada e com as orientações da contratante, observando os critérios de qualidade dos produtos a serem fornecidos.
	7.7. Ressarcir prejuízos de quaisquer natureza causados ao patrimônio da contratante ou de terceiros, decorrentes direta ou indiretamente da execução do contrato, por negligência, imprudência ou imperícia dos funcionários, prepostos ou representantes da contratada, a preços atualizados, dentro do prazo de [incluir texto] (valor por extenso automático) dias, contados a partir da comprovação de sua responsabilidade.
	7.8. Substituir, sempre que exigido pela contratante, independentemente de justificativa por parte desta, qualquer funcionário cuja atuação, permanência ou comportamento, sejam julgados prejudiciais, inconvenientes ou insatisfatórios à disciplina da contratante ou ao interesse do serviço público.
	7.9. Assumir a responsabilidade por todas as providências e obrigações estabelecidas na legislação de acidentes de trabalho, quando na sua ocorrência, forem vítimas os seus funcionários ou terceiros, no desempenho dos serviços ou em conexão com eles, ainda que ocorrido nas dependências da contratante.
	7.10. Indicar preposto que responderá junto à contratante, pela perfeita execução do fornecimento, e realizará a interlocução entre a Contratante e a Contratada.
	7.11. Manter, durante a vigência do contrato, as mesmas condições de habilitação e qualificação exigidos na licitação, nos termos do art. 55 inciso XIII, da lei nº 8.666/93.
	7.12. Não transferir a outrem, no todo ou em parte, o presente contrato, sem a prévia e expressa anuência da contratante.
	7.13. A contratada se obriga a fornecer os produtos obedecendo às disposições contidas no edital, e somente poderá efetuar modificações que tenham sido prévia e expressamente aprovadas pela contratante.
	7.14. Nenhuma alteração ou modificação de forma, qualidade ou quantidade do objeto poderá ser feita pela contratada, podendo, entretanto, a contratante determinar modificações recomendáveis, desde que justificadas nos, nos termos da lei nº 8.666/93.

	8. DAS OBRIGAÇÕES DA CONTRATANTE
	8.1. Acompanhar e fiscalizar a execução do contrato e atestar as faturas, conforme previsto no artigo 67 da Lei 8.666/93.
	8.2. Receber os materiais, fazer a conferência e, quando atenderem ao objeto licitado, aprová-los, guardando-os adequadamente.
	8.3. Liquidar o empenho e efetuar o pagamento das faturas da contratada dentro dos prazos e condições pactuados.
	8.4. Proporcionar todas as facilidades para que a contratada possa desempenhar seus serviços dentro das condições estabelecidas.
	8.5. Rejeitar, no todo ou em parte, os serviços e materiais entregues em desacordo com as obrigações assumidas pela empresa contratada.
	8.6. Recusar Notas Fiscais ou Faturas que estejam em desacordo com as exigências editalícias, informando à contratada e sobrestando o pagamento até a regularização da condição.
	8.7. Relacionar-se com a contratada através de servidor designado pela contratante, Fiscal do Contrato, o qual acompanhará e fiscalizará a execução do objeto contratado, verificando os aspectos quantitativos e qualitativos, anotando em registro próprio as falhas porventura detectadas, comunicando à contratada as ocorrências de quaisquer fatos que, a seu critério, exijam medidas saneadoras.

	9. DO PRAZO CONTRATUAL
	9.1. O prazo de vigência do contrato terá início na data de sua assinatura, e término em [incluir texto], podendo ser prorrogado, de acordo com o disposto no artigo 57 da Lei federal nº 8.666/93, com suas alterações posteriores.

	10. DOS ACRÉSCIMOS E SUPRESSÕES
	10.1. A contratada ficará obrigada a aceitar, nas mesmas condições contratuais, acréscimos ou supressões que se fizerem necessários no quantitativo do objeto contratado, até o limite de 25% (vinte e cinco por cento) do valor inicial atualizado do contrato.
	10.2. É facultada a supressão além do limite acima estabelecido, mediante acordo entre as partes.

	11. DA AMOSTRA
	11.1. PARA APRESENTAÇÃO DE AMOSTRAS FORA DA SESSÃO PÚBLICA:
	11.1.1. Após a apuração da melhor proposta, a sessão será suspensa para que as empresas classificadas apresentem as amostras, fichas técnicas ou prospectos detalhados dos seguintes itens, para análise técnica: [incluir texto].
	11.1.2. As amostras, fichas técnicas ou prospectos detalhados serão analisados por servidor(es) designado(s) pelo órgão solicitante.
	11.1.3. Nenhuma amostra, ficha técnica ou prospecto detalhado será recebido sem a presença de um representante da licitante, nem fora do horário estipulado.
	11.1.4. A licitante poderá apresentar apenas 01 (uma) amostra, ficha técnica ou prospecto detalhado de cada item cotado. Não serão aceitas eventuais complementações, ajustes, modificações ou substituições na amostra, ficha técnica ou prospecto detalhado apresentado.
	11.1.5. As amostras, fichas técnicas ou prospectos detalhados não poderão ser entregues em outro local, sob pena de não serem aceitos pelo órgão solicitante.
	11.1.6. As marcas e especificações das amostras, fichas técnicas ou prospectos detalhados deverão estar em conformidade com a proposta apresentada na sessão pública.
	11.1.7. O agendamento para a apresentação das amostras, fichas técnicas ou prospectos detalhados, bem como da reabertura da sessão serão determinados pelo Pregoeiro.
	11.1.8. – Caso a amostra, ficha técnica ou prospecto detalhado da empresa que ofertou o menor preço não seja compatível com o objeto da licitação, será convocada a empresa subsequente, na ordem de classificação, para apresentação de amostra, ficha técnica ou prospecto detalhado.
	11.1.9. A amostra, ficha técnica ou prospecto detalhado da empresa contratada ficará retido até a entrega total do objeto licitado para aferição e comparação com os produtos entregues, quando será descartado ou devolvido ao fornecedor.
	11.2. PARA APRESENTAÇÃO DE AMOSTRAS NA PRÓPRIA SESSÃO PÚBLICA:
	11.2.1. Após a apuração da melhor proposta, na mesma sessão pública, as empresas classificadas deverão apresentar amostras, fichas técnicas ou prospectos detalhados, dos seguintes itens, para análise técnica: [incluir texto].
	11.2.2. As amostras, fichas técnicas ou prospectos detalhados, serão analisadas por servidor(es) designado(s) pelo órgão solicitante, os quais emitirão, na própria sessão, parecer técnico dos produtos apresentados.
	11.2.3. A licitante poderá apresentar apenas 01 (uma) amostra, ficha técnica ou prospecto detalhado de cada item cotado. Não serão aceitas eventuais complementações, ajustes, modificações ou substituições na amostra, ficha técnica ou prospecto detalhado apresentado.
	11.2.4. As amostras, fichas técnicas ou prospectos detalhados não poderão ser entregues em outro momento ou outro local, sob pena de não serem aceitos pelo órgão solicitante.
	11.2.5. As marcas e especificações das amostras, fichas técnicas ou prospectos detalhados deverão estar em conformidade com a proposta apresentada na sessão pública.
	11.2.6. Caso a amostra, ficha técnica ou prospecto detalhado da empresa que ofertou o menor preço não seja compatível com o objeto da licitação, será convocada a empresa subsequente, na ordem de classificação, para apresentação de amostra, ficha técnica ou prospecto detalhado.
	11.2.7. A amostra, ficha técnica ou prospecto detalhado da empresa contratada ficará retido até a entrega total do objeto licitado, para aferição e comparação com os produtos entregues, quando será descartado ou devolvido ao fornecedor.

	12. DA GARANTIA DO OBJETO
	12.1. O prazo mínimo de garantia exigido para os bens a serem adquiridos obedecerá a tabela abaixo:
	12.1.1. Para os itens [incluir texto], será exigida a garantia mínima de [incluir texto] (valor por extenso automático) meses, contados a partir da data de emissão da nota fiscal, contra defeitos de fabricação.
	12.1.2. Para os itens [incluir texto], será exigida a garantia mínima de [incluir texto] (valor por extenso automático) meses, contados a partir da data de emissão da nota fiscal, contra defeitos de fabricação.
	...
	12.2. A contratada ficará obrigada, durante todo o período de garantia, caso os bens apresentem defeitos, a substituí-los por outros novos, e com as mesmas especificações. No caso de os produtos a serem substituídos não serem mais produzidos, fica a contratada obrigada a promover a substituição por bens tecnologicamente equivalentes ou superiores, sem nenhum ônus para a contratante.

	13. DA FISCALIZAÇÃO
	13.1. A execução do contrato será acompanhada e fiscalizada pela contratante, por intermédio de responsável especialmente designado.
	13.2. Cabe ao fiscal do contrato fiscalizar, acompanhar e verificar sua perfeita execução, em todas as fases, até o recebimento do objeto, competindo-lhe, primordialmente, sob pena de responsabilidade:
	13.2.1. Anotar, em registro próprio, as ocorrências relativas à execução do contrato, determinando as providências necessárias à correção das falhas ou defeitos observados;
	13.2.2. Transmitir ao contratado instruções e comunicar alterações de prazos, cronogramas de execução e especificações do projeto, quando for o caso;
	13.2.3. Dar imediata ciência aos seus superiores e ao órgão central de controle, acompanhamento e avaliação financeira de contratos e convênios dos incidentes e ocorrências da execução que possam acarretar a imposição de sanções ou a rescisão contratual;
	13.2.4. Adotar, junto a terceiros, as providências necessárias para a regularidade da execução do contrato;
	13.2.5. Promover, com a presença do contratado, a verificação dos fornecimentos já efetuados, emitindo a competente habilitação para o recebimento de pagamentos;
	13.2.6. Esclarecer prontamente as dúvidas do contratado, solicitando ao setor competente da Administração, se necessário, parecer de especialistas;
	13.2.7. Fiscalizar a obrigação do contratado de manter, durante toda a execução do contrato, em compatibilidade com as obrigações assumidas, as condições de habilitação e qualificação exigidas na licitação, bem como o regular cumprimento das obrigações trabalhistas e previdenciárias;
	13.2.8. Aplicar multa, suspender o pagamento, caso a contratada desobedeça a quaisquer das Cláusulas estabelecidas no Edital;
	13.2.9. Expedir, por escrito, as comunicações dirigidas à contratada.
	13.3. O fiscal do contrato poderá, se necessário, sustar ou recusar qualquer recebimento de produtos que estejam em desacordo com o edital de licitação.
	13.4. A fiscalização não exclui nem reduz a responsabilidade da contratada pelos danos causados ao contratante ou a terceiros, resultantes de ação ou omissão culposa ou dolosa de qualquer de seus funcionários, prepostos ou representantes.

	14. DA QUALIFICAÇÃO TÉCNICA
	14.1. Para fins de comprovação de qualificação técnica, exigir-se-á dos interessados, a seguinte documentação: 
	14.1.1. Atestado de Capacidade Técnica, expedido por pessoa jurídica de direito público ou privado, que comprove já haver fornecido bens compatíveis ao objeto licitado.

									  </textarea>




	                               </div>
	                               <div class="step-actions">
	                                  <button class="waves-effect waves-dark btn teal lighten-2 next-step">SALVAR</button>   
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
							var item_tr='<p id="input_'+codigo+'" style="margin-bottom: 1em"><input name="tr_escolhido" type="radio" id="'+codigo+'" value="'+codigo+'"  class="validate radio_TR" required  /><label for="'+codigo+'">'+nome+'</label></p>';		
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
						 item += '	    <td><b>' + data.codigo + '</b><br><center><a  id="' + data.idItem + '" class="excluir_item tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir item do evento" href={{url("cliente/eventos/itens/deletar")}}/' + data.idItem + '  onclick="return false;"><i class="material-icons red-text">delete_forever</i></a></center></td>';
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
									     var item_tr='<p id="input_'+this.codigo+'" style="margin-bottom: 1em"><input name="tr_escolhido" type="radio" id="'+this.codigo+'" value="'+this.codigo+'"  class="validate radio_TR" required  /><label for="'+this.codigo+'">'+this.nome+'</label></p>';		
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


	     
        
    $('.save-step').on('click',function(e){
      console.log('salvar step');
             $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              e.preventDefault(e);
              $.ajax({
                  type:"POST",
                  url:'{{route("cliente.eventos.atualizar",$registro->id)}}',
                  data:$('#frm_evento').serialize(),
                  dataType: 'json',
                  cache: false,
                  processData: false,
                  success: function(data){                    
                    var $toastContent = $('<span>ETAPA SALVA COM SUCESSO</span>').add($('<button onclick="Materialize.Toast.removeAll();" class="btn-flat toast-action">X</button>'));
                    Materialize.toast($toastContent, 10000);                    
                    //console.log('atualizado com sucesso');
                    //console.log(data);
                  },
                  error: function(data){   }
              })
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



