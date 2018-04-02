<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Header;
use App\Orgao;
use Auth;
use File;

class HeaderController extends Controller
{
        public function index(){

        //$registros = Header::all();

       

        if(Auth::user()->id_usuario==0){
            $registros = Header::join('orgaos', 'orgaos.id', '=', 'headers.id_orgao')->WHERE('headers.id_usuario', Auth::user()->id )->get(['orgaos.nome AS nome_orgao', 'headers.*']);     
        }else{
            $registro = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($registro as $user) { 
                $registros = Header::join('orgaos', 'orgaos.id', '=', 'headers.id_orgao')->WHERE('headers.id_usuario', $user->id )->get(['orgaos.nome AS nome_orgao', 'headers.*']);          
            }

       }
        //$orgaos = Orgao::all();

    	return view('cliente.header.index', compact('registros'));
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

        return view('cliente.header.adicionar', compact('orgaos'));

    }

    public function editar($id){

        $registro = Header::find($id);
        //$orgaos = Orgao::all();

        if(Auth::user()->id_usuario==0){   
            $orgaos = Orgao::WHERE('id_usuario', Auth::user()->id)->get(); 
        }else{
            $users = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; 
            foreach($users as $user) {        
                $orgaos = Orgao::WHERE('id_usuario', $user->id)->get();
            }

       }


        return view('cliente.header.editar', compact('registro','orgaos'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        if($req->hasFile('logomarca')){
            $imagem_logo= $req->file('logomarca');
            $num=rand(1111,9999);
            $dir= "img/headers";
            $ext= $imagem_logo->guessClientExtension();
            $nome_imagem="imagem_".$num.".".$ext;
            $imagem_logo->move($dir,$nome_imagem);
            $dados['logomarca']=$dir."/".$nome_imagem;
        }

        //dd($dados);

        Header::create($dados);

        return redirect()->route('cliente.header')->with('success','CABEÇALHO INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Header::find($id)->update($dados);
        return redirect()->route('cliente.header')->with('success','CABEÇALHO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        //Header::find($id)->delete();


        $header = Header::find($id);
        $file=$header['logomarca'];

       
       if(File::isFile($file)){
           \File::delete($file);
       }

         //dd($file);

        $header->delete();

        return redirect()->route('cliente.header')->with('success','CABEÇALHO EXCLUÍDO COM SUCESSO');
        
    }
}
