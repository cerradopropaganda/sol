<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller
{
    public function index(){

        $registros = Item::all();

    	return view('admin.itens.index', compact('registros'));
    }

    public function adicionar(){

        return view('admin.itens.adicionar');

    }

    public function editar($id){

        $registro = Item::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}


        return view('admin.itens.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        

        //dd($dados);

        Item::create($dados);

        return redirect()->route('admin.itens');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Item::find($id)->update($dados);
        return redirect()->route('admin.itens');
        
    }

    public function deletar($id){

        Item::find($id)->delete();
        return redirect()->route('admin.itens');
        
    }
}
