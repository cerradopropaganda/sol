<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
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

    	return view('admin.index');
    }
}
