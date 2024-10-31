<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Verifica se a tabela 'treinos' já não existe
        if (!Schema::hasTable('treinos')) {
            Schema::create('treinos', function (Blueprint $table) {
                $table->id('id');
                $table->string('nome_treino');
                $table->unsignedBigInteger('user_id'); // Criação da coluna user_id
                
                // Definindo a chave estrangeira após a criação da coluna
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove a chave estrangeira antes de apagar a tabela
        Schema::table('treinos', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Remover a chave estrangeira
        });

        Schema::dropIfExists('treinos');
    }
}
