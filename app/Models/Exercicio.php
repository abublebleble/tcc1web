<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;

    protected $table = 'exercicios';
    protected $fillable = ['nome_exercicio', 'descricao', 'id_grupo_muscular'];

    public function grupoMuscular()
    {
        return $this->belongsTo(GrupoMuscular::class, 'id_grupo_muscular');
    }

    public function treinos()
    {
        return $this->belongsToMany(Treino::class, 'treino_exercicio', 'id_exercicio', 'id_treino');
    }
}