<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::insert([
            [
                'vehicle_id' => 1,
                'driver_id' => 1,
                'approved_by_level_1' => 2,
                'approved_by_level_2' => 3,
                'start_date' => '2025-01-18',
                'end_date' => '2025-01-18',
                'purpose' => 'Meeting with client',
                'start_odometer' => 1000,
                'end_odometer' => null,
                'fuel_consumed' => null,
                'note' => null,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 2,
                'driver_id' => 2,
                'approved_by_level_1' => 3,
                'approved_by_level_2' => 4,
                'start_date' => '2025-01-18',
                'end_date' => '2025-01-18',
                'purpose' => 'Meeting with client',
                'start_odometer' => 2000,
                'end_odometer' => 2100,
                'fuel_consumed' => 20,
                'note' => 'Tidak ada masalah',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
