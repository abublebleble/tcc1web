<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercicio;

class ExercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exercicios = [
            ['nome_exercicio' => 'Supino', 'id_grupo_muscular' => 1],
            ['nome_exercicio' => 'Remada', 'id_grupo_muscular' => 2],
            ['nome_exercicio' => 'Agachamento', 'id_grupo_muscular' => 3],
            ['nome_exercicio' => 'Desenvolvimento', 'id_grupo_muscular' => 4],
            ['nome_exercicio' => 'Rosca', 'id_grupo_muscular' => 5],
            ['nome_exercicio' => 'Abdominal', 'id_grupo_muscular' => 6],
            ['nome_exercicio' => 'Glúteo', 'id_grupo_muscular' => 7],
            ['nome_exercicio' => 'Correr na esteira', 'id_grupo_muscular' => 8],
            ['nome_exercicio' => 'Puxada na frente', 'id_grupo_muscular' => 2],
            ['nome_exercicio' => 'Crossover', 'id_grupo_muscular' => 1],
            ['nome_exercicio' => 'Leg Press', 'id_grupo_muscular' => 3],
            ['nome_exercicio' => 'Levantamento Terra', 'id_grupo_muscular' => 3],
            ['nome_exercicio' => 'Flexão de Braço', 'id_grupo_muscular' => 5],
            ['nome_exercicio' => 'Tríceps na Polia', 'id_grupo_muscular' => 5],
            ['nome_exercicio' => 'Elevação Lateral', 'id_grupo_muscular' => 4],
            ['nome_exercicio' => 'Puxada na Polia', 'id_grupo_muscular' => 2],
            ['nome_exercicio' => 'Stiff', 'id_grupo_muscular' => 3],
            ['nome_exercicio' => 'Dumbbell Fly', 'id_grupo_muscular' => 1],
            ['nome_exercicio' => 'Tríceps Francês', 'id_grupo_muscular' => 5],
            ['nome_exercicio' => 'Prancha', 'id_grupo_muscular' => 6],
            ['nome_exercicio' => 'Cadeira Extensora', 'id_grupo_muscular' => 3],
            ['nome_exercicio' => 'Cadeira Flexora', 'id_grupo_muscular' => 3],
            ['nome_exercicio' => 'Puxada Costas', 'id_grupo_muscular' => 2],
            ['nome_exercicio' => 'Mergulho', 'id_grupo_muscular' => 5],
            ['nome_exercicio' => 'Abdominal Oblíquo', 'id_grupo_muscular' => 6],
            ['nome_exercicio' => 'Bicicleta', 'id_grupo_muscular' => 8],
            ['nome_exercicio' => 'Escalada', 'id_grupo_muscular' => 8],
        ];

        foreach ($exercicios as $exercicio) {
            Exercicio::firstOrCreate([
                'nome_exercicio' => $exercicio['nome_exercicio'],
                'id_grupo_muscular' => $exercicio['id_grupo_muscular'],
            ]);
        }
    }
}
