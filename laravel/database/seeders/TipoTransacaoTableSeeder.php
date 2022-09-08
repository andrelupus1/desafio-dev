<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTransacaoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_transacaos')->delete();
        
        DB::table('tipo_transacaos')->insert(
            [
                0 => [
                    'id' => 1,
                    'tipo' => 1,
                    'descricao' => 'debito',
                    'natureza' => 'entrada',
                    'sinal' => '+',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                1 => [
                    'id' => 2,
                    'tipo' => 2,
                    'descricao' => 'boleto',
                    'natureza' => 'saida',
                    'sinal' => '-',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                2 => [
                    'id' => 3,
                    'tipo' => 3,
                    'descricao' => 'financiamento',
                    'natureza' => 'saida',
                    'sinal' => '-',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                3 => [
                    'id' => 4,
                    'tipo' => 4,
                    'descricao' => 'credito',
                    'natureza' => 'entrada',
                    'sinal' => '+',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                4 => [
                    'id' => 5,
                    'tipo' => 5,
                    'descricao' => 'recebimento emprestimo',
                    'natureza' => 'entrada',
                    'sinal' => '+',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                5 => [
                    'id' => 6,
                    'tipo' => 6,
                    'descricao' => 'vendas',
                    'natureza' => 'entrada',
                    'sinal' => '+',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                6 => [
                    'id' => 7,
                    'tipo' => 7,
                    'descricao' => 'recebimento ted',
                    'natureza' => 'entrada',
                    'sinal' => '+',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                7 => [
                    'id' => 8,
                    'tipo' => 8,
                    'descricao' => 'recebimento doc',
                    'natureza' => 'entrada',
                    'sinal' => '+',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                8 => [
                    'id' => 9,
                    'tipo' => 9,
                    'descricao' => 'aluguel',
                    'natureza' => 'saida',
                    'sinal' => '-',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                

            ]
        );
        
        
    }
}