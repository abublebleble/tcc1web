<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('progresso')) {
            Schema::create('progresso', function (Blueprint $table) {
                $table->id('id');
                
                // Referenciando corretamente a coluna 'treino_exercicio_id' da tabela 'treino_exercicio'
                $table->foreignId('id_treino_exercicio')->references('id')->on('treino_exercicio')->onDelete('cascade');
                
                $table->date('data');
                $table->decimal('carga', 5, 2);
                $table->integer('repeticoes_realizadas');
                
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
        Schema::dropIfExists('progresso');
    }
}
