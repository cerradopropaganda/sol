<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Evento;
use App\Item;

class EventoItem extends Model
{
    use Notifiable;
    protected $table = 'eventos_itens';
    protected $fillable = [
        'id_evento','id_usuario', 'id_item', 'qtde', 'cotacoes', 'ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


        return (object)[
            'nome'=>'guilherem',
            'telefone'=>'45646454'
        ];
    }

     // Produto belongs to itens
    public function itens()
    {
        return $this->belongsTo('App\Item');
    }

     // Produto belongs to eventos
    public function eventos()
    {
        return $this->belongsTo('App\Evento');
    }

    /*
        // Tamanho has many Produtos
        public function editais()
        {
            return $this->hasMany('App\Edital');
        }
    */


}
