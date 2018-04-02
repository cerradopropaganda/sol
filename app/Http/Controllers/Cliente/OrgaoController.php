<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orgao;
use Auth;

class OrgaoController extends Controller
{
    public function index(){

        //$registros = Orgao::all();


        if(Auth::user()->id_usuario==0){
            $registros = Orgao::WHERE('id_usuario', Auth::user()->id )->get();        
        }else{
            $registro = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($registro as $user) { 
                $registros = Orgao::WHERE('id_usuario', $user->id)->get();        
            }

       }


        

    	return view('cliente.orgaos.index', compact('registros'));
    }

    public function adicionar(){

        return view('cliente.orgaos.adicionar');

    }

    public function editar($id){

        $registro = Orgao::find($id);

        //dd($registro);
        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}


        return view('cliente.orgaos.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        

        //dd($dados);

        Orgao::create($dados);

        return redirect()->route('cliente.orgaos')->with('success','ORGÃO INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Orgao::find($id)->update($dados);
        return redirect()->route('cliente.orgaos')->with('success','ORGÃO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Orgao::find($id)->delete();
        return redirect()->route('cliente.orgaos')->with('success','ORGÃO EXCLUÍDO COM SUCESSO');
        
    }
}
