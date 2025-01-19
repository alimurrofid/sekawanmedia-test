<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::insert(
            [
                [
                    'name' => 'Toyota Avanza',
                    'type' => 'person',
                    'ownership' => 'owned',
                    'status' => 'available',
                    'created_at' => now(),
                ],
                [
                    'name' => 'Isuzu Elf',
                    'type' => 'cargo',
                    'ownership' => 'rented',
                    'status' => 'available',
                    'created_at' => now(),

                ],
                [
                    'name' => 'Mitsubishi L300',
                    'type' => 'cargo',
                    'ownership' => 'owned',
                    'status' => 'available',
                    'created_at' => now(),

                ]
            ]
        );
    }
}
