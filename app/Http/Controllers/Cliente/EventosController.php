<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eventos;


class EventosController extends Controller
{
    public function index(){

        $registros = Eventos::all();

    	return view('cliente.fiscais.index', compact('registros'));
    }

    public function adicionar(){

        return view('cliente.fiscais.adicionar');

    }

    public function editar($id){

        $registro = Eventos::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}


        return view('cliente.fiscais.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        

        //dd($dados);

        Eventos::create($dados);

        return redirect()->route('cliente.fiscais');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Eventos::find($id)->update($dados);
        return redirect()->route('cliente.fiscais');
        
    }

    public function deletar($id){

        Eventos::find($id)->delete();
        return redirect()->route('cliente.fiscais');
        
    }
}
