<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EventoItem;
use App\Evento;
use App\Item;
use Auth;
use Response;

class EventoItemController extends Controller
{
    public function index(){

        // $registros = Evento::WHERE('id_usuario', Auth::user()->id )->get();
         //$registros = Evento::join('orgaos', 'orgaos.id', '=', 'eventos.id_orgao')->WHERE('eventos.id_usuario', Auth::user()->id )->get(['orgaos.nome AS nome_orgao', 'eventos.*']);



    	return view('cliente.eventos.index', compact('registros'));
    }

    
    public function adicionar(){

        //$orgaos = Orgao::all();
        //$fiscais = Fiscal::all();

        //dd($orgaos);
        return view('cliente.eventos.adicionar');

    }

    public function editar($id){

        $registro = EventoItem::find($id);


        return view('cliente.eventos.editar', compact('registro'));

    }

    public function salvar(Request $req){

        // pega dados do formulário
        $dados=$req->all();    




       // $evento_item = EventoItem::where([ ['id_item', $dados->$id_item] ,['id_evento', $dados->$id_evento] ,['id_usuario', $dados->$id_usuario] ])->first();        
		//if (!$evento_item) {
		   // cria novo evento
        	$evento = EventoItem::create($dados);
        	// retorna evento criado
        	$registro = EventoItem::join('itens', 'itens.id', '=', 'eventos_itens.id_item')->select(['eventos_itens.id AS idItem', 'eventos_itens.*', 'itens.*'])->where('eventos_itens.id', $evento->id)->first();
        	return Response::json($registro);
		//}else{
		//	return Response::json('exist');
		//}


       
        

        






		




        // pega orgãos e fiscais
       // $orgaos = Orgao::all();
       // $fiscais = Fiscal::all();

        //return redirect()->route('cliente.eventos.fase_inicial_editar', $evento->id)->with('success','EVENTO INSERIDO COM SUCESSO');
        //return redirect()->route('cliente.eventos.fase_inicial_editar')->with('success','EVENTO INSERIDO COM SUCESSO');
        //return view('cliente.eventos.fase_inicial_editar', compact('registro','orgaos','fiscais'))->with('success','EVENTO INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        //dd('opa');

        $dados=$req->all();

        EventoItem::find($id)->update($dados);


        return response()->json($dados);

        

        //dd($dados);

        //Evento::find($id)->update($dados);
        //return redirect()->route('cliente.eventos')->with('success','EVENTO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){
    	//$id= json_decode($id);
    	http_response_code(500);
    	//dd($id);
        //EventoItem::find('$id')->delete();
		$evento= EventoItem::WHERE('id', $id)->first();

		if($evento){
		$evento->delete();
		}

		$json_string = json_encode($evento, JSON_PRETTY_PRINT);

		return $json_string;

        //return redirect()->route('cliente.eventos')->with('success','EVENTO EXCLUÍDO COM SUCESSO');
        //return Response::json($registro);
        
    }
}
