<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Orcamento;
use App\ItemTipo;
use App\ItemCategoria;
use App\EventoItem;
use App\TermoReferencia;
use File;

class ItemController extends Controller
{
    public function index(){

        $registros = Item::all();
        $orcamentos= Orcamento::all(array('id_item'));

        //$registros = Item::join('orcamentos', 'orcamentos.id_item', '=', 'itens.codigo')->orderBy('itens.id', 'DESC')->get(['itens.cat_mat AS item_cat_mat', 'itens.unidade AS item_unidade', 'orcamentos.*']);




        //$orcamentos = Orgao::WHERE('id_usuario', $registro['codigo'])->get(); 

    	return view('admin.itens.index', compact('registros','orcamentos'));
    }

    public function adicionar(){

         //$categoria_itens = ItemCategoria::all();
         $tipo_itens = ItemTipo::all();

        return view('admin.itens.adicionar', compact('tipo_itens'));

    }

    public function editar($id){

        $registro = Item::find($id);

        // encrypta a senha
        //if ($registro['password']<>'') {
        //    $registro['password'] = Hash::make($registro['password']);
        //}

        /*$trs=array();
        $trs_selected =array();
        if($registro["trs"]<>''){
             //dd($categoria_itens);
            $trs = TermoReferencia::where('id_tipo',$registro['id_tipo'])->get();
            $trs_selected = array();
            $trs_selected = explode(',', $registro["trs"]);
        }*/

        $trs = TermoReferencia::all();

        /*
        $categoria_itens=array();
        $categoria_itens_selected =array();
        if($registro["categorias"]<>''){
             //dd($categoria_itens);
            $categoria_itens = ItemCategoria::where('id_tipo',$registro['id_tipo'])->get();
            $categoria_itens_selected = array();
            $categoria_itens_selected = explode(',', $registro["categorias"]);
        }*/



        //dd($categoria_itens);
        
        $tipo_itens = ItemTipo::all();
        //dd($tipo_itens);
        return view('admin.itens.editar', compact('registro','trs'));
        //,  compact('categoria_itens_selected')
        //'categoria_itens','tipo_itens',,'categoria_itens_selected'
    }

    public function salvar(Request $req){

        $dados=$req->all();

       

        Item::create($dados);

        return redirect()->route('admin.itens')->with('success','ITEM INSERIDO COM SUCESSO');
        
    }


    public function salvar_csv(Request $req){

        $dados=$req->all();

        if($req->hasFile('file_csv')){
            $arquivo_csv= $req->file('file_csv');
            $id_item=pathinfo($arquivo_csv->getClientOriginalName(), PATHINFO_FILENAME);
            $num=rand(1111,9999);
            //$dir= "img/itens_csv_temp";
            $dir= "img/itens_csv_temp/$id_item/";
            // check is directory exist
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $ext= $arquivo_csv->guessClientExtension();
            $nome_imagem="csv_".$num.".".$ext;
            $arquivo_csv->move($dir,$nome_imagem);
            $dados['file_csv']=$dir."/".$nome_imagem;
        }

        

        $itens='';
        $row = 1;
        if (($handle = fopen ( $dados['file_csv'], 'r' )) !== FALSE) {
        while ( ($data = fgetcsv ( $handle, 1000, ';' )) !== FALSE ) {
            if($row == 1){ $row++; continue; }


            //dd($data [2]);
            $csv_data = new Item ();
            $csv_data->codigo = utf8_encode ($data [0]);
            $csv_data->cat_mat = utf8_encode ($data [1]);
            $csv_data->descricao = utf8_encode ($data [2]);
            $csv_data->unidade = utf8_encode ($data [3]);
            $csv_data->trs = utf8_encode ($data [4]);
            $csv_data->save ();
            

            //$itens.=$data[0];
        }
        fclose ( $handle );
        }

        //dd($itens);
       

        //Item::create($dados);

        return redirect()->route('admin.itens')->with('success','ITEM INSERIDO COM SUCESSO');
        
    }





    public function atualizar(Request $req, $id){

        $dados=$req->all();


        if(isset($dados["trs"])){

            $trs=implode(',', $dados["trs"]);
            $dados["trs"]=','.$trs.',';

        }else{
            $dados["trs"]='';

        }

        //$categorias = $req->get('categorias');
        
        /*if(isset($dados["categorias"])){

            $categorias=implode(',', $dados["categorias"]);
            $dados["categorias"]=','.$categorias.',';

        }else{
            $dados["categorias"]='';

        }*/
        //dd($dados["categorias"]);

        Item::find($id)->update($dados);
        return redirect()->route('admin.itens')->with('success','ITEM ATUALIZADO COM SUCESSO');
        
    }

    public function deletar($id){

        Item::find($id)->delete();
        return redirect()->route('admin.itens')->with('success','ITEM EXCLUÍDO COM SUCESSO');
        
    }

    public function search(Request $request){

        $query = $request->query('query');
        $id_evento = $request->query('id_evento');

        http_response_code(500);

        //$evento_item = EventoItem::where('id_evento', $id_evento)->get();   
        $eventos_itens = EventoItem::where('id_evento', $id_evento)->get();

        

        $search = Item::where('descricao','like','%' . $query . '%');

        foreach ($eventos_itens as $item) {
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
