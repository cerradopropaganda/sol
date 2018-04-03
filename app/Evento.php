<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Evento;
use App\Orgao;
use App\Fiscal;

class Evento extends Model
{
    use Notifiable;
    protected $table = 'eventos';
    protected $fillable = [
        'id_usuario', 'id_orgao', 'objeto', 'justificativa', 'processo', 'id_fiscal', 'id_tr', 'termo_referencia', 'dotacao_orcamentaria', 'id_modalidade', 'embasamento_legal', 'tipo_julgamento', 'destinada_srp', 'prazo_vigencia_ata', 'exclusiva_me_epp','itens_exclusivos_me_epp', 'ordem', 'created_at', 'updated_at'
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

     // Produto belongs to modalidade
    public function fiscais()
    {
        return $this->belongsTo('App\Fiscal');
    }

    /*
        // Tamanho has many Produtos
        public function editais()
        {
            return $this->hasMany('App\Edital');
        }
    */


}
