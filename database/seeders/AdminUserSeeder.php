<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email    = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command?->warn('ADMIN_EMAIL / ADMIN_PASSWORD não definidos no .env — usuário admin NÃO criado.');
            return;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name'     => env('ADMIN_NAME', 'Administrador'),
                'password' => $password, // o cast "hashed" do model User faz o hash
            ]
        );

        $this->command?->info("Admin criado/atualizado: {$email}");
    }
}
