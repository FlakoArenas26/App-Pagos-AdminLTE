<?php

namespace Database\Seeders;

use App\Models\PaymentService;
use Illuminate\Database\Seeder;

class PaymentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceIds = [1, 2, 3]; // Array de IDs de servicios

        foreach ($serviceIds as $serviceId) {
            PaymentService::create([
                'payment_id' => 1,
                'service_id' => $serviceId,
                'amount' => 121500,
            ]);
        }

        $serviceIds2 = [2, 3, 4]; // Array de IDs de servicios

        foreach ($serviceIds2 as $serviceId) {
            PaymentService::create([
                'payment_id' => 2,
                'service_id' => $serviceId,
                'amount' => 121500,
            ]);
        }

        $serviceIds3 = [3, 4, 5]; // Array de IDs de servicios

        foreach ($serviceIds3 as $serviceId) {
            PaymentService::create([
                'payment_id' => 3,
                'service_id' => $serviceId,
                'amount' => 121500,
            ]);
        }

        $serviceIds4 = [4, 5]; // Array de IDs de servicios

        foreach ($serviceIds4 as $serviceId) {
            PaymentService::create([
                'payment_id' => 4,
                'service_id' => $serviceId,
                'amount' => 121500,
            ]);
        }

        $serviceIds5 = [1, 2, 3, 4, 5]; // Array de IDs de servicios

        foreach ($serviceIds5 as $serviceId) {
            PaymentService::create([
                'payment_id' => 5,
                'service_id' => $serviceId,
                'amount' => 121500,
            ]);
        }

    }
}
