<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Service;
use App\Models\User; // Asegúrate de importar el modelo de usuario si no está importado

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener los tres usuarios existentes
        $users = User::all();

        // Obtener servicios (asumo que se tomarán los primeros cinco servicios)
        $services = Service::take(5)->get();

        // Crear pagos para cada servicio y usuario
        foreach ($services as $index => $service) {
            $user = $users->get($index % $users->count()); // Obtener uno de los tres usuarios en orden circular

            Payment::create([
                'user_id' => $user->id,
                // 'service_id' => $service->id,
                'amount' => $service->amount,
                'date' => now(),
            ]);
        }
    }
}
