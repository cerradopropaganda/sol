<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fiscal;

class FiscalController extends Controller
{
        public function index(){

        $registros = Fiscal::all();

    	return view('cliente.fiscais.index', compact('registros'));
    }

    public function adicionar(){

        return view('cliente.fiscais.adicionar');

    }

    public function editar($id){

        $registro = Fiscal::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}


        return view('cliente.fiscais.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        

        //dd($dados);

        Fiscal::create($dados);

        return redirect()->route('cliente.fiscais');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Fiscal::find($id)->update($dados);
        return redirect()->route('cliente.fiscais');
        
    }

    public function deletar($id){

        Fiscal::find($id)->delete();
        return redirect()->route('cliente.fiscais');
        
    }
}
