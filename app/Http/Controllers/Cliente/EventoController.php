<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Edital;
use App\Evento;
use App\EventoItem;
use App\Orcamento;
use App\Orgao;
use App\Fiscal;
use App\Pregoeiro;
use App\Modalidade;
use App\TermoReferencia;
use App\Documento;
use Auth;

class EventoController extends Controller
{
    public function index(){

        // $registros = Evento::WHERE('id_usuario', Auth::user()->id )->get();
         //$registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE('eventos.id_usuario', Auth::user()->id )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);



    	return view('cliente.eventos.index', compact('registros'));
    }

    public function fase_inicial(){

        //$registros = Evento::WHERE('id_usuario', Auth::user()->id )->get();
        


        if(Auth::user()->id_usuario==0){
            $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);  


        }else{

            $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id_usuario] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);  

            $users = Auth::user()->select('id')->where('id',Auth::user()->id)->get() ; 

            //dd( $users);
            //foreach($users as $user) { 
            //    $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id_usuario] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);      
            //}



       }




        return view('cliente.eventos.fase_inicial', compact('registros'));
    }

    public function fase_final(){


        //$registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);
        if(Auth::user()->id_usuario==0){
            $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);  
        }else{

             $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id_usuario] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);  
           // $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            //foreach($users as $user) { 
            //    $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);
            //}

       }

        return view('cliente.eventos.fase_final', compact('registros'));
    }

    public function concluidos(){

        //$registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',1] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);
        if(Auth::user()->id_usuario==0){
            $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',1] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);  
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) { 
               $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',1] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);
            }

       }

        return view('cliente.eventos.concluidos', compact('registros'));
    }

    public function fase_inicial_editar($id){

        /*
        // pega evento fase inicial
        */
        $registro = Evento::find($id);
       
        /*
        // pega orgãos, fiscais, modalidade e itens dos eventos
        */
        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }
        }
        if(Auth::user()->id_usuario==0){   
            $fiscais = Fiscal::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $fiscais = Fiscal::WHERE('id_usuario', $user->id)->get();
            }
        }

        if(Auth::user()->id_usuario==0){   
            $pregoeiros = Pregoeiro::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $pregoeiros = Pregoeiro::WHERE('id_usuario', $user->id)->get();
            }
        }

        $modalidades = Modalidade::all();

        /*
        // pega itens desse evento
        */
        $eventos_itens = EventoItem::join('itens', 'itens.id', '=', 'eventos_itens.id_item')->WHERE([['id_evento',$id], ['eventos_itens.id_usuario', Auth::user()->id] ])->orderBy('eventos_itens.id', 'DESC')->get(['eventos_itens.id AS idItem', 'itens.*', 'eventos_itens.*']);
        //dd($eventos_itens);
        $Count = $eventos_itens->count();


        /*
        // pega orçamentos
        */
        $dados_orcamentos = Orcamento::select('id','orgao','valor','id_item')->orderBy('valor');
        $x=1;
        foreach ($eventos_itens as $evento_item ) {
             // ->where('field_1', red_1); // Desired output

            if($evento_item->codigo<>''){
                if($x==1){  
                //dd();       
                    $dados_orcamentos->Where("id_item",$evento_item->codigo);
                }else{
                    $dados_orcamentos->orWhere("id_item",$evento_item->codigo);
                }
                $x++;
            }
        }
        $orcamentos = $dados_orcamentos->get();

        //dd($orcamentos);
        /*
        // pega lista de todos TRS
        */
        $lista_trs= TermoReferencia::all(array('codigo','nome'));
        $list = array();        
        //$list2 = array(); 
        if($Count>0){
            foreach($eventos_itens as $evento_item) {
                if ($evento_item->trs != ""){
                    //$arrayItens = array();
                    $arryItemCode  = array();
                    foreach(explode(',', $evento_item->trs) as $tr) {  
                        if($lista_trs->where( 'codigo' , '=' , $tr )){
                            foreach($lista_trs as $item_tr) {
                                if($item_tr->codigo == $tr){
                                    // cria o array list para fazer interceção (osório pediu pra remover função )               
                                     array_push($arryItemCode, $item_tr->codigo);
                                    // cria lista para fazer união de array ( nova função pedida pelo osório )
                                    //$list2[] = $item_tr->codigo;
                                }
                            }
                       }
                    }
                    // cria o array list para fazer interceção (osório pediu pra remover função )
                      $list[] = $arryItemCode;
                }
            }
        }
        
        /*
        // pega o array e faz a interceção (osório pediu pra remover função )
        */
        $sizeList=sizeof($list);
        switch ($sizeList) {
            case 0:
                $intersect = ''; 
                break;
            case 1:
                $intersect =$list[0];
                break;
            case ($sizeList>1):
                $intersect = call_user_func_array('array_intersect',$list); 
                break;
           
            default:
                $intersect ='';
        }


        /*$input='1. DO OBJETO
1.1. O presente processo tem por objeto: {{OBJETO}}
2. JUSTIFICATIVA
2.1. {{JUSTIFICATIVA}}
3. CLASSIFICAÇÃO DOS BENS COMUNS
3.1. Os bens a serem adquiridos enquadram-se na classificação de bens comuns, nos termos do parágrafo único do art. 1º, da Lei n° 10.520, de 2002.
4. ESPECIFICAÇÃO DO OBJETO E ESTIMATIVA DE PREÇOS
4.1. {{LISTA_ITENS}}        
4.2. O valor total estimado para a aquisição dos produtos a serem licitados é de R$ {{VALOR_ESTIMADO}} ({{VALOR_ESTIMADO_EXTENSO}}).
4.3. Os preços apresentados na proposta devem incluir todos os custos e despesas, tais como: custos diretos e indiretos, seguros, carga, transporte, descarga, embalagens, tributos, vencimentos e vantagens, encargos sociais e trabalhistas, lucros e ainda todas as despesas que direta ou indiretamente incidirem sobre o fornecimento dos produtos.
4.3.1 O valor total estimado para a aquisição dos produtos a serem licitados é de R$ {{VALOR_ESTIMADO}} ({{VALOR_ESTIMADO_EXTENSO}}).
4.3.2 Os preços apresentados na proposta devem incluir todos os custos e despesas, tais como: custos diretos e indiretos, seguros, carga, transporte, descarga, embalagens, tributos, vencimentos e vantagens, encargos sociais e trabalhistas, lucros e ainda todas as despesas que direta ou indiretamente incidirem sobre o fornecimento dos produtos.
4.4. Os preços serão fixos e irreajustáveis até a data do término do fornecimento dos produtos.
4.5. Os preços, excepcionalmente, poderão ser revistos, para mais ou para menos, na superveniência de legislação federal, estadual ou municipal, ou de ato, ou de fato que altere ou modifique as relações que as partes pactuaram inicialmente, de forma a manter o equilíbrio econômico e financeiro do contrato.
4.6. A proposta de preços deverá apresentar validade mínima de 60 (sessenta) dias corridos, contados a partir da data da sua apresentação.';
*/


    /*$registro->termo_referencia = preg_replace_callback("#^([0-9.]*).*$#m",function($m){
            $m[0]=substr($m[0],strlen($m[1])+1);
            static $r=0;
            $o='';
            $l=preg_match_all("#\d+#",$m[1],$n);
            while($l < $r)
            {
                $r--;
                $o .= '</li></ol>';
            }
            if($l == $r)return $l == 0?$o.$m[0]:$o.'</li><li>'.$m[0];
            else $o=$m[0];
            while($l > $r)
            {
                $r++;
                $o = '<ol><li>'.$o;
            }
            return $o;
        }, $input);*/



        // remove repetidos do array ( nova função pedida pelo osório )
        // $intersect = array_unique($list2);


        /*
        // pega TR escolhido e monta as variáveis para revisão
        
        $termo_referencia_revisado=$registro['termo_referencia'];

        
        // pega VALOR TOTAL DO EVENTO
        
        $valor_estimado = EventoItem::where('id_evento',$id)->sum('valor_total');
        $valor_estimado=number_format($valor_estimado, 2, ',', '.');



        foreach($orgaos as $orgao)    {                
           if (isset($registro->id_orgao)){
                if ($registro->id_orgao == $orgao->id){
                    $ORGAO_SOLICITANTE = $orgao->nome ;
                }
            } 
        }


        $substituicao = array(
            '{{ORGAO_SOLICITANTE}}' => $ORGAO_SOLICITANTE,
            '{{OBJETO}}' => $registro['objeto'],
            '{{JUSTIFICATIVA}}' => $registro['justificativa'],
            '{{DOTACAO_ORCAMENTARIA}}' => $registro['dotacao_orcamentaria'],

            // DADOS SOBRE OS ITENS
            '{{VALOR_ESTIMADO}}' => $valor_estimado
        );
        $termo_referencia_revisado = strtr($termo_referencia_revisado, $substituicao);
        */

        $termo_referencia_revisado = $this->montar_tr($id,false);


        //dd($termo_referencia_revisado);


        /*
        // mostra view
        */
        return view('cliente.eventos.fase_inicial_editar', compact('registro','orgaos','fiscais','pregoeiros','modalidades','eventos_itens','Count','lista_trs','intersect','termo_referencia_revisado','orcamentos'));

    }

    public function montar_tr($id,$print=true){
        // pega evento fase inicial
        $registro = Evento::find($id);

        /*
        // pega orgãos, fiscais, modalidade e itens dos eventos
        */
        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }
        }


        /*
        // pega TR escolhido e monta as variáveis para revisão
        */
        $termo_referencia_revisado=$registro['termo_referencia'];
        if($print==true){
            //$termo_referencia_revisado=nl2br($termo_referencia_revisado);
            //$termo_referencia_revisado=htmlentities($termo_referencia_revisado);
            //$termo_referencia_revisado=html_entity_decode($termo_referencia_revisado);
        }


        /*
        // pega VALOR TOTAL DO EVENTO
        */
        $valor_estimado = EventoItem::where('id_evento',$id)->sum('valor_total');
        $valor_estimado_extenso=$this->valorPorExtenso($valor_estimado);
        $valor_estimado=number_format($valor_estimado, 2, ',', '.');

         /*
        // pega ITENS desse evento
        */
        $itens = EventoItem::join('itens', 'itens.id', '=', 'eventos_itens.id_item')->WHERE([['id_evento',$id], ['eventos_itens.id_usuario', Auth::user()->id] ])->get();
        $Count = $itens->count();
        $lista_itens='<table style="font-size:10px">';
        //dd($itens);
         $lista_itens.='<thead><tr><td colspan="5" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;"></tr><tr><th>ITEM</th><th>DESCRIÇÃO</th><th>QTDE</th><th>VAL.UNIT.</th><th>VAL.TOTAL.</th></tr></thead><tbody>' ; 
        if($Count>0){
          foreach($itens as $item){
                $lista_itens.='<tr><td>'.$item->codigo .'</td><td>'.$item->descricao .'</td><td>'.$item->qtde .'</td><td>R$ '. number_format($item->valor_unitario, 2, ',', '.') .'</td><td>R$ '. number_format($item->valor_total, 2, ',', '.').'</td></tr>' ; 
          }
        }else{
               $lista_itens='NENHUM ITEM ADICIONADO';
        }
        $lista_itens.='<tr><td colspan="5" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;">TOTAL:&nbsp;&nbsp; R$ '.$valor_estimado.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</tr>';
        $lista_itens.='</tbody></table>';


        /*
        // loop nos orgãos para pegar nome do orgão escolhido
        */
        foreach($orgaos as $orgao)    {                
           if (isset($registro->id_orgao)){
                if ($registro->id_orgao == $orgao->id){
                    $ORGAO_SOLICITANTE = $orgao->nome ;
                }
            } 
        }

        /*
        // faz a substitutição das variaveis no TR para revisão
        */
        $substituicao = array(
            '{{ORGAO_SOLICITANTE}}' => $ORGAO_SOLICITANTE,
            '{{OBJETO}}' => $registro['objeto'],
            '{{JUSTIFICATIVA}}' => $registro['justificativa'],
            '{{DOTACAO_ORCAMENTARIA}}' => $registro['dotacao_orcamentaria'],

            // DADOS SOBRE OS ITENS
            //'{{LISTA_ITENS}}' => $lista_itens,
            '{{VALOR_ESTIMADO}}' => $valor_estimado,
            '{{VALOR_ESTIMADO_EXTENSO}}' => $valor_estimado_extenso
        );
        $termo_referencia_revisado = strtr($termo_referencia_revisado, $substituicao); 


        // mostra view
        return $termo_referencia_revisado;

    }

    public function gerarDocumento($id, $documento)
    {

        /*
        // pega EVENTOS
        */

        $registro = Evento::find($id);

        /*
        // pega ORGÃOS
        */

        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }
        }
        foreach($orgaos as $orgao)    {                
           if (isset($registro->id_orgao)){
                if ($registro->id_orgao == $orgao->id){
                    $ORGAO_SOLICITANTE = $orgao->nome ;
                    $ENDERECO_ORGAO_SOLICITANTE = $orgao->endereco ;
                    $CNPJ_ORGAO_SOLICITANTE = $orgao->cnpj ;
                    $NOME_ORDENADOR_DESPESA = $orgao->ordenador_nome ;
                    $CARGO_ORDENADOR_DESPESA = $orgao->ordenador_cargo ;
                    $NOME_PREGOEIRO = $orgao->pregoeiro_nome ;
                    $ATO_DESIGNACAO = $orgao->ato_designacao ;
                    $NOME_DIRIGENTE = $orgao->dirigente_nome ;
                    $CARGO_DIRIGENTE = $orgao->dirigente_tipo ;
                    $CPF_DIRIGENTE = $orgao->dirigente_cpf ;

                }
            } 
        }
        /*if(Auth::user()->id_usuario==0){   
            $fiscais = Fiscal::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $fiscais = Fiscal::WHERE('id_usuario', $user->id)->get();
            }
        }
        $modalidades = Modalidade::all();
        */

        /*
        // pega MODALIDADE
        */
        $modalidade = Modalidade::find($registro->id_modalidade); 


        /*
        // pega VALOR TOTAL DO EVENTO
        */
        //$valor_estimado = EventoItem::where('id_evento',$id)->sum('valor_total');
        //$valor_estimado=number_format($valor_estimado, 2, ',', '.');

        //dd($valor_total);



        /*
        // pega VALOR TOTAL DO EVENTO
        */
        $valor_estimado = EventoItem::where('id_evento',$id)->sum('valor_total');
        $valor_estimado_extenso=$this->valorPorExtenso($valor_estimado);
        $valor_estimado=number_format($valor_estimado, 2, ',', '.');

         /*
        // pega ITENS desse evento
        */
        $itens = EventoItem::join('itens', 'itens.id', '=', 'eventos_itens.id_item')->WHERE([['id_evento',$id], ['eventos_itens.id_usuario', Auth::user()->id] ])->get();
        $Count = $itens->count();
        $lista_itens='<table style="font-size:10px">';
        //dd($itens);
         $lista_itens.='<thead><tr><td colspan="5" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;"></tr><tr><th>ITEM</th><th>DESCRIÇÃO</th><th>QTDE</th><th>VAL.UNIT.</th><th>VAL.TOTAL.</th></tr></thead><tbody>' ; 
        if($Count>0){
          foreach($itens as $item){
                $lista_itens.='<tr><td>'.$item->codigo .'</td><td>'.$item->descricao .'</td><td>'.$item->qtde .'</td><td>R$ '. number_format($item->valor_unitario, 2, ',', '.') .'</td><td>R$ '. number_format($item->valor_total, 2, ',', '.').'</td></tr>' ; 
          }
        }else{
               $lista_itens='NENHUM ITEM ADICIONADO';
        }
        $lista_itens.='<tr><td colspan="5" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;">TOTAL:&nbsp;&nbsp; R$ '.$valor_estimado.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</tr>';
        $lista_itens.='</tbody></table>';


        //dd($itens);


        $documento = Documento::SELECT('documento')->WHERE('id', $documento)->firstOrFail();
        $documento_pdf=$documento->documento;

        $documento_pdf=nl2br($documento->documento);
        $documento_pdf=htmlentities($documento_pdf);
        $documento_pdf=html_entity_decode($documento_pdf);

        /* 

        $documentos = Documento::SELECT('documento')->WHERE('fase','1')->get();
        //dd($documentos);
        $documento_pdf='';
        foreach ($documentos as $documentos_item) {
           // echo $documentos_item->documento;
            $documento_pdf.=$documentos_item->documento;
        }

        //dd($documento_pdf);
        //$documento_pdf=$documento->documento;

        $documento_pdf=nl2br($documento_pdf);
        $documento_pdf=htmlentities($documento_pdf);
        $documento_pdf=html_entity_decode($documento_pdf);

        */


        /*
        // pega ORÇAMENTOS SELECINADOS desse evento
        */


         /*
        // pega orçamentos
        */
        $dados_orcamentos = Orcamento::select('id','item','identificacao_compra', 'numero_item','modalidade','unidade','qtde','fornecedor','valor','unidade_gestora','data_compra','id_item');
        $x=1;
        foreach ($itens as $item ) {
             // ->where('field_1', red_1); // Desired output

            if($item->cotacoes<>''){




                $array  = explode(',', $item->cotacoes);
                $arrayLimpo = array_filter($array);
                //dd($arrayLimpo);



                foreach ($arrayLimpo as &$value) {
                   // $value = $value * 2;

                    if($x==1){  
                    //dd();       
                        $dados_orcamentos->Where("id",$value);
                    }else{
                        $dados_orcamentos->orWhere("id",$value);
                    }
                    $x++;
                }



                
            }
        }

       // dd($dados_orcamentos);
        $orcamentos = $dados_orcamentos->get();

       // dd($orcamentos);

        $CountOrcamentos = $orcamentos->count();
        $lista_orcamentos='<table style="font-size:10px">';
        //dd($itens);
         $lista_orcamentos.='<thead><tr><td colspan="10" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;"></tr><tr><th>DESCRIÇÃO</th><th>IDENTIFICAÇÃO DA COMPRA</th>
         <th>N. DO ITEM</th><th>MODALIDADE</th><th>UNID.</th><th>QTDE</th><th>VALOR UNIT.</th><th>FORNECEDOR</th><th>UASG</th><th>DATA DA COMPRA</th></tr></thead><tbody>' ; 
        if($CountOrcamentos>0){
          foreach($orcamentos as $orcamento){
                $lista_orcamentos.='<tr><td>';

                
                $lista_orcamentos.=$orcamento->item;
                /*foreach ($itens as $item ) {
                    //if($item->id==$orcamento->id_item){
                    if (preg_match(','.$orcamento->id.',', $item->cotacoes)) {
                          $lista_orcamentos.=$item->descricao;
                    }
                }*/
              
                $lista_orcamentos.='</td><td>'.$orcamento->identificacao_compra .'</td><td>'.$orcamento->numero_item .'</td><td>'.$orcamento->modalidade .'</td><td>'.$orcamento->unidade .'</td><td>'.$orcamento->qtde .'</td><td>'.number_format($orcamento->valor, 2, ',', '.')  .'</td><td>'.$orcamento->fornecedor .'</td><td>R$ '.$orcamento->unidade_gestora .'</td><td>'. date('d/m/Y', strtotime($orcamento->data_compra)).'</td></tr>' ; 
          }
        }else{
               $lista_orcamentos='NENHUM ORÇAMENTO ADICIONADO';
        }
        //$lista_orcamentos.='<tr><td colspan="5" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;">TOTAL:&nbsp;&nbsp; R$ '.$valor_estimado.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</tr>';
        $lista_orcamentos.='</tbody></table>';

        //DD($lista_orcamentos);


       /* $itens = EventoItem::join('itens', 'itens.id', '=', 'eventos_itens.id_item')->WHERE([['id_evento',$id], ['eventos_itens.id_usuario', Auth::user()->id] ])->get();
        $Count = $itens->count();
        $lista_itens='<table style="font-size:10px">';
        //dd($itens);
         $lista_itens.='<thead><tr><td colspan="5" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;"></tr><tr><th>ITEM</th><th>DESCRIÇÃO</th><th>QTDE</th><th>VAL.UNIT.</th><th>VAL.TOTAL.</th></tr></thead><tbody>' ; 
        if($Count>0){
          foreach($itens as $item){
                $lista_itens.='<tr><td>'.$item->codigo .'</td><td>'.$item->descricao .'</td><td>'.$item->qtde .'</td><td>R$ '. number_format($item->valor_unitario, 2, ',', '.') .'</td><td>R$ '. number_format($item->valor_total, 2, ',', '.').'</td></tr>' ; 
          }
        }else{
               $lista_itens='NENHUM ITEM ADICIONADO';
        }
        $lista_itens.='<tr><td colspan="5" align="right"><hr style="height:1px;border:none;color:#333;background-color:#333;">TOTAL:&nbsp;&nbsp; R$ '.$valor_estimado.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</tr>';
        $lista_itens.='</tbody></table>';

        */


        /*
        // FAZ SUBSTITUIÇÃO DAS VARIAVEIS
        */
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');
        
        $date = date('Y-m-d');
        $data_atual = strftime("%d de %B de %Y", strtotime($date));//date("d/m/Y");
        $substituicao = array(
            // LOCAL E DATA
            '{{LOCAL_DATA}}' => Auth::user()->cidade.', '.$data_atual,

            // CS (ORGÃO SOLICITANTE)
            '{{ORGAO_SOLICITANTE}}' => $ORGAO_SOLICITANTE,
            '{{CNPJ_ORGAO_SOLICITANTE}}' => $CNPJ_ORGAO_SOLICITANTE,
            '{{ENDERECO_ORGAO_SOLICITANTE}}' => $ENDERECO_ORGAO_SOLICITANTE,
            '{{NOME_ORDENADOR_DESPESA}}' => $NOME_ORDENADOR_DESPESA,
            '{{CARGO_ORDENADOR_DESPESA}}' => $CARGO_ORDENADOR_DESPESA,
            '{{NOME_PREGOEIRO}}' => $NOME_PREGOEIRO,
            '{{ATO_DESIGNACAO}}' => $ATO_DESIGNACAO,
            '{{NOME_DIRIGENTE}}' => $NOME_DIRIGENTE,
            '{{CARGO_DIRIGENTE}}' => $CARGO_DIRIGENTE,
            '{{CPF_DIRIGENTE}}' => $CPF_DIRIGENTE,

            // DADOS SOBRE OS ITENS
            '{{LISTA_ITENS}}' => $lista_itens,
            '{{VALOR_ESTIMADO}}' => $valor_estimado,
            '{{VALOR_ESTIMADO_EXTENSO}}' => $valor_estimado_extenso,

            // DADOS SOBRE ORÇAMENTOS
            '{{LISTA_ORCAMENTOS}}' => $lista_orcamentos,

            // CL ( CADASTRO LICITAÇÃO )
            '{{OBJETO}}' => $registro['objeto'],
            '{{JUSTIFICATIVA}}' => $registro['justificativa'],
            '{{DOTACAO_ORCAMENTARIA}}' => $registro['dotacao_orcamentaria'],
            '{{NUMERO_PROCESSO}}' => $registro['processo'],
            '{{NUMERO_LICITACAO}}' => $registro['numero_licitacao'],
            '{{MODALIDADE}}' => $modalidade['nome'],
            '{{TIPO_JULGAMENTO}}' => $registro['tipo_julgamento']

            
        );
        $documento_pdf = strtr($documento_pdf, $substituicao); 


        //dd($documento_pdf);


        //return view('cliente.eventos.gerarDocumento', compact('documento_pdf'));

        return \PDF::loadView('cliente.eventos.gerarDocumento', compact('documento_pdf'))
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                    //->download('nome-arquivo-pdf-gerado.pdf');
                    ->stream();
                    //->save(‘path aqui’);
    }



    public function gerarDocumentos($id, $fase)
    {

        /*
        // pega EVENTOS
        */

        $registro = Evento::find($id);

        /*
        // pega ORGÃOS
        */

        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }
        }
        foreach($orgaos as $orgao)    {                
           if (isset($registro->id_orgao)){
                if ($registro->id_orgao == $orgao->id){
                    $ORGAO_SOLICITANTE = $orgao->nome ;
                    $ENDERECO_ORGAO_SOLICITANTE = $orgao->endereco ;
                    $CNPJ_ORGAO_SOLICITANTE = $orgao->cnpj ;
                    $NOME_ORDENADOR_DESPESA = $orgao->ordenador_nome ;
                    $CARGO_ORDENADOR_DESPESA = $orgao->ordenador_cargo ;
                    $NOME_PREGOEIRO = $orgao->pregoeiro_nome ;
                    $ATO_DESIGNACAO = $orgao->ato_designacao ;
                    $NOME_DIRIGENTE = $orgao->dirigente_nome ;
                    $CARGO_DIRIGENTE = $orgao->dirigente_tipo ;
                    $CPF_DIRIGENTE = $orgao->dirigente_cpf ;

                }
            } 
        }
        /*if(Auth::user()->id_usuario==0){   
            $fiscais = Fiscal::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $fiscais = Fiscal::WHERE('id_usuario', $user->id)->get();
            }
        }
        $modalidades = Modalidade::all();
        */

        /*
        // pega MODALIDADE
        */
        $modalidade = Modalidade::find($registro->id_modalidade); 


        /*
        // pega VALOR TOTAL DO EVENTO
        */
        $valor_estimado = EventoItem::where('id_evento',$id)->sum('valor_total');
        $valor_estimado=number_format($valor_estimado, 2, ',', '.');

        //dd($valor_total);



       /* $documento = Documento::SELECT('documento')->WHERE('id', $documento)->firstOrFail();
        $documento_pdf=$documento->documento;

        $documento_pdf=nl2br($documento->documento);
        $documento_pdf=htmlentities($documento_pdf);
        $documento_pdf=html_entity_decode($documento_pdf);

        */

        $documentos = Documento::SELECT('documento')->WHERE('fase',$fase)->get();
        //dd($documentos);
        $documento_pdf='';
        foreach ($documentos as $documentos_item) {
           // echo $documentos_item->documento;
            $documento_pdf.=$documentos_item->documento;
        }

        //dd($documento_pdf);
        //$documento_pdf=$documento->documento;

        $documento_pdf=nl2br($documento_pdf);
        $documento_pdf=htmlentities($documento_pdf);
        $documento_pdf=html_entity_decode($documento_pdf);



        /*
        // FAZ SUBSTITUIÇÃO DAS VARIAVEIS
        */
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');
        
        $date = date('Y-m-d');
        $data_atual = strftime("%d de %B de %Y", strtotime($date));//date("d/m/Y");
        $substituicao = array(
            // LOCAL E DATA
            '{{LOCAL_DATA}}' => Auth::user()->cidade.', '.$data_atual,

            // CS (ORGÃO SOLICITANTE)
            '{{ORGAO_SOLICITANTE}}' => $ORGAO_SOLICITANTE,
            '{{CNPJ_ORGAO_SOLICITANTE}}' => $CNPJ_ORGAO_SOLICITANTE,
            '{{ENDERECO_ORGAO_SOLICITANTE}}' => $ENDERECO_ORGAO_SOLICITANTE,
            '{{NOME_ORDENADOR_DESPESA}}' => $NOME_ORDENADOR_DESPESA,
            '{{CARGO_ORDENADOR_DESPESA}}' => $CARGO_ORDENADOR_DESPESA,
            '{{NOME_PREGOEIRO}}' => $NOME_PREGOEIRO,
            '{{ATO_DESIGNACAO}}' => $ATO_DESIGNACAO,
            '{{NOME_DIRIGENTE}}' => $NOME_DIRIGENTE,
            '{{CARGO_DIRIGENTE}}' => $CARGO_DIRIGENTE,
            '{{CPF_DIRIGENTE}}' => $CPF_DIRIGENTE,

            // DADOS SOBRE OS ITENS
            '{{VALOR_ESTIMADO}}' => $valor_estimado,

            // CL ( CADASTRO LICITAÇÃO )
            '{{OBJETO}}' => $registro['objeto'],
            '{{JUSTIFICATIVA}}' => $registro['justificativa'],
            '{{DOTACAO_ORCAMENTARIA}}' => $registro['dotacao_orcamentaria'],
            '{{NUMERO_PROCESSO}}' => $registro['processo'],
            '{{NUMERO_LICITACAO}}' => $registro['numero_licitacao'],
            '{{MODALIDADE}}' => $modalidade['nome'],
            '{{TIPO_JULGAMENTO}}' => $registro['tipo_julgamento']

            
        );
        $documento_pdf = strtr($documento_pdf, $substituicao); 


        //dd($documento_pdf);


        //return view('cliente.eventos.gerarDocumento', compact('documento_pdf'));

        return \PDF::loadView('cliente.eventos.gerarDocumento', compact('documento_pdf'))
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                    //->download('nome-arquivo-pdf-gerado.pdf');
                    ->stream();
                    //->save(‘path aqui’);
    }

    public function gerarEdital($id)
    {

        /*
        // pega EVENTOS
        */

        $registro = Evento::find($id);

        //dd($registro);
        //dd($minuta_edital_revisado);

        /*
        // pega ORGÃOS
        */

        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }
        }
        foreach($orgaos as $orgao)    {                
           if (isset($registro->id_orgao)){
                if ($registro->id_orgao == $orgao->id){
                    $ORGAO_SOLICITANTE = $orgao->nome ;
                    $ENDERECO_ORGAO_SOLICITANTE = $orgao->endereco ;
                    $CNPJ_ORGAO_SOLICITANTE = $orgao->cnpj ;
                    $NOME_ORDENADOR_DESPESA = $orgao->ordenador_nome ;
                    $CARGO_ORDENADOR_DESPESA = $orgao->ordenador_cargo ;
                    $NOME_PREGOEIRO = $orgao->pregoeiro_nome ;
                    $ATO_DESIGNACAO = $orgao->ato_designacao ;
                    $NOME_DIRIGENTE = $orgao->dirigente_nome ;
                    $CARGO_DIRIGENTE = $orgao->dirigente_tipo ;
                    $CPF_DIRIGENTE = $orgao->dirigente_cpf ;

                }
            } 
        }
        /*if(Auth::user()->id_usuario==0){   
            $fiscais = Fiscal::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $fiscais = Fiscal::WHERE('id_usuario', $user->id)->get();
            }
        }
        $modalidades = Modalidade::all();
        */

        /*
        // pega MODALIDADE
        */
        $modalidade = Modalidade::find($registro->id_modalidade); 


        /*
        // pega VALOR TOTAL DO EVENTO
        */
        $valor_estimado = EventoItem::where('id_evento',$id)->sum('valor_total');
        $valor_estimado=number_format($valor_estimado, 2, ',', '.');

        //dd($valor_total);

        $documento_pdf='';

        //$documento = Edital::SELECT('edital')->WHERE('id', $id_edital)->firstOrFail();
        //$documento_pdf=$documento->edital;

       $documento_pdf = $registro->minuta_edital;


        //dd($documento_pdf);


        /* INCLUIR ANEXOS NO EDITAL */

         $documentos = Documento::SELECT('documento')->WHERE('fase','1')->orderBy('ordem')->get();
        foreach ($documentos as $documentos_item) {
           // echo $documentos_item->documento;
            $documento_pdf.=$documentos_item->documento;
        }


        //dd($documento_pdf);


        $documento_pdf=nl2br($documento_pdf);
        $documento_pdf=htmlentities($documento_pdf);
        $documento_pdf=html_entity_decode($documento_pdf);





        /*
        // FAZ SUBSTITUIÇÃO DAS VARIAVEIS
        */
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');        
        $date = date('Y-m-d');
        $data_atual = strftime("%d de %B de %Y", strtotime($date));//date("d/m/Y");
        $data_abertura_sessao = strftime("%d de %B de %Y", strtotime($registro['data_abertura_sessao']));//date('d/m/Y', strtotime($registro['data_abertura_sessao']));
        $substituicao = array(

            // LOCAL E DATA
            '{{LOCAL_DATA}}' => Auth::user()->cidade.', '.$data_atual,

            // CS (ORGÃO SOLICITANTE)
            '{{ORGAO_SOLICITANTE}}' => $ORGAO_SOLICITANTE, //CS1
            '{{CNPJ_ORGAO_SOLICITANTE}}' => $CNPJ_ORGAO_SOLICITANTE, //CS3
            '{{ENDERECO_ORGAO_SOLICITANTE}}' => $ENDERECO_ORGAO_SOLICITANTE, // CS2
            '{{NOME_ORDENADOR_DESPESA}}' => $NOME_ORDENADOR_DESPESA,
            '{{CARGO_ORDENADOR_DESPESA}}' => $CARGO_ORDENADOR_DESPESA,
            '{{NOME_PREGOEIRO}}' => $NOME_PREGOEIRO,
            '{{ATO_DESIGNACAO}}' => $ATO_DESIGNACAO,
            '{{NOME_DIRIGENTE}}' => $NOME_DIRIGENTE,
            '{{CARGO_DIRIGENTE}}' => $CARGO_DIRIGENTE,
            '{{CPF_DIRIGENTE}}' => $CPF_DIRIGENTE,

            // DADOS SOBRE OS ITENS
            '{{VALOR_ESTIMADO}}' => $valor_estimado,

            // CL ( CADASTRO LICITAÇÃO )
            '{{OBJETO}}' => $registro['objeto'],
            '{{JUSTIFICATIVA}}' => $registro['justificativa'],
            '{{DOTACAO_ORCAMENTARIA}}' => $registro['dotacao_orcamentaria'],
            '{{NUMERO_PROCESSO}}' => $registro['processo'],
            '{{NUMERO_LICITACAO}}' => $registro['numero_licitacao'],
            '{{MODALIDADE}}' => $modalidade['nome'],
            '{{TIPO_JULGAMENTO}}' => $registro['tipo_julgamento'],

            '{{ENDERECO_ELETRONICO_EDITAL}}' => $registro['endereco_eletronico_edital'],
            '{{ENDERECO_FISICO_EDITAL}}' => $registro['endereco_fisico_edital'],
            '{{EMAIL_INFORMACOES}}' => $registro['email_informacoes'],
            '{{ENDERECO_CERTAME}}' => $registro['endereco_eletronico_conexao'],
            '{{DATA_ABERTURA_SESSAO}}' => $data_abertura_sessao,
            '{{HORA_ABERTURA_SESSAO}}' => date('H:i', strtotime($registro['hora_abertura_sessao']))

            
        );
        $documento_pdf = strtr($documento_pdf, $substituicao); 


        //dd($documento_pdf);


        //return view('cliente.eventos.gerarDocumento', compact('documento_pdf'));

        return \PDF::loadView('cliente.eventos.gerarDocumento', compact('documento_pdf'))
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                    //->download('nome-arquivo-pdf-gerado.pdf');
                    ->stream();
                    //->save(‘path aqui’);
    }

    public function gerarTermoReferencia($id)
    {

        /*
        // GERA PDF DO TERMO DE REFERENCIA
        */

        $termo_referencia_revisado = $this->montar_tr($id,true);


        
        return \PDF::loadView('cliente.eventos.gerarTermoReferencia', compact('termo_referencia_revisado'))
                        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                        ->setPaper('a4')
                        //->download('nome-arquivo-pdf-gerado.pdf');
                        ->stream();
                        //->save(‘path aqui’);
        
    }

    public function verTermoReferencia($id)
    {

        /*
        // GERA PDF DO TERMO DE REFERENCIA
        */

        $termo_referencia_revisado = $this->montar_tr($id,true);


        return view('cliente.eventos.gerarTermoReferencia', compact('termo_referencia_revisado'));
    
    }



    public function fase_final_editar($id){
        // pega evento fase inicial
        $registro = Evento::find($id);



        //dd($registro->itens_exclusivos_me_epp);
        //dd($registro->destinada_srp+$registro->exclusiva_me_epp+$registro->itens_exclusivos_me_epp);
        //dd($registro->destinada_srp.' - '.$registro->exclusiva_me_epp.'-'.$registro->itens_exclusivos_me_epp);

        // pega edital para download
        $edital = Edital::SELECT('id')->WHERE([['destinada_srp',$registro->destinada_srp],['exclusiva_me_epp',$registro->exclusiva_me_epp], ['exclusiva_itens_me_epp', $registro->itens_exclusivos_me_epp] ])->first();
        if($edital==null) dd('edital não existe, consultar administrador do sistema');


        //dd($edital);


        $modalidade=Modalidade::SELECT('licitacao_eletronica')->WHERE('id',$registro->id_modalidade)->first();
       // dd($modalidade->licitacao_eletronica);
        
        $licitacao_eletronica=$modalidade->licitacao_eletronica;

       

        // aqui estava montando o edital na hora de renderizar, acho que o certo é quando salvar o edital na etapa inicial, já renderizar e salvar renderizado
        $minuta_edital_revisado = $this->montarEdital($id);
        

        // mostra view
        return view('cliente.eventos.fase_final_editar', compact('registro','edital','licitacao_eletronica','minuta_edital_revisado'));

    }


     public function montarEdital($id)
    {

        /*
        // pega EVENTOS
        */

        $registro = Evento::find($id);

        //dd($registro);
        //dd($minuta_edital_revisado);

        /*
        // pega ORGÃOS
        */

        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }
        }
        foreach($orgaos as $orgao)    {                
           if (isset($registro->id_orgao)){
                if ($registro->id_orgao == $orgao->id){
                    $ORGAO_SOLICITANTE = $orgao->nome ;
                    $ENDERECO_ORGAO_SOLICITANTE = $orgao->endereco ;
                    $CNPJ_ORGAO_SOLICITANTE = $orgao->cnpj ;
                    $NOME_ORDENADOR_DESPESA = $orgao->ordenador_nome ;
                    $CARGO_ORDENADOR_DESPESA = $orgao->ordenador_cargo ;
                    $NOME_PREGOEIRO = $orgao->pregoeiro_nome ;
                    $ATO_DESIGNACAO = $orgao->ato_designacao ;
                    $NOME_DIRIGENTE = $orgao->dirigente_nome ;
                    $CARGO_DIRIGENTE = $orgao->dirigente_tipo ;
                    $CPF_DIRIGENTE = $orgao->dirigente_cpf ;

                }
            } 
        }
        /*if(Auth::user()->id_usuario==0){   
            $fiscais = Fiscal::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $fiscais = Fiscal::WHERE('id_usuario', $user->id)->get();
            }
        }
        $modalidades = Modalidade::all();
        */

        /*
        // pega MODALIDADE
        */
        $modalidade = Modalidade::find($registro->id_modalidade); 


        /*
        // pega VALOR TOTAL DO EVENTO
        */
        $valor_estimado = EventoItem::where('id_evento',$id)->sum('valor_total');
        $valor_estimado=number_format($valor_estimado, 2, ',', '.');

        //dd($valor_total);

        $documento_pdf='';

        //$documento = Edital::SELECT('edital')->WHERE('id', $id_edital)->firstOrFail();
        //$documento_pdf=$documento->edital;

       $documento_pdf = $registro->minuta_edital;


        //dd($documento_pdf);

        //dd($documento_pdf);


        $documento_pdf=nl2br($documento_pdf);
        $documento_pdf=htmlentities($documento_pdf);
        $documento_pdf=html_entity_decode($documento_pdf);





        /*
        // FAZ SUBSTITUIÇÃO DAS VARIAVEIS
        */
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');        
        $date = date('Y-m-d');
        $data_atual = strftime("%d de %B de %Y", strtotime($date));//date("d/m/Y");
        $data_abertura_sessao = strftime("%d de %B de %Y", strtotime($registro['data_abertura_sessao']));//date('d/m/Y', strtotime($registro['data_abertura_sessao']));
        $substituicao = array(

            // LOCAL E DATA
            '{{LOCAL_DATA}}' => Auth::user()->cidade.', '.$data_atual,

            // CS (ORGÃO SOLICITANTE)
            '{{ORGAO_SOLICITANTE}}' => $ORGAO_SOLICITANTE, //CS1
            '{{CNPJ_ORGAO_SOLICITANTE}}' => $CNPJ_ORGAO_SOLICITANTE, //CS3
            '{{ENDERECO_ORGAO_SOLICITANTE}}' => $ENDERECO_ORGAO_SOLICITANTE, // CS2
            '{{NOME_ORDENADOR_DESPESA}}' => $NOME_ORDENADOR_DESPESA,
            '{{CARGO_ORDENADOR_DESPESA}}' => $CARGO_ORDENADOR_DESPESA,
            '{{NOME_PREGOEIRO}}' => $NOME_PREGOEIRO,
            '{{ATO_DESIGNACAO}}' => $ATO_DESIGNACAO,
            '{{NOME_DIRIGENTE}}' => $NOME_DIRIGENTE,
            '{{CARGO_DIRIGENTE}}' => $CARGO_DIRIGENTE,
            '{{CPF_DIRIGENTE}}' => $CPF_DIRIGENTE,

            // DADOS SOBRE OS ITENS
            '{{VALOR_ESTIMADO}}' => $valor_estimado,

            // CL ( CADASTRO LICITAÇÃO )
            '{{OBJETO}}' => $registro['objeto'],
            '{{JUSTIFICATIVA}}' => $registro['justificativa'],
            '{{DOTACAO_ORCAMENTARIA}}' => $registro['dotacao_orcamentaria'],
            '{{NUMERO_PROCESSO}}' => $registro['processo'],
            '{{NUMERO_LICITACAO}}' => $registro['numero_licitacao'],
            '{{MODALIDADE}}' => $modalidade['nome'],
            '{{TIPO_JULGAMENTO}}' => $registro['tipo_julgamento'],

            '{{ENDERECO_ELETRONICO_EDITAL}}' => $registro['endereco_eletronico_edital'],
            '{{ENDERECO_FISICO_EDITAL}}' => $registro['endereco_fisico_edital'],
            '{{EMAIL_INFORMACOES}}' => $registro['email_informacoes'],
            '{{ENDERECO_CERTAME}}' => $registro['endereco_eletronico_conexao'],
            '{{DATA_ABERTURA_SESSAO}}' => $data_abertura_sessao,
            '{{HORA_ABERTURA_SESSAO}}' => date('H:i', strtotime($registro['hora_abertura_sessao']))

            
        );
        $documento_pdf = strtr($documento_pdf, $substituicao); 


        //dd($documento_pdf);


        //return view('cliente.eventos.gerarDocumento', compact('documento_pdf'));

        // mostra view
        return $documento_pdf;
                    //->save(‘path aqui’);
    }


    public function adicionar(){

        // $orgaos = Orgao::all();
        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }

       }

       // $fiscais = Fiscal::all();
        if(Auth::user()->id_usuario==0){   
            $fiscais = Fiscal::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $fiscais = Fiscal::WHERE('id_usuario', $user->id)->get();
            }

       }

       if(Auth::user()->id_usuario==0){   
            $pregoeiros = Pregoeiro::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $pregoeiros = Pregoeiro::WHERE('id_usuario', $user->id)->get();
            }

       }

        //dd($orgaos);
        return view('cliente.eventos.adicionar', compact('orgaos','fiscais','pregoeiros'));

    }

    public function editar($id){

        $registro = Evento::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}


        return view('cliente.eventos.editar', compact('registro'));

    }


    public function salvar(Request $req){

        // pega dados do formulário
        $dados=$req->all();        



        // pega minuta do contrato e salva cópia para ser alterada na fase 2 etapa 1
        // $documento=Documento::SELECT('documento')->WHERE('id',10)->firstOrFail();
        // add os dados da minuta
        // $dados["minuta_contrato"]=$documento->documento;
        //dd($documento->documento);




        // cria novo evento
        $evento = Evento::create($dados);
        // pesquisa novo evento criado
        $registro = Evento::find($evento->id);
        // pega orgãos e fiscais
        $orgaos = Orgao::all();
        $fiscais = Fiscal::all();
        $pregoeiros = Pregoeiro::all();



        return redirect()->route('cliente.eventos.fase_inicial_editar', $evento->id)->with('success','EVENTO INSERIDO COM SUCESSO');
        //return redirect()->route('cliente.eventos.fase_inicial_editar')->with('success','EVENTO INSERIDO COM SUCESSO');
        //return view('cliente.eventos.fase_inicial_editar', compact('registro','orgaos','fiscais'))->with('success','EVENTO INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        //dd('opa');

        $dados=$req->all();


        if(isset($dados["garantia_contratual"])){
            $dados["garantia_contratual"]='1';
        }else{
            $dados["garantia_contratual"]='0';
        }

        if(isset($dados["destinada_srp"])){
            $dados["destinada_srp"]='1';
        }else{
            $dados["destinada_srp"]='0';
        }

        if(isset($dados["exclusiva_me_epp"])){
            $dados["exclusiva_me_epp"]='1';
        }else{
            $dados["exclusiva_me_epp"]='0';
        }

        if(isset($dados["itens_exclusivos_me_epp"])){
            $dados["itens_exclusivos_me_epp"]='1';
        }else{
            $dados["itens_exclusivos_me_epp"]='0';
        }
       

        if(isset($dados["data_abertura_sessao"])){
            $dados["data_abertura_sessao"]=$this->dateEmMysql($dados["data_abertura_sessao"]);
        }


        if(isset($dados["data_termino_proposta_eletronica"])){
            $dados["data_termino_proposta_eletronica"]=$this->dateEmMysql($dados["data_termino_proposta_eletronica"]);
        }

        if(isset($dados["data_inicio_proposta_eletronica"])){
            $dados["data_inicio_proposta_eletronica"]=$this->dateEmMysql($dados["data_inicio_proposta_eletronica"]);
        }


        // pega edital baseado nas configurações do formulario CPL, e salva para ser editado na fase final etapa 1
        $edital = Edital::SELECT('edital')->WHERE([

            ['destinada_srp', $dados["destinada_srp"] ],
            ['exclusiva_me_epp', $dados["exclusiva_me_epp"] ], 
            ['exclusiva_itens_me_epp',$dados["itens_exclusivos_me_epp"] ]

        ])->first();

        //dd($edital);
        if($edital==null) dd('edital não existe, consultar administrador do sistema'); else $dados["minuta_edital"]=$edital->edital;
        // add os dados da minuta
        // $dados["minuta_contrato"]=$documento->documento;
        //dd($documento->documento);
        

        Evento::find($id)->update($dados);




        return response()->json($dados);

        

        //dd($dados);

        //Evento::find($id)->update($dados);
        //return redirect()->route('cliente.eventos')->with('success','EVENTO ATUALIZADO COM SUCESSO');
        
    }

    public static function dateEmMysql($dateSql){
        $ano= substr($dateSql, 6);
        $mes= substr($dateSql, 3,-5);
        $dia= substr($dateSql, 0,-8);
        return $ano."-".$mes."-".$dia;
    }

    public function deletar($id){

        Evento::find($id)->delete();
        return redirect()->route('cliente.eventos')->with('success','EVENTO EXCLUÍDO COM SUCESSO');
        
    }

    public function valorPorExtenso( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false )
    {
 
        //$valor = self::removerFormatacaoNumero( $valor );
 
        $singular = null;
        $plural = null;
 
        if ( $bolExibirMoeda )
        {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
 
        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
 
 
        if ( $bolPalavraFeminina )
        {
        
            if ($valor == 1) 
            {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            else 
            {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            
            
            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
            
            
        }
 
 
        $z = 0;
 
        $valor = number_format( $valor, 2, ".", "." );
        $inteiro = explode( ".", $valor );
 
        for ( $i = 0; $i < count( $inteiro ); $i++ ) 
        {
            for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ ) 
            {
                $inteiro[$i] = "0" . $inteiro[$i];
            }
        }
 
        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
 
            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $inteiro ) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $valor == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;
                
            if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];
                
            if ( $r )
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }
 
        $rt = mb_substr( $rt, 1 );
 
        return($rt ? trim( $rt ) : "zero");
 
    }


}
