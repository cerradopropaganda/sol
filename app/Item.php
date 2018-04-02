<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ItensCategorias;

class Item extends Model
{
    use Notifiable;
    protected $table = 'itens';
    protected $fillable = [
        'codigo','descricao', 'cat_mat', 'el_despesa', 'unidade', 'trs', 'id_tipo', 'categorias', 'ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


        return (object)[
            'nome'=>'guilherem',
            'telefone'=>'45646454'
        ];
    }

     // Produto belongs to modalidade
    public function ItensCategorias()
    {
        return $this->belongsTo('App\ItensCategorias');
    }
}
