<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::insert([
            [
                'name' => 'Alice Smith',
                'contact' => '09123456789',
                'status' => 'available',
                'created_at' => now(),
            ],
            [
                'name' => 'Bob Johnson',
                'contact' => '09123456789',
                'status' => 'available',
                'created_at' => now(),
            ],
            [
                'name' => 'Charlie Brown',
                'contact' => '09123456789',
                'status' => 'available',
                'created_at' => now(),
            ],
        ]);
    }
}
