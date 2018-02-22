<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orgao;

class OrgaoController extends Controller
{
    public function index(){

        $registros = Orgao::all();

    	return view('cliente.orgaos.index', compact('registros'));
    }

    public function adicionar(){

        return view('cliente.orgaos.adicionar');

    }

    public function editar($id){

        $registro = Orgao::find($id);

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

        return redirect()->route('cliente.orgaos');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Orgao::find($id)->update($dados);
        return redirect()->route('cliente.orgaos');
        
    }

    public function deletar($id){

        Orgao::find($id)->delete();
        return redirect()->route('cliente.orgaos');
        
    }
}
