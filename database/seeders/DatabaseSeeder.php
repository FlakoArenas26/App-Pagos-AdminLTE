<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class); //Ejecutamos primero este seeder para crear los roles en la BD
        $this->call(UserSeeder::class); // Ejecutamos este segundo seeder para crear usuarios de prueba, los cuales tendras roles
        $this->call(ServiceSeeder::class);
        // $this->call(PaymentSeeder::class);
        // $this->call(PaymentServiceSeeder::class);
    }
}
