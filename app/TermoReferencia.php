<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\CategoriaTR;

class TermoReferencia extends Model
{
    use Notifiable;
    protected $table = 'termos_referencia';
    protected $fillable = [
        'codigo','nome', 'id_categoria', 'termo_referencia', 'ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


        return (object)[
            'nome'=>'guilherem',
            'telefone'=>'45646454'
        ];
    }

     // Produto belongs to modalidade
    public function categorias()
    {
        return $this->belongsTo('App\CategoriaTR');
    }
}
