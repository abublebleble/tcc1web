<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    protected $table = 'treinos';
    protected $fillable = ['nome_treino', 'user_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function exercicios()
    {
        return $this->belongsToMany(Exercicio::class, 'treino_exercicio', 'id_treino', 'id_exercicio');
    }
}
