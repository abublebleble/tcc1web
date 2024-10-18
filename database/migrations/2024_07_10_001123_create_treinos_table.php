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
        if (!Schema::hasTable('treinos')) {
            Schema::create('treinos', function (Blueprint $table) {
                $table->id('id');
                $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade'); // Certifique-se de que este campo está aqui
                $table->string('nome_treino');
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
        Schema::dropIfExists('treinos');
    }
}
