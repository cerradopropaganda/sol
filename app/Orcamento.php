<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Itens;

class Orcamento extends Model
{
    use Notifiable;
    protected $table = 'orcamentos';
    protected $fillable = [
        'identificacao_compra', 'numero_item', 'modalidade', 'cat_mat', 'item', 'unidade', 'qtde', 'valor', 'fornecedor', 'orgao', 'unidade_gestora', 'data_compra', 'id_item', 'ordem', 'created_at', 'updated_at'
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
        return $this->belongsTo('App\Itens');
    }
}
