<div class="row">
	
	<div class="col s7 m7">


		<div class="input-field">
			<input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
			<label>NOME</label>
		</div>

		<div class="input-field">
			<input type="text" name="cod" value="{{isset($registro->cod) ? $registro->cod : ''}}">
			<label>CÓDIGO</label>
		</div>

		<div class="input-field">
			<select name="categoria">
		      <!--<option value="" disabled selected>Escolha uma opção</option>-->
	          <option selected="" value="MATERIAL EXPEDIENTE">MATERIAL EXPEDIENTE</option>
	          <option value="MATERIAL DE CONSUMO">MATERIAL DE CONSUMO</option>
	          <option value="MATERIAL PERMANENTE">MATERIAL PERMANENTE</option>
	          <option value="SERVIÇOS">SERVIÇOS</option>
	          <option value="OBRAS E SERVIÇOS DE ENGENHARIA">OBRAS E SERVIÇOS DE ENGENHARIA</option>
	          <option value="LOCAÇÕES DIVERSAS">LOCAÇÕES DIVERSAS</option>
	          <option value="SERVIÇOS E PEÇAS">SERVIÇOS E PEÇAS</option>
	          <option value="MATERIAL PERMANENTE E SERVIÇOS">MATERIAL PERMANENTE E SERVIÇOS</option>
		    </select>
			<label>CATEGORIA</label>
		</div>

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

	<div class="col s7 m7">

	</div>

</div>

