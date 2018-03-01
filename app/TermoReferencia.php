<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

	protected $fillable = [
        'cnpj', 'fantasia', 'data_contrato_inicio', 'data_contrato_final', 'nome_contato', 'email_contato', 'status', 'endereco', 'cidade', 'uf', 'website', 'username', 'password', 'fone1', 'fone2','fone3'
    ];


    //
    public function lista(){


    	return (object)[
    		'nome'=>'guilherem',
    		'telefone'=>'45646454'
    	];
    }
}
