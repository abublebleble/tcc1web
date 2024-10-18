<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoExercicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('treino_exercicio')) {
            Schema::create('treino_exercicio', function (Blueprint $table) {
                $table->id(); // Usando o id padrão para a chave primária
                $table->foreignId('id_treino')->constrained('treinos')->onDelete('cascade');
                $table->foreignId('id_exercicio')->constrained('exercicios')->onDelete('cascade'); // Verifique esta linha
                $table->integer('ordem');
                $table->integer('series');
                $table->integer('repeticoes');
                $table->decimal('carga', 5, 2);
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
        Schema::dropIfExists('treino_exercicio');
    }
}
