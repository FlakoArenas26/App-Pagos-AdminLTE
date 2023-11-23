<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Agua',
            'amount' => 18000,
        ]);

        Service::create([
            'name' => 'Energía',
            'amount' => 87000,
        ]);

        Service::create([
            'name' => 'Telefonía Móvil',
            'amount' => 16500,
        ]);

        Service::create([
            'name' => 'Internet',
            'amount' => 123000,
        ]);

        Service::create([
            'name' => 'Créditos',
            'amount' => 350000,
        ]);

    }
}
