<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Documento;


class DocumentoController extends Controller
{
    
    public function index(){

        /* ASSIM RETORNA ARRAY */
        /*$contatos = [
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
        $registros = Documento::all()->sortBy("nome");
        //$registros = Edital::join('modalidades', 'modalidades.id', '=', 'documentos.id_modalidade')->get(['modalidades.nome AS modalidadeNome', 'documentos.*']);

        //dd($registros);

        return view('admin.documentos.index', compact('registros'));
    }

   

    public function adicionar(){

        return view('admin.documentos.adicionar');

    }

    public function editar($id){

        $registro = Documento::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}
        //dd($registro);
        return view('admin.documentos.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();


        //dd($dados);

        Documento::create($dados);

        return redirect()->route('admin.documentos')->with('success','DOCUMENTO INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();
        //dd($dados);

        Documento::find($id)->update($dados);



        return redirect()->route('admin.documentos')->with('success','DOCUMENTO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Documento::find($id)->delete();
        return redirect()->route('admin.documentos')->with('success','DOCUMENTO EXCLUÍDO COM SUCESSO');
        
    }
}
