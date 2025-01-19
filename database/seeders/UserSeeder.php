<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'phone_number' => '081234567890',
                'email' => 'admin@testing.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'ade',
                'phone_number' => '081234567891',
                'email' => 'ade@testing.com',
                'password' => bcrypt('password'),
                'role' => null,
            ],
            [
                'name' => 'budi',
                'phone_number' => '081234567892',
                'email' => 'budi@testing.com',
                'password' => bcrypt('password'),
                'role' => null,
            ],
            [
                'name' => 'charlie',
                'phone_number' => '081234567893',
                'email' => 'charlie@testing.com',
                'password' => bcrypt('password'),
                'role' => null,
            ],
            [
                'name' => 'david',
                'phone_number' => '081234567894',
                'email' => 'david@testing.com',
                'password' => bcrypt('password'),
                'role' => null,
            ],
            [
                'name' => 'edward',
                'phone_number' => '081234567895',
                'email' => 'edward@testing.com',
                'password' => bcrypt('password'),
                'role' => null,
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'phone_number' => $userData['phone_number'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            if ($userData['role']) {
                $user->assignRole($userData['role']);
            }
        }
        // User::factory(10)->create();
    }
}
