<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fiscal;
use App\Orgao;
use Auth;

class FiscalController extends Controller
{
        public function index(){

        //$registros = Fiscal::all();

        

        if(Auth::user()->id_usuario==0){
            $registros = Fiscal::join('orgaos', 'orgaos.id', '=', 'fiscais.id_orgao')->WHERE('fiscais.id_usuario', Auth::user()->id )->get(['orgaos.nome AS nome_orgao', 'fiscais.*']);       
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) { 
                $registros = Fiscal::join('orgaos', 'orgaos.id', '=', 'fiscais.id_orgao')->WHERE('fiscais.id_usuario', $user->id)->get(['orgaos.nome AS nome_orgao', 'fiscais.*']);         
            }

       }


        $orgaos = Orgao::all();

    	return view('cliente.fiscais.index', compact('registros','orgaos'));
    }

    public function adicionar(){

        //$orgaos = Orgao::all();

        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }

       }

        return view('cliente.fiscais.adicionar', compact('orgaos'));

    }

    public function editar($id){

        $registro = Fiscal::find($id);


        //$orgaos = Orgao::WHERE('id_usuario', $user->id)->get();

        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }

       }

       //dd($orgaos);



        return view('cliente.fiscais.editar', compact('registro','orgaos'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        

        //dd($dados);

        Fiscal::create($dados);

        return redirect()->route('cliente.fiscais')->with('success','FISCAL INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Fiscal::find($id)->update($dados);
        return redirect()->route('cliente.fiscais')->with('success','FISCAL ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Fiscal::find($id)->delete();
        return redirect()->route('cliente.fiscais')->with('success','FISCAL EXCLUÍDO COM SUCESSO');
        
    }
}
