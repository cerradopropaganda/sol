<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Orgao;

class Header extends Model
{
    use Notifiable;
    protected $table = 'headers';
    protected $fillable = [
        'id_usuario','id_orgao', 'cabecalho', 'logomarca', 'ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


        return (object)[
            'nome'=>'guilherem',
            'telefone'=>'45646454'
        ];
    }

     // Produto belongs to modalidade
    public function orgaos()
    {
        return $this->belongsTo('App\Orgao');
    }
}
