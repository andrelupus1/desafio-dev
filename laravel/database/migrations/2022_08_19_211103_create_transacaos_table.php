<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo');
            $table->string('data', 8);
            $table->string('valor', 10);
            $table->string('cpf', 11);
            $table->string('cartao', 12);
            $table->string('hora', 6);
            $table->string('dono', 14);
            $table->string('loja', 19);
            $table->timestamps();

            $table->foreign('tipo')
                    ->references('id')
                    ->on('tipo_transacaos')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacaos');
    }
};