<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Orgao;

class Orgao extends Model
{
    use Notifiable;
    protected $table = 'orgaos';
    protected $fillable = [
        'id_usuario', 'nome', 'cnpj', 'endereco', 'ordenador_nome', 'ordenador_sexo', 'ordenador_cargo', 'dirigente_tipo', 'dirigente_nome', 'dirigente_sexo', 'dirigente_cpf','ordem', 'created_at', 'updated_at'
    ];


    //
    public function lista(){


        return (object)[
            'nome'=>'guilherem',
            'telefone'=>'45646454'
        ];
    }

}
