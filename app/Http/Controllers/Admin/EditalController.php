<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Edital;
use App\Modalidade;


class EditalController extends Controller
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
       // $registros = Edital::all()->sortBy("nome");
        $registros = Edital::join('modalidades', 'modalidades.id', '=', 'editais.id_modalidade')->get(['modalidades.nome AS modalidadeNome', 'editais.*']);
        //with('modalidade')->get();
        $modalidades = Modalidade::all();

        //dd($registros);

        return view('admin.editais.index', compact('registros','modalidades'));
    }

   

    public function adicionar(){


        $modalidades = Modalidade::all();
        return view('admin.editais.adicionar', compact('modalidades'));

    }

    public function editar($id){

        $registro = Edital::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}
        //dd($registro);
        $modalidades = Modalidade::all();
        return view('admin.editais.editar', compact('registro','modalidades'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

        // arruma destinada_srp
        if(isset($dados["destinada_srp"])){
            $dados["destinada_srp"]='1';
        }else{
            $dados["destinada_srp"]='0';
        }

        // arruma exclusiva_me_epp
        if(isset($dados["exclusiva_me_epp"])){
            $dados["exclusiva_me_epp"]='1';
        }else{
            $dados["exclusiva_me_epp"]='0';
        }

        // arruma exclusiva_itens_me_epp
        if(isset($dados["exclusiva_itens_me_epp"])){
            $dados["exclusiva_itens_me_epp"]='1';
        }else{
            $dados["exclusiva_itens_me_epp"]='0';
        }

        //dd($dados);

        Edital::create($dados);

        return redirect()->route('admin.editais')->with('success','EDITAL INSERIDO COM SUCESSO');
        
    }

    public function atualizar(Request $req, $id){

        $dados=$req->all();

        // arruma destinada_srp
        if(isset($dados["destinada_srp"])){
            $dados["destinada_srp"]='1';
        }else{
            $dados["destinada_srp"]='0';
        }

        // arruma exclusiva_me_epp
        if(isset($dados["exclusiva_me_epp"])){
            $dados["exclusiva_me_epp"]='1';
        }else{
            $dados["exclusiva_me_epp"]='0';
        }

        // arruma exclusiva_itens_me_epp
        if(isset($dados["exclusiva_itens_me_epp"])){
            $dados["exclusiva_itens_me_epp"]='1';
        }else{
            $dados["exclusiva_itens_me_epp"]='0';
        }


        //dd($dados);

        Edital::find($id)->update($dados);



        return redirect()->route('admin.editais')->with('success','EDITAL ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Edital::find($id)->delete();
        return redirect()->route('admin.editais')->with('success','EDITAL EXCLUÍDO COM SUCESSO');
        
    }
}
