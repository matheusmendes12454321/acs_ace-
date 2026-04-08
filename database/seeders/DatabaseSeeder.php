<?php

namespace Database\Seeders;

use App\Models\Microarea;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create microareas
        $microareas = [
            ['name' => 'Centro', 'code' => 'CT-01'],
            ['name' => 'Jardim América', 'code' => 'JA-01'],
            ['name' => 'Vila Nova', 'code' => 'VN-01'],
        ];
        
        foreach ($microareas as $area) {
            Microarea::create($area);
        }
        
        // Create admin user
        User::create([
            'name' => 'Administrador',
            'cpf' => '00000000000',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'active' => true
        ]);
        
        // Create ACS user
        User::create([
            'name' => 'Agente de Saúde',
            'cpf' => '11111111111',
            'password' => bcrypt('acs123'),
            'role' => 'acs',
            'microarea_id' => 1,
            'active' => true
        ]);
        
        // Create Supervisor user
        User::create([
            'name' => 'Supervisor',
            'cpf' => '22222222222',
            'password' => bcrypt('super123'),
            'role' => 'supervisor',
            'active' => true
        ]);
    }
}