<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create vehicle']);
        Permission::create(['name' => 'read vehicle']);
        Permission::create(['name' => 'update vehicle']);
        Permission::create(['name' => 'delete vehicle']);

        Permission::create(['name' => 'create driver']);
        Permission::create(['name' => 'read driver']);
        Permission::create(['name' => 'update driver']);
        Permission::create(['name' => 'delete driver']);

        Permission::create(['name' => 'create booking']);
        Permission::create(['name' => 'read booking']);
        Permission::create(['name' => 'update booking']);
        Permission::create(['name' => 'delete booking']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create maintenance']);
        Permission::create(['name' => 'read maintenance']);
        Permission::create(['name' => 'update maintenance']);
        Permission::create(['name' => 'delete maintenance']);

        Permission::create(['name' => 'approve booking']);
        Permission::create(['name' => 'reject booking']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'create vehicle',
            'read vehicle',
            'update vehicle',
            'delete vehicle',
            'create driver',
            'read driver',
            'update driver',
            'delete driver',
            'create booking',
            'read booking',
            'update booking',
            'delete booking',
            'create user',
            'read user',
            'update user',
            'delete user',
            'create maintenance',
            'read maintenance',
            'update maintenance',
            'delete maintenance',
        ]);

        $approver1 = Role::create(['name' => 'approver1']);
        $approver1->givePermissionTo(['approve booking', 'reject booking']);

        $approver2 = Role::create(['name' => 'approver2']);
        $approver2->givePermissionTo(['approve booking', 'reject booking']);
    }
}
