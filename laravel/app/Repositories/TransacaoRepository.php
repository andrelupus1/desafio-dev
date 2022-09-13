<?php

namespace App\Repositories;

use App\Models\Transacao;
use Illuminate\Support\Facades\DB;

class TransacaoRepository {

    public function store($transacao) {

        try {
            $ano = substr($transacao['data'],0,4);
            $mes = substr($transacao['data'],4,2);
            $dia = substr($transacao['data'],6,2);

            $hora = substr($transacao['hora'],0,2);
            $minutos = substr($transacao['hora'],3,2);
            $segundos = substr($transacao['hora'],4,2);

            $transacao['valor'] = floatval($transacao['valor'])/100.00;
            $transacao['data'] =  date('Y-m-d',strtotime($ano.'-'.$mes.'-'.$dia));
            $transacao['hora'] = date('h:i:s',strtotime($hora.':'.$minutos.':'.$segundos));
            // $transacao['created_at'] = date_format(now(),'Y-m-d');
            // $transacao['updated_at'] = date_format(now(),'Y-m-d');
            Transacao::create($transacao);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Ficheiro nao compativel"
            ]);
        }
    }

    public function getTransacoes($loja)
    {
        $data = DB::select(
            'SELECT t.tipo, t.data, t.valor, t.cpf, t.cartao, t.hora, t.dono, t.loja, tt.descricao, tt.natureza, tt.sinal '
            .'FROM  transacaos AS t JOIN tipo_transacaos AS tt on t.tipo = tt.tipo WHERE t.loja LIKE  ?  ',
        ['%'.$loja.'%']);

        $SaldoTotal = DB::select(
            'SELECT ( SELECT sum(t.valor) FROM transacaos AS t JOIN tipo_transacaos AS tt ON t.tipo = tt.tipo WHERE t.loja LIKE ? AND tt.sinal = ?) - ( SELECT sum(t.valor) FROM transacaos AS t JOIN tipo_transacaos AS tt ON t.tipo = tt.tipo WHERE t.loja LIKE ? AND tt.sinal = ?) AS total',
        ['%'.$loja.'%','+','%'.$loja.'%','-']);
        $SaldoTotal = array_pop($SaldoTotal);

        return view('operacoes',[
            'data'=> $data,
            'saldo' => $SaldoTotal
        ]);
        
    }

}

