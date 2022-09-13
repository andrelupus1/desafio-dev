<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $table = 'transacaos';

    protected $fillable = ['tipo', 'data', 'valor', 'cpf', 'cartao', 'hora', 'dono', 'loja'];

    public $timestamps = true;

    public function tipo()
    {
        return $this->hasOne(TipoTransacao::class, 'tipo');
    }
}