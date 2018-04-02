<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\TermoReferencia;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class CategoriaTR extends Model
{
    use Notifiable;
	protected $table = 'categorias_tr';
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


    public $timestamps = false;

    // Tamanho has many Produtos
    public function termos_referencia()
    {
        return $this->hasMany('App\TermoReferencia');
    }
}
