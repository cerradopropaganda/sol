<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http;
use App\Http\Controllers\Controller;
use Auth;
use Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
  /*
    public function __construct()
    {
      $this->middleware('guest:cliente');
    }
    */

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

    	return view('cliente.login.index');
    }
	

	public function entrar(Request $req){
		
		$dados=$req::all();
    
		if(Auth::attempt(['username'=>$dados['username'],'password'=>$dados['password']])){
			
			return redirect()->route('cliente.index');
		}
		
		return redirect()->route('cliente.login');
	}

  /*
	public function entrar(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'username'   => 'required|username',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('cliente.index'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('username', 'remember'));
    } */
	
	public function sair(){

    //dd('opa');
		
		Auth::logout();
		return redirect('/');
	}
}



