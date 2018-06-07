<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pregoeiro;
use App\Orgao;
use Auth;

class PregoeiroController extends Controller
{
        public function index(){

        //$registros = Pregoeiro::all();

        

        if(Auth::user()->id_usuario==0){
            $registros = Pregoeiro::join('orgaos', 'orgaos.id', '=', 'pregoeiros.id_orgao')->WHERE('pregoeiros.id_usuario', Auth::user()->id )->get(['orgaos.nome AS nome_orgao', 'pregoeiros.*']);       
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) { 
                $registros = Pregoeiro::join('orgaos', 'orgaos.id', '=', 'pregoeiros.id_orgao')->WHERE('pregoeiros.id_usuario', $user->id)->get(['orgaos.nome AS nome_orgao', 'pregoeiros.*']);         
            }

       }


        $orgaos = Orgao::all();

    	return view('cliente.pregoeiros.index', compact('registros','orgaos'));
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

        return view('cliente.pregoeiros.adicionar', compact('orgaos'));

    }

    public function editar($id){

        $registro = Pregoeiro::find($id);


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



        return view('cliente.pregoeiros.editar', compact('registro','orgaos'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        

        //dd($dados);

        Pregoeiro::create($dados);

        return redirect()->route('cliente.pregoeiros')->with('success','PREGOEIRO INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Pregoeiro::find($id)->update($dados);
        return redirect()->route('cliente.pregoeiros')->with('success','PREGOEIRO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Pregoeiro::find($id)->delete();
        return redirect()->route('cliente.pregoeiros')->with('success','PREGOEIRO EXCLUÍDO COM SUCESSO');
        
    }
}
