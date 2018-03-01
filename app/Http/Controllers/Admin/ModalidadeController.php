<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modalidade;

class ModalidadeController extends Controller
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
        $registros = Modalidade::all();

    	return view('admin.modalidades.index', compact('registros'));
    }

    public function adicionar(){

        return view('admin.modalidades.adicionar');

    }

    public function editar($id){

        $registro = Modalidade::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}
        //dd($registro);

        return view('admin.modalidades.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        // arruma licitacao_eletronica
        if(isset($dados["licitacao_eletronica"])){
            $dados["licitacao_eletronica"]='1';
        }else{
            $dados["licitacao_eletronica"]='0';
        }

        //dd($dados);

        modalidade::create($dados);

        return redirect()->route('admin.modalidades')->with('success','MODALIDADE INSERIDA COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        // arruma licitacao_eletronica
        if(isset($dados["licitacao_eletronica"])){
            $dados["licitacao_eletronica"]='1';
        }else{
            $dados["licitacao_eletronica"]='0';
        }


        //dd($dados);

        Modalidade::find($id)->update($dados);



        return redirect()->route('admin.modalidades')->with('success','MODALIDADE ATUALIZADA COM SUCESSO');
        
    }

    public function deletar($id){

        Modalidade::find($id)->delete();
        return redirect()->route('admin.modalidades');
        
    }
}
