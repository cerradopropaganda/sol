<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class Modalidade extends Model
{
    use Notifiable;

	protected $fillable = [
        'nome', 'fases', 'licitacao_eletronica', 'ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


    	return (object)[
    		'nome'=>'guilherem',
    		'telefone'=>'45646454'
    	];
    }
}
