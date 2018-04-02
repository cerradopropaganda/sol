<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Evento;
use App\EventoItem;
use App\Orgao;
use App\Fiscal;
use App\Modalidade;
use App\TermoReferencia;
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
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) { 
                $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);      
            }

       }


        return view('cliente.eventos.fase_inicial', compact('registros'));
    }

    public function fase_final(){


        //$registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);
        if(Auth::user()->id_usuario==0){
            $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);  
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) { 
                $registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE([ ['eventos.id_usuario', Auth::user()->id] , ['eventos.status',0] ] )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);
            }

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

        // pega evento fase inicial
        $registro = Evento::find($id);
        

        // pega orgãos, fiscais, modalidade e itens dos eventos
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

        $modalidades = Modalidade::all();
        $eventos_itens = EventoItem::join('itens', 'itens.id', '=', 'eventos_itens.id_item')->WHERE([['id_evento',$id], ['eventos_itens.id_usuario', Auth::user()->id] ])->orderBy('eventos_itens.id', 'DESC')->get(['eventos_itens.id AS idItem', 'itens.*']);
        $Count = $eventos_itens->count();


        $lista_trs= TermoReferencia::all(array('codigo','nome'));



       // $arrayGeral = array();
        $list = array();        
        if($Count>0){
            foreach($eventos_itens as $evento_item) {
                if ($evento_item->trs != ""){
                    //$arrayItens = array();
                    $arryItemCode  = array();
                    foreach(explode(',', $evento_item->trs) as $tr) {  
                        if($lista_trs->where( 'codigo' , '=' , $tr )){
                            foreach($lista_trs as $item_tr) {
                                if($item_tr->codigo == $tr){
                                    //$arryItem = array(
                                    //    "codigo" => $item_tr->codigo,
                                    //    "nome" => $item_tr->nome
                                    //);
                                    //array_push($arrayItens, $arryItem );                    
                                    array_push($arryItemCode, $item_tr->codigo);
                                }

                            }

                       }
                    }

                    //array_push($arrayGeral, $arrayItens );
                    $list[] = $arryItemCode;


                }
            }


        }

        //dd($list);
        //dd(sizeof($list));
        $sizeList=sizeof($list);
       // dd($sizeList);
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

        //if(sizeof($list)>1){
        //    $intersect = call_user_func_array('array_intersect',$list); 
        //}else{
        //    $intersect =$list[0];
        //}

        
        //dd($intersect);

        /*$resourceIDsThatMatchAllCritera = array_shift ($arrayGeral); 
        foreach ($arrayGeral as $filter) {
            foreach ($filter as $filter2) {
             $resourceIDsThatMatchAllCritera = array_intersect ($resourceIDsThatMatchAllCritera, $filter2); 
            }
         } 

         dd($resourceIDsThatMatchAllCritera);

        $res_arr = array_shift($arrayGeral);
        foreach($arrayGeral as $filter){
             $res_arr = array_intersect($res_arr, $filter);
        }
        dd($res_arr);

        $result=array_intersect($arrayGeral);
        dd($result);
         dd(call_user_func_array('array_intersect', $arrayItens));

        */

        //dd($Count);
        // mostra view
        return view('cliente.eventos.fase_inicial_editar', compact('registro','orgaos','fiscais','modalidades','eventos_itens','Count','lista_trs','intersect'));

    }

    public function fase_final_editar($id){
        // pega evento fase inicial
        $registro = Evento::find($id);
        // mostra view
        return view('cliente.eventos.fase_final_editar', compact('registro'));

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

        //dd($orgaos);
        return view('cliente.eventos.adicionar', compact('orgaos','fiscais'));

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
        // cria novo evento
        $evento = Evento::create($dados);
        // pesquisa novo evento criado
        $registro = Evento::find($evento->id);
        // pega orgãos e fiscais
        $orgaos = Orgao::all();
        $fiscais = Fiscal::all();

        return redirect()->route('cliente.eventos.fase_inicial_editar', $evento->id)->with('success','EVENTO INSERIDO COM SUCESSO');
        //return redirect()->route('cliente.eventos.fase_inicial_editar')->with('success','EVENTO INSERIDO COM SUCESSO');
        //return view('cliente.eventos.fase_inicial_editar', compact('registro','orgaos','fiscais'))->with('success','EVENTO INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        //dd('opa');

        $dados=$req->all();

        Evento::find($id)->update($dados);


        return response()->json($dados);

        

        //dd($dados);

        //Evento::find($id)->update($dados);
        //return redirect()->route('cliente.eventos')->with('success','EVENTO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Evento::find($id)->delete();
        return redirect()->route('cliente.eventos')->with('success','EVENTO EXCLUÍDO COM SUCESSO');
        
    }
}
