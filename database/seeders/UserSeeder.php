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
            ['email' => 'teste@gmail.com'], // Condição para verificar se o usuário já existe
            [
                'name' => 'Test User',
                'password' => Hash::make('12345678'), // Altere a senha conforme necessário
                'is_admin' => false, // Definindo se o usuário é administrador
            ]
        );

        // Criação de um usuário administrador
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // Condição para verificar se o administrador já existe
            [
                'name' => 'Admin User',
                'password' => Hash::make('12345678'), // Definindo a senha do administrador
                'is_admin' => true, // Definindo o usuário como administrador
            ]
        );
    }
}
