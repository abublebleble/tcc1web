<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoExercicio extends Model
{
    use HasFactory;

    protected $table = 'treino_exercicio'; // Nome da tabela

    protected $fillable = [
        'id_treino',
        'id_exercicio',
        'ordem',
        'series',
        'repeticoes',
        'carga',
    ];

    // Relação com o modelo Treino
    public function treino()
    {
        return $this->belongsTo(Treino::class, 'id_treino');
    }

    // Relação com o modelo Exercicio
    public function exercicio()
    {
        return $this->belongsTo(Exercicio::class, 'id_exercicio');
    }
}
