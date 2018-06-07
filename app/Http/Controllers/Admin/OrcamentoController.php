<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orcamento;
use App\Item;
use File;

class OrcamentoController extends Controller
{
    public function index($id){

        $registros = Orcamento::WHERE('id_item', $id)->get(); 

        $item = Item::WHERE('codigo', $id)->first();

        $item_descricao=$item['descricao'];


    	return view('admin.orcamentos.index', compact('registros','item_descricao'));
    }

    public function listar(Request $req){

        $dados=$req->all(); 

        //$registros = Orcamento::all();

        $registros = Orcamento::WHERE('id_item', $dados["id_item"])->get(); 

        

        return response()->json($registros);
    }

    public function adicionar(){

         //$categoria_orcamentos = OrcamentoCategoria::all();
         $tipo_orcamentos = OrcamentoTipo::all();

        return view('admin.orcamentos.adicionar', compact('tipo_orcamentos'));

    }

    public function editar($id){

        $registro = Orcamento::find($id);

        

        //$trs = TermoReferencia::all();        
        //$tipo_orcamentos = OrcamentoTipo::all();





        return view('admin.orcamentos.editar', compact('registro'));

    }

    public function salvar(Request $req){

        $dados=$req->all();

       

        Orcamento::create($dados);

        return redirect()->route('admin.orcamentos')->with('success','ORÇAMENTO INSERIDO COM SUCESSO');
        
    }


    public function salvar_csv(Request $req){

        $dados=$req->all();

        $id_item=(int)$dados['id_item'];

        if($req->hasFile('file_csv')){
            $arquivo_csv= $req->file('file_csv');           
            $id_item_file=pathinfo($arquivo_csv->getClientOriginalName(), PATHINFO_FILENAME);


            // 
            //dd($id_item . ' - ' . $id_item_file);

            if($id_item<>$id_item_file){
            	return redirect()->route('admin.itens')->with('error','IMPORTAÇÃO NÃO REALIZADA, POIS O CÓDIGO DO ITEM NÃO CONFERE COM O ORÇAMENTO');
            }


            $num=rand(1111,9999);
            $dir= "img/orcamentos_csv_temp/$id_item/";
            // check is directory exist
            if (!file_exists($dir)) {
			    mkdir($dir, 0777, true);
			}
            $ext= $arquivo_csv->guessClientExtension();
            $nome_imagem="csv_".$num.".".$ext;
            $arquivo_csv->move($dir,$nome_imagem);
            $dados['file_csv']=$dir."/".$nome_imagem;
        }


       

        

        $orcamentos='';
        $row = 1;
        if (($handle = fopen ( $dados['file_csv'], 'r' )) !== FALSE) {
        while ( ($data = fgetcsv ( $handle, 1000, ';' )) !== FALSE ) {
            if( $row < 6 ){ $row++; continue; }


            //dd($data [2]);
            $csv_data = new Orcamento ();
            $csv_data->identificacao_compra = utf8_encode ($data [0]);
            $csv_data->numero_item = utf8_encode ($data [1]);
            $csv_data->modalidade = utf8_encode ($data [2]);
            $csv_data->cat_mat = utf8_encode ($data [3]);
            $csv_data->item = utf8_encode ($data [4]);
            $csv_data->unidade = utf8_encode ($data [5]);
            $csv_data->qtde = utf8_encode ($data [6]);
            $csv_data->valor = utf8_encode (str_replace(',','.',$data [7]));
            $csv_data->fornecedor = utf8_encode ($data [8]);
            $csv_data->orgao = utf8_encode ($data [9]);
            $csv_data->unidade_gestora = utf8_encode ($data [10]);

            $data_compra=implode("-",array_reverse(explode("/",$data [11])));

            $csv_data->data_compra = $data_compra;
            $csv_data->id_item=$id_item;
            $csv_data->save ();
            

            //$orcamentos.=$data[0];
        }
        fclose ( $handle );
        }

        //dd($orcamentos);
       

        //Orcamento::create($dados);

        return redirect()->route('admin.itens')->with('success','ORÇAMENTO INSERIDO COM SUCESSO');
        
    }





    public function atualizar(Request $req, $id){

        $dados=$req->all();


        /*
        ANTIGO

        if(isset($dados["trs"])){

            $trs=implode(',', $dados["trs"]);
            $dados["trs"]=','.$trs.',';

        }else{
            $dados["trs"]='';

        }*/

        //$categorias = $req->get('categorias');
        
        /*if(isset($dados["categorias"])){

            $categorias=implode(',', $dados["categorias"]);
            $dados["categorias"]=','.$categorias.',';

        }else{
            $dados["categorias"]='';

        }*/
        //dd($dados["categorias"]);

        if($req->hasFile('anexo')){
            $imagem_logo= $req->file('anexo');
            $num=rand(1111,9999);
            $dir= "img/orcamentos_pdf";
            $ext= $imagem_logo->guessClientExtension();
            $nome_imagem="imagem_".$num.".".$ext;
            $imagem_logo->move($dir,$nome_imagem);
            $dados['anexo']=$dir."/".$nome_imagem;
        }



        Orcamento::find($id)->update($dados);

        //dd($dados);

        //dd('ok');
        return redirect()->route('admin.orcamentos',str_pad($dados['id_item'], 6, '0', STR_PAD_LEFT))->with('success','ORÇAMENTO ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Orcamento::find($id)->delete();
        return redirect()->route('admin.orcamentos')->with('success','ORÇAMENTO EXCLUÍDO COM SUCESSO');
        
    }

    public function search(Request $request){

        $query = $request->query('query');
        $id_evento = $request->query('id_evento');

        http_response_code(500);

        //$evento_Orcamento = EventoOrcamento::where('id_evento', $id_evento)->get();   
        $eventos_orcamentos = EventoItem::where('id_evento', $id_evento)->get();

        

        $search = Orcamento::where('descricao','like','%' . $query . '%');

        foreach ($eventos_orcamentos as $item) {
                  $search->where('id', '<>', $item->id_item);
        }        
        $registros =  $search->get();





        /*$arr1= array(
        array("value" => "United Arab Emirates" , "data" =>"AE"),
        array("value" => "United Kingdom" , "data" =>"UK"),
        array("value" => "United States" , "data" =>"US"),
        array("value" => "United Funes" , "data" =>"DAN")
        );*/

        $arr1= array();

        foreach ($registros as $key => $value) {

                //echo "{$key} => {$value} ";
                 $a=array("value" => 'Código: '.$value['codigo'].' Descrição: '.$value['descricao'] , "data" =>"{$value['id']}");
                 array_push($arr1,$a);
        }

       



        $arr2= array();
        $arr2['suggestions']=$arr1;
        return json_encode($arr2);

        //$registros = Item::all();

        //return response()->json($registros);
        //return $registros;
        
    }
}
