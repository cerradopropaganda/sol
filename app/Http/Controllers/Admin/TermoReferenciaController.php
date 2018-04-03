<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TermoReferencia;
use App\CategoriaTR;
use App\Item;
use Response;

class TermoReferenciaController extends Controller
{
    
    public function index(){

    	/* ASSIM RETORNA ARRAY */
		/*$contatos = [
    		['nome'=>'Jéssica','tel'=>'35416546545'],
    		['nome'=>'Guilherme','tel'=>'234234'],
    		['nome'=>'Jhonlenim','tel'=>'56756756']
    	];

		@foreach($contatos as $contato)

			<p>{{ $contato['nome'] }}</p>
			<p>{{ $contato['tel'] }}</p>
			
		@endforeach
    	*/

    	/* ASSIM RETORNA OBJETO */
		/*$contatos = [
    		(object)['nome'=>'Jéssica','tel'=>'35416546545'],
    		(object)['nome'=>'Guilherme','tel'=>'234234'],
    		(object)['nome'=>'Jhonlenim','tel'=>'56756756']
    	];

		@foreach($contatos as $contato)

			<p>{{ $contato->nome }}</p>
			<p>{{ $contato->tel }}</p>
			
		@endforeach
    	


    	$contatos = [
    		(object)['nome'=>'Jéssica','tel'=>'35416546545'],
    		(object)['nome'=>'Guilherme','tel'=>'234234'],
    		(object)['nome'=>'Jhonlenim','tel'=>'56756756']
    	];
    	*/
        // $registros = TermoReferencia::all();
        $registros = TermoReferencia::join('categorias_tr', 'categorias_tr.id', '=', 'termos_referencia.id_categoria')->get(['categorias_tr.nome AS categoriaNome', 'termos_referencia.*']);
        $categorias_tr = CategoriaTR::all();

    	return view('admin.termos-referencia.index', compact('registros','categorias_tr'));
    }

    public function adicionar(){

         $categorias_tr = CategoriaTR::all();

        return view('admin.termos-referencia.adicionar', compact('categorias_tr'));

    }

    public function editar($id){

        $registro = TermoReferencia::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}

         $categorias_tr = CategoriaTR::all();
        return view('admin.termos-referencia.editar', compact('registro','categorias_tr'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        //dd($dados);

        TermoReferencia::create($dados);

        return redirect()->route('admin.termos-referencia')->with('success','TERMO DE REFERÊNCIA INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        TermoReferencia::find($id)->update($dados);
        return redirect()->route('admin.termos-referencia')->with('success','TERMO DE REFERÊNCIA ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        TermoReferencia::find($id)->delete();
        return redirect()->route('admin.termos-referencia')->with('success','TERMO DE REFERÊNCIA EXCLUÍDO COM SUCESSO');
        
    }


    public function mostrar($id){

        $registro = TermoReferencia::SELECT('termo_referencia')->WHERE('codigo',$id)->get();

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}

        //dd($registro['termo_referencia']);


        return $registro;//Response::json($registro);

    }

    public function listartritens(Request $req){

       $dados=$req->all();

       $item = Item::SELECT('trs')->WHERE('id', $dados['id_item'])->first();

       http_response_code(500);

       $trs_array = explode(',', $item->trs);
        $trs=array();
       foreach ( $trs_array as $valor_do_array ) {
          
        if($valor_do_array<>'') {
            
            $tr_array = TermoReferencia::SELECT('codigo','nome')->WHERE('codigo', $valor_do_array)->get();


                //echo $tr_array[0];
                //$tr_array="{ id: $tr[0]['id'], nome: $tr[0]->nome}";
  


            array_push($trs,$tr_array[0]);  
        }
          //echo $trs;
      }

       //echo($trs_array);
       return Response::json($trs);

      // $trs = array();
      /* foreach($trs_array as $tr_valor){
          echo $tr_valor . '<br />';
          if($tr_valor<>''){
            $trs = TermoReferencia::SELECT('id','nome')->WHERE('id', $tr_valor)->get();
          }
          //$trs[]=$tr;
       }*/


       

       //dd($item->id_tipo);

       //$trs = TermoReferencia::SELECT('id','nome')->WHERE('id_categoria', $item->id_tipo)->get();

       //return Response::json($trs);
        
    }


}
