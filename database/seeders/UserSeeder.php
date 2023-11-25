<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rafael Arenas',
            'email' => 'rafa@gmail.com',
            'password' => bcrypt('Rafa-123'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Miguel Herrera',
            'email' => 'miguel@gmail.com',
            'password' => bcrypt('Miguel-123'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Valeria Martínez',
            'email' => 'valeria@gmail.com',
            'password' => bcrypt('Vale-123'),
        ])->assignRole('Usuario');

        // User::factory()->create();

    }
}
