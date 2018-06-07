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
        'id_usuario', 'id_orgao', 'objeto', 'justificativa', 'processo', 'id_fiscal', 'id_pregoeiro','garantia_contratual','porcentagem_garantia', 'id_tr', 'termo_referencia', 'minuta_edital', 'dotacao_orcamentaria', 'id_modalidade', 'embasamento_legal', 'tipo_julgamento', 'tipo_preco', 'destinada_srp', 'prazo_vigencia_ata', 'exclusiva_me_epp','itens_exclusivos_me_epp' , 'id_edital', 'edital', 'numero_licitacao', 'endereco_eletronico_edital', 'endereco_fisico_edital', 'endereco_certame', 'data_abertura_sessao', 'hora_abertura_sessao', 'email_informacoes', 'endereco_eletronico_conexao', 'sistema_licitante', 'data_inicio_proposta_eletronica', 'hora_inicio_proposta_eletronica', 'data_termino_proposta_eletronica', 'hora_termino_proposta_eletronica', 'tempo_duracao_sessao', 'ordem', 'created_at', 'updated_at'
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
