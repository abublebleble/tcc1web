<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMuscular extends Model
{
    use HasFactory;

    protected $table = 'grupo_muscular';
    protected $fillable = ['name'];

    public function exercicios()
    {
        return $this->hasMany(Exercicio::class, 'id_grupo_muscular');
    }
}