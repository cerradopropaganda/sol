<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http;
use App\Http\Controllers\Controller;
use Auth;
Use Request;

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

    	return view('admin.login.index');
    }
	
	
	public function entrar(Request $req){
		
		$dados=$req::all();
    //dd($dados);
		if(Auth::guard('admin')->attempt(['username'=>$dados['username'],'password'=>$dados['password']])){
			
			return redirect()->route('admin.index');
		}
		
		return redirect()->route('admin.login');
	}
	

  /*

	public function entrar(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'senha' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->senha], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('admin.index'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
*/
	
	public function sair(){
		
    //dd('oi');
    Auth::guard('admin')->logout();
		return redirect('/');
	}
}
