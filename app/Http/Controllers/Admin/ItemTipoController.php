<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ItemTipo;
use App\ItemCategoria;
use App\Item;

class ItemCategoriaController extends Controller
{
    public function index(){

        $registros = Item::all();

    	return view('admin.itens.index', compact('registros'));
    }

    public function adicionar(){

         $categoria_itens = ItemCategoria::all();

        return view('admin.itens.adicionar', compact('categoria_itens'));

    }

    public function editar($id){

        $registro = Item::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}

        $categoria_itens = ItemCategoria::all();
        return view('admin.itens.editar', compact('registro','categoria_itens'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        

        //dd($dados);

        Item::create($dados);

        return redirect()->route('admin.itens')->with('success','ITEM INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        

        //dd($dados);

        Item::find($id)->update($dados);
        return redirect()->route('admin.itens')->with('success','ITEM ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Item::find($id)->delete();
        return redirect()->route('admin.itens')->with('success','ITEM EXCLUÍDO COM SUCESSO');
        
    }
}
