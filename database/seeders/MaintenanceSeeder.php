<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Maintenance::insert([
            [
                'vehicle_id' => 1,
                'date' => '2025-01-18',
                'description' => 'Ganti oli',
            ],
            [
                'vehicle_id' => 2,
                'date' => '2025-01-18',
                'description' => 'Servis rutin',
            ],
        ]);
    }
}
