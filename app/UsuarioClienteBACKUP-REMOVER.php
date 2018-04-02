<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsuarioCliente extends Authenticatable
{
    use Notifiable;
	protected $table = 'usuarios_cliente';
	protected $fillable = [
        'id_usuario', 'nome_contato', 'email_contato', 'fone1', 'fone2', 'fone3', 'username', 'password', 'ordem', 'fone2','fone3','ordem','remember_token', 'nivel', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


    	return (object)[
    		'nome'=>'guilherem',
    		'telefone'=>'45646454'
    	];
    }
}
