<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








Route::get('/', function () {
    return view('home');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


//Route::get('/home', 'HomeController@index');
//Route::get('/cliente', ['as'=>'cliente.index','uses'=>'Cliente\IndexController@index']);


//Route::get('/admin/login', 'Admin\LoginController@index')->name('login');
//Route::post('/admin/login/entrar', ['as'=>'admin.login.entrar','uses'=>'Admin\LoginController@entrar']);
//Route::post('/admin/login/sair', ['as'=>'admin.login.sair','uses'=>'Admin\LoginController@sair'])->name('logout');

//Route::get('/cliente/', ['as'=>'cliente.index','uses'=>'Cliente\IndexController@index']);//->name('cliente.index')
Route::get('/cliente/login', 'Cliente\LoginController@index')->name('cliente.login');
Route::get('/cliente/login/sair', ['as'=>'cliente.login.sair','uses'=>'Cliente\LoginController@sair']);
Route::post('/cliente/login/entrar', ['as'=>'cliente.login.entrar','uses'=>'Cliente\LoginController@entrar']);



Route::group(array('prefix' => '/cliente', 'middleware' =>  ['auth']), function() { 
	//Route::group(['prefix' => '/cliente', 'middleware' => 'cliente'], function() {

//Route::prefix('cliente')->group(function() {
	Route::get('/', ['as'=>'cliente.index','uses'=>'Cliente\IndexController@index']);//->name('cliente.index')
	//Route::get('/login', 'Cliente\LoginController@index')->name('cliente.login');
	//Route::post('/login/entrar', ['as'=>'cliente.login.entrar','uses'=>'Cliente\LoginController@entrar']);;
	//Route::post('/login/sair', ['as'=>'cliente.login.sair','uses'=>'Cliente\LoginController@sair']);

	
	/* ROTAS USÁRIO - ADMIN */
	Route::get('/usuarios', ['as'=>'cliente.usuarios','uses'=>'Cliente\UsuarioClienteController@index']);
	Route::get('/usuarios/adicionar', ['as'=>'cliente.usuarios.adicionar','uses'=>'Cliente\UsuarioClienteController@adicionar']);
	Route::post('/usuarios/salvar', ['as'=>'cliente.usuarios.salvar','uses'=>'Cliente\UsuarioClienteController@salvar']);
	Route::get('/usuarios/editar/{id?}', ['as'=>'cliente.usuarios.editar','uses'=>'Cliente\UsuarioClienteController@editar']);
	Route::put('/usuarios/atualizar/{id?}', ['as'=>'cliente.usuarios.atualizar','uses'=>'Cliente\UsuarioClienteController@atualizar']);
	Route::get('/usuarios/deletar/{id?}', ['as'=>'cliente.usuarios.deletar','uses'=>'Cliente\UsuarioClienteController@deletar']);


	/* ROTAS ORGÃOS SOLICITANTES - CLIENTE */
	Route::get('/orgaos',['as' => 'cliente.orgaos','uses'=>'Cliente\OrgaoController@index']);
	Route::get('/orgaos/adicionar',['as' => 'cliente.orgaos.adicionar','uses'=>'Cliente\OrgaoController@adicionar']);
	Route::post('/orgaos/salvar', ['as'=>'cliente.orgaos.salvar','uses'=>'Cliente\OrgaoController@salvar']);
	Route::get('/orgaos/editar/{id?}', ['as'=>'cliente.orgaos.editar','uses'=>'Cliente\OrgaoController@editar']);
	Route::put('/orgaos/atualizar/{id?}', ['as'=>'cliente.orgaos.atualizar','uses'=>'Cliente\OrgaoController@atualizar']);
	Route::get('/orgaos/deletar/{id?}', ['as'=>'cliente.orgaos.deletar','uses'=>'Cliente\OrgaoController@deletar']);

	/* ROTAS FISCAIS DE CONTRATO - CLIENTE */
	Route::get('/fiscais',['as' => 'cliente.fiscais','uses'=>'Cliente\FiscalController@index']);
	Route::get('/fiscais/adicionar',['as' => 'cliente.fiscais.adicionar','uses'=>'Cliente\FiscalController@adicionar']);
	Route::post('/fiscais/salvar', ['as'=>'cliente.fiscais.salvar','uses'=>'Cliente\FiscalController@salvar']);
	Route::get('/fiscais/editar/{id?}', ['as'=>'cliente.fiscais.editar','uses'=>'Cliente\FiscalController@editar']);
	Route::put('/fiscais/atualizar/{id?}', ['as'=>'cliente.fiscais.atualizar','uses'=>'Cliente\FiscalController@atualizar']);
	Route::get('/fiscais/deletar/{id?}', ['as'=>'cliente.fiscais.deletar','uses'=>'Cliente\FiscalController@deletar']);
	
	/* ROTAS LOGOMARCA E CABEÇALHO - CLIENTE */
	Route::get('/header',['as' => 'cliente.header','uses'=>'Cliente\HeaderController@index']);
	Route::get('/header/adicionar',['as' => 'cliente.header.adicionar','uses'=>'Cliente\HeaderController@adicionar']);
	Route::post('/header/salvar', ['as'=>'cliente.header.salvar','uses'=>'Cliente\HeaderController@salvar']);
	Route::get('/header/editar/{id?}', ['as'=>'cliente.header.editar','uses'=>'Cliente\HeaderController@editar']);
	Route::put('/header/atualizar/{id?}', ['as'=>'cliente.header.atualizar','uses'=>'Cliente\HeaderController@atualizar']);
	Route::get('/header/deletar/{id?}', ['as'=>'cliente.header.deletar','uses'=>'Cliente\HeaderController@deletar']);

	/* ROTAS EVENTOS - CLIENTE */
	Route::get('/eventos',['as' => 'cliente.eventos', function () {    				return view('cliente.eventos.index');	}]);
	
	
	/* EVENTOS - FASE INICIAL */
	//Route::get('/eventos/fase_inicial',['as' => 'cliente.eventos.fase_inicial',  function () {   		return view('cliente.eventos.fase_inicial');	}]);

	Route::get('/eventos/fase_inicial',['as' => 'cliente.eventos.fase_inicial','uses'=>'Cliente\EventoController@fase_inicial']);
	Route::get('/eventos/adicionar',['as' => 'cliente.eventos.adicionar','uses'=>'Cliente\EventoController@adicionar']);
	Route::post('/eventos/salvar', ['as'=>'cliente.eventos.salvar','uses'=>'Cliente\EventoController@salvar']);
	Route::get('/eventos/fase_inicial_editar/{id?}', ['as'=>'cliente.eventos.fase_inicial_editar','uses'=>'Cliente\EventoController@fase_inicial_editar']);
	Route::get('/eventos/fase_final',['as' => 'cliente.eventos.fase_final','uses'=>'Cliente\EventoController@fase_final']);
	Route::get('/eventos/concluidos',['as' => 'cliente.eventos.concluidos', 'uses'=>'Cliente\EventoController@concluidos']);
	Route::post('/eventos/atualizar/{id?}', ['as'=>'cliente.eventos.atualizar','uses'=>'Cliente\EventoController@atualizar']);
	Route::get('/eventos/deletar/{id?}', ['as'=>'cliente.eventos.deletar','uses'=>'Cliente\EventoController@deletar']);
	Route::get('/eventos/fase_final_editar/{id?}',['as' => 'cliente.eventos.fase_final_editar','uses'=>'Cliente\EventoController@fase_final_editar']);


	Route::get('/eventos/itens/search',['as' => 'cliente.eventos.itens.search','uses'=>'Admin\ItemController@search']);
	Route::post('/eventos/itens/salvar',['as' => 'cliente.eventos.item.salvar','uses'=>'Cliente\EventoItemController@salvar']);
	Route::post('/eventos/itens/trs',['as' => 'cliente.eventos.itens.trs','uses'=>'Admin\TermoReferenciaController@listartritens']);

	Route::get('/eventos/itens/deletar/{id?}', ['as'=>'cliente.eventos.item.deletar','uses'=>'Cliente\EventoItemController@deletar']);
	//Route::post('/eventos/itens/salvar',['as' => 'cliente.eventos.item.salvar', function(Request $request){
	    //$EventoItem = EventoItem::salvar($request->all());

	    //return Response::json($EventoItem);
	//}]);


	//Route::get('/eventos/fase_inicial_editar',['as' => 'cliente.eventos.fase_inicial_editar',  function () {   		return view('cliente.eventos.fase_inicial_editar');	}]);


	

	Route::get('/eventos/concluidos_download',['as' => 'cliente.eventos.concluidos_download',  function () {   		return view('cliente.eventos.concluidos_download');	}]);
	
	//Route::get('/eventos/fase_inicial_editar',['as' => 'cliente.eventos.fase_inicial_editar',  function () {   		return view('cliente.eventos.fase_inicial_editar');	}]);
	


	

	Route::get('/eventos/etapa1',['as' => 'cliente.eventos.etapa1',  function () {   		return view('cliente.eventos.novo');	}]);
	Route::get('/eventos/etapa2',['as' => 'cliente.eventos.etapa2',  function () {   		return view('cliente.eventos.novo');	}]);
	Route::get('/eventos/etapa3',['as' => 'cliente.eventos.etapa3',  function () {   		return view('cliente.eventos.novo');	}]);
	Route::get('/eventos/etapa4',['as' => 'cliente.eventos.etapa4',  function () {   		return view('cliente.eventos.novo');	}]);
	
	
	//Route::get('/eventos/novo',['as' => 'cliente.eventos.novo',  function () {   		return view('cliente.eventos.novo');	}]);
	//	Route::get('/eventos/adicionar',['as' => 'cliente.eventos.adicionar',  function () {   		return view('cliente.eventos.adicionar');	}]);
	//	Route::get('/eventos/escolher_tr',['as' => 'cliente.eventos.escolher_tr',  function () {   		return view('cliente.eventos.escolher_tr');	}]);

	//Route::get('/eventos/escolher_objeto',['as' => 'cliente.eventos.escolher_objeto',  function () {   		return view('cliente.eventos.escolher_objeto');	}]);
	//Route::get('/eventos/escolher_objeto_tipo',['as' => 'cliente.eventos.escolher_objeto_tipo',  function () {   		return view('cliente.eventos.escolher_objeto_tipo');	}]);

	//Route::get('/eventos/especificar_itens',['as' => 'cliente.eventos.especificar_itens',  function () {   		return view('cliente.eventos.especificar_itens');	}]);
	//	Route::get('/eventos/fase_interna',['as' => 'cliente.eventos.fase_interna',  function () {   		return view('cliente.eventos.fase_interna');	}]);
	//	Route::get('/eventos/fase_externa',['as' => 'cliente.eventos.fase_externa',  function () {   		return view('cliente.eventos.fase_externa');	}]);
	//	Route::get('/eventos/fase_interna_download',['as' => 'cliente.eventos.fase_interna_download',  function () {   		return view('cliente.eventos.fase_interna_download');	}]);
	//	Route::get('/eventos/fase_externa_download',['as' => 'cliente.eventos.fase_externa_download',  function () {   		return view('cliente.eventos.fase_externa_download');	}]);

	Route::get('/eventos/editar/{id?}', ['as'=>'cliente.eventos.editar','uses'=>'Cliente\EventoController@editar']);

	

	//});

});


Route::prefix('admin')->group(function() {
	Auth::routes();

	/* ROTAS LOGIN - ADMIN */
	Route::get('/', ['as'=>'admin.index','uses'=>'Admin\IndexController@index']);
	Route::get('/login', 'Admin\LoginController@index')->name('admin.login');
	Route::get('/login/sair', ['as'=>'admin.login.sair','uses'=>'Admin\LoginController@sair']);
	Route::post('/login/entrar',['as'=>'admin.login.entrar','uses'=>'Admin\LoginController@entrar']);
	
	/* ROTAS USÁRIO - ADMIN */
	Route::get('/usuarios', ['as'=>'admin.usuarios','uses'=>'Admin\UsuarioController@index']);
	Route::get('/usuarios/adicionar', ['as'=>'admin.usuarios.adicionar','uses'=>'Admin\UsuarioController@adicionar']);
	Route::post('/usuarios/salvar', ['as'=>'admin.usuarios.salvar','uses'=>'Admin\UsuarioController@salvar']);
	Route::get('/usuarios/editar/{id?}', ['as'=>'admin.usuarios.editar','uses'=>'Admin\UsuarioController@editar']);
	Route::put('/usuarios/atualizar/{id?}', ['as'=>'admin.usuarios.atualizar','uses'=>'Admin\UsuarioController@atualizar']);
	Route::get('/usuarios/deletar/{id?}', ['as'=>'admin.usuarios.deletar','uses'=>'Admin\UsuarioController@deletar']);
	
	/* ROTAS ITENS - ADMIN */
	Route::get('/itens',['as' => 'admin.itens','uses'=>'Admin\ItemController@index']);
	Route::get('/itens/adicionar',['as' => 'admin.itens.adicionar','uses'=>'Admin\ItemController@adicionar']);
	Route::post('/itens/salvar', ['as'=>'admin.itens.salvar','uses'=>'Admin\ItemController@salvar']);
	Route::post('/itens/salvar_csv', ['as'=>'admin.itens.salvar_csv','uses'=>'Admin\ItemController@salvar_csv']);
	Route::get('/itens/editar/{id?}', ['as'=>'admin.itens.editar','uses'=>'Admin\ItemController@editar']);
	Route::put('/itens/atualizar/{id?}', ['as'=>'admin.itens.atualizar','uses'=>'Admin\ItemController@atualizar']);
	Route::get('/itens/deletar/{id?}', ['as'=>'admin.itens.deletar','uses'=>'Admin\ItemController@deletar']);
	Route::get('/itens/dropdown/{id}', function($id){ $itens_categorias = App\ItemCategoria::where('id_tipo', $id)->get();	return $itens_categorias->pluck('nome', 'id');});

	/* ROTAS ORÇAMENTOS - ADMIN */
	Route::get('/orcamentos',['as' => 'admin.orcamentos', function () {    				return view('admin.orcamentos.index');	}]);
	Route::get('/orcamentos/adicionar',['as' => 'admin.orcamentos.adicionar',  function () {   		return view('admin.orcamentos.adicionar');	}]);
	Route::post('/orcamentos/salvar', ['as'=>'admin.orcamentos.salvar','uses'=>'Admin\OrcamentoController@salvar']);
	Route::get('/orcamentos/editar/{id?}', ['as'=>'admin.orcamentos.editar','uses'=>'Admin\OrcamentoController@editar']);
	Route::put('/orcamentos/atualizar/{id?}', ['as'=>'admin.orcamentos.atualizar','uses'=>'Admin\OrcamentoController@atualizar']);
	Route::get('/orcamentos/deletar/{id?}', ['as'=>'admin.orcamentos.deletar','uses'=>'Admin\OrcamentoController@deletar']);

	/* ROTAS TERMOS DE REFERÊNCIA - ADMIN */
	Route::get('/termos-referencia',['as' => 'admin.termos-referencia','uses'=>'Admin\TermoReferenciaController@index']);
	Route::get('/termos-referencia/adicionar',['as' => 'admin.termos-referencia.adicionar','uses'=>'Admin\TermoReferenciaController@adicionar']);
	Route::post('/termos-referencia/salvar', ['as'=>'admin.termos-referencia.salvar','uses'=>'Admin\TermoReferenciaController@salvar']);
	Route::get('/termos-referencia/editar/{id?}', ['as'=>'admin.termos-referencia.editar','uses'=>'Admin\TermoReferenciaController@editar']);
	Route::put('/termos-referencia/atualizar/{id?}', ['as'=>'admin.termos-referencia.atualizar','uses'=>'Admin\TermoReferenciaController@atualizar']);
	Route::get('/termos-referencia/deletar/{id?}', ['as'=>'admin.termos-referencia.deletar','uses'=>'Admin\TermoReferenciaController@deletar']);

	/* ROTAS EDITAIS - ADMIN */
	Route::get('/editais',['as' => 'admin.editais','uses'=>'Admin\EditalController@index']);
	Route::get('/editais/adicionar',['as' => 'admin.editais.adicionar','uses'=>'Admin\EditalController@adicionar']);
	Route::post('/editais/salvar', ['as'=>'admin.editais.salvar','uses'=>'Admin\EditalController@salvar']);
	Route::get('/editais/editar/{id?}', ['as'=>'admin.editais.editar','uses'=>'Admin\EditalController@editar']);
	Route::put('/editais/atualizar/{id?}', ['as'=>'admin.editais.atualizar','uses'=>'Admin\EditalController@atualizar']);
	Route::get('/editais/deletar/{id?}', ['as'=>'admin.editais.deletar','uses'=>'Admin\EditalController@deletar']);

	/* ROTAS DOCUMENTOS - ADMIN */
	Route::get('/documentos',['as' => 'admin.documentos','uses'=>'Admin\DocumentoController@index']);
	Route::get('/documentos/adicionar',['as' => 'admin.documentos.adicionar','uses'=>'Admin\DocumentoController@adicionar']);
	Route::post('/documentos/salvar', ['as'=>'admin.documentos.salvar','uses'=>'Admin\DocumentoController@salvar']);
	Route::get('/documentos/editar/{id?}', ['as'=>'admin.documentos.editar','uses'=>'Admin\DocumentoController@editar']);
	Route::put('/documentos/atualizar/{id?}', ['as'=>'admin.documentos.atualizar','uses'=>'Admin\DocumentoController@atualizar']);
	Route::get('/documentos/deletar/{id?}', ['as'=>'admin.documentos.deletar','uses'=>'Admin\DocumentoController@deletar']);


	/* ROTAS MODALIDADES - ADMIN */
	Route::get('/modalidades',['as' => 'admin.modalidades','uses'=>'Admin\ModalidadeController@index']);
	Route::get('/modalidades/adicionar', ['as'=>'admin.modalidades.adicionar','uses'=>'Admin\ModalidadeController@adicionar']);
	Route::post('/modalidades/salvar', ['as'=>'admin.modalidades.salvar','uses'=>'Admin\ModalidadeController@salvar']);
	Route::get('/modalidades/editar/{id?}', ['as'=>'admin.modalidades.editar','uses'=>'Admin\ModalidadeController@editar']);
	Route::put('/modalidades/atualizar/{id?}', ['as'=>'admin.modalidades.atualizar','uses'=>'Admin\ModalidadeController@atualizar']);
	Route::get('/modalidades/deletar/{id?}', ['as'=>'admin.modalidades.deletar','uses'=>'Admin\ModalidadeController@deletar']);

	
});



/*
// ROTAS LOGIN - ADMIN 
//Auth::routes(); // criar rotas de autenticação automaticamente
Route::get('/admin/login', 'Admin\LoginController@index')->name('login');
Route::post('/admin/login/entrar', ['as'=>'admin.login.entrar','uses'=>'Admin\LoginController@entrar']);
Route::post('/admin/login/sair', ['as'=>'admin.login.sair','uses'=>'Admin\LoginController@sair'])->name('logout');




// ROTAS PROTEGIDAS - ADMIN 
Route::group(['middleware'=>'auth'],function(){
	
	
	// CRUD USUÁRIOS - ADMIN
	Route::get('/admin', ['as'=>'admin.index','uses'=>'Admin\IndexController@index']);
	Route::get('/admin/usuarios', ['as'=>'admin.usuarios','uses'=>'Admin\UsuarioController@index']);
	Route::get('/admin/usuarios/adicionar', ['as'=>'admin.usuarios.adicionar','uses'=>'Admin\UsuarioController@adicionar']);
	Route::post('/admin/usuarios/salvar', ['as'=>'admin.usuarios.salvar','uses'=>'Admin\UsuarioController@salvar']);
	Route::get('/admin/usuarios/editar/{id?}', ['as'=>'admin.usuarios.editar','uses'=>'Admin\UsuarioController@editar']);
	Route::put('/admin/usuarios/atualizar/{id?}', ['as'=>'admin.usuarios.atualizar','uses'=>'Admin\UsuarioController@atualizar']);
	Route::get('/admin/usuarios/deletar/{id?}', ['as'=>'admin.usuarios.deletar','uses'=>'Admin\UsuarioController@deletar']);
	
	
});



*/

/*
Route::group(array('prefix' => '/cliente', 'middleware' => 'auth'), function() { 

	Route::get('/cliente/login', 'Admin\LoginController@index')->name('login');
	Route::get('/cliente', ['as'=>'cliente.index','uses'=>'Cliente\IndexController@index']);

});
*/
