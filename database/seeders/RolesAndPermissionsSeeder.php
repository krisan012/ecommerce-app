<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Administrator']);
        $userRole = Role::create(['name' => 'User']);

        // Create permissions
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage users']);

        // Assign permissions to roles
        $adminRole->givePermissionTo('manage products');
        $adminRole->givePermissionTo('manage categories');
        $adminRole->givePermissionTo('manage users');

        $userRole->givePermissionTo('manage products');
        $userRole->givePermissionTo('manage categories');
    }
}
