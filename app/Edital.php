<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Modalidade;

class Edital extends Model
{
    use Notifiable;
    protected $table = 'Editais';
    protected $fillable = [
        'nome', 'edital', 'id_modalidade', 'destinada_srp', 'exclusiva_me_epp', 'exclusiva_itens_me_epp', 'ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


        return (object)[
            'nome'=>'guilherem',
            'telefone'=>'45646454'
        ];
    }

     // Produto belongs to modalidade
    public function modalidade()
    {
        return $this->belongsTo('App\Modalidade');
    }
}
