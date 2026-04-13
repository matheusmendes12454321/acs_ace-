<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder vazio - descomente abaixo para criar usuário admin
        // User::create([
        //     'name' => 'Administrador',
        //     'email' => 'admin@saude.gov.br',
        //     'cpf' => '000.000.000-00',
        //     'password' => Hash::make('123456'),
        //     'funcao' => 'administrador',
        //     'ativo' => true,
        // ]);
    }
}
