<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Item;
use App\ItemCategoria;
use App\ItemTipo;

class ItemCategoria extends Model
{
    use Notifiable;
    protected $table = 'itens_categorias';
    protected $fillable = [
        'nome', 'id_tipo', 'ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


        return (object)[
            'nome'=>'guilherem',
            'telefone'=>'45646454'
        ];
    }

     // Produto belongs to modalidade
    public function Itens()
    {
        return $this->belongsTo('App\Item');
    }
}
