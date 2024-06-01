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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage products']);

        // create roles and assign created permissions
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminRole->givePermissionTo(['manage users', 'manage categories', 'manage products']);

        $userRole = Role::create(['name' => 'User']);
        $userRole->givePermissionTo(['manage categories', 'manage products']);
    }
}
