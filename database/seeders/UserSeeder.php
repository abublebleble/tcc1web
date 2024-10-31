<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criação de um usuário padrão se ele não existir
        User::firstOrCreate(
            ['email' => 'test@example.com'], // Condição para verificar se o usuário já existe
            [
                'name' => 'Test User',
                'password' => Hash::make('password'), // Altere a senha conforme necessário
            ]
        );
    }
}
