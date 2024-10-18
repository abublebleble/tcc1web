<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progresso extends Model
{
    use HasFactory;

    protected $table = 'progresso';

    protected $fillable = [
        'id_treino_exercicio', 
        'data', 
        'carga', 
        'repeticoes_realizadas'
    ];

    // Relacionamento com TreinoExercicio
    public function treinoExercicio()
    {
        return $this->belongsTo(TreinoExercicio::class, 'id_treino_exercicio');
    }
}
