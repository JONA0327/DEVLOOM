<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@devloom.com'],
            [
                'name'         => 'Super Admin',
                'password'     => Hash::make('DevLoom@2026!'),
                'is_superadmin' => true,
            ]
        );

        $this->command->info('Superadmin creado: superadmin@devloom.com / DevLoom@2026!');
        $this->command->warn('CAMBIA la contraseña después del primer inicio de sesión.');
    }
}
