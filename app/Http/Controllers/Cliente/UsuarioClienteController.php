<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Auth;

class UsuarioClienteController extends Controller
{
    
    public function index(){

    	/* ASSIM RETORNA ARRAY */
		/*


        $contatos = [
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



        

        if(Auth::user()->id_usuario==0){
            $registros = Usuario::WHERE('nivel','<>','1')->WHERE('id_usuario', Auth::user()->id )->orderBy("nivel")->get();
        }else{
            $registro = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($registro as $user) { 
                $registros = Usuario::WHERE('nivel','<>','1')->WHERE('id_usuario', $user->id )->orderBy("nivel")->get();   
            }

       }

    	return view('cliente.usuarios.index', compact('registros'));
    }

    public function adicionar(){

        return view('cliente.usuarios.adicionar');

    }

    public function editar($id){

        $registro = Usuario::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}


        return view('cliente.usuarios.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        // arruma status
        if(isset($dados["status"])){
            $dados["status"]='1';
        }else{
            $dados["status"]='0';
        }

        // encrypta a senha
        if ($req->has('password')) {
            $dados["password"]=bcrypt($req->input('password'));
        }

        // arruma data_contrato_inicio
        if(isset($dados["data_contrato_inicio"])){
            $data_contrato_inicio = str_replace("/", "-", $_POST["data_contrato_inicio"]);
            $dados["data_contrato_inicio"]=date('Y-m-d', strtotime($data_contrato_inicio));
        }

        // arruma data_contrato_final
        if(isset($dados["data_contrato_final"])){
            $data_contrato_final = str_replace("/", "-", $_POST["data_contrato_final"]);
            $dados["data_contrato_final"]=date('Y-m-d', strtotime($data_contrato_final));
        }

        

        //dd($dados);

        Usuario::create($dados);

        return redirect()->route('cliente.usuarios')->with('success','USUÁRIO CADASTRADO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        // arruma status
        if(isset($dados["status"])){
            $dados["status"]='1';
        }else{
            $dados["status"]='0';
        }

        // encrypta a senha
        if ($req->has('password')) {
            $dados["password"]=bcrypt($req->input('password'));
        }

        // arruma data_contrato_inicio
        if(isset($dados["data_contrato_inicio"])){
            $data_contrato_inicio = str_replace("/", "-", $_POST["data_contrato_inicio"]);
            $dados["data_contrato_inicio"]=date('Y-m-d', strtotime($data_contrato_inicio));
        }

        // arruma data_contrato_final
        if(isset($dados["data_contrato_final"])){
            $data_contrato_final = str_replace("/", "-", $_POST["data_contrato_final"]);
            $dados["data_contrato_final"]=date('Y-m-d', strtotime($data_contrato_final));
        }

        

        //dd($dados);

        Usuario::find($id)->update($dados);

        //Session::flash('message', 'Successfully updated nerd!');

        return redirect()->route('cliente.usuarios')->with('success','USUÁRIO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Usuario::find($id)->delete();
        return redirect()->route('cliente.usuarios')->with('success','USUÁRIO EXCLUÍDO COM SUCESSO');
        
    }
}
