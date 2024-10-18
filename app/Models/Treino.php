<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    protected $table = 'treinos';
    protected $fillable = ['id_usuario', 'nome_treino']; // Certifique-se de que 'id_usuario' está aqui

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario'); // Altere Usuario para User, se você está usando o modelo padrão do Laravel
    }

    public function exercicios()
    {
        return $this->belongsToMany(Exercicio::class, 'treino_exercicio', 'id_treino', 'id_exercicio');
    }
}