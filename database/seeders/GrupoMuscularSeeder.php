<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GrupoMuscular;

class GrupoMuscularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gruposMusculares = [
            ['name' => 'Peito'],
            ['name' => 'Costas'],
            ['name' => 'Pernas'],
            ['name' => 'Ombros'],
            ['name' => 'Braços'],
            ['name' => 'Abdômen'],
            ['name' => 'Glúteos'],
            ['name' => 'Cardio'],
        ];

        foreach ($gruposMusculares as $grupo) {
            GrupoMuscular::firstOrCreate(['name' => $grupo['name']]);
        }
    }
}
