<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::create(['name' => 'Super Admin']);
        $superadmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);

        $superadmin->givePermissionTo([
            'create-user',
            // 'edit-user',
        ]);

        $admin->givePermissionTo([
            // 'create-user',
            'edit-user',
            // 'delete-user'

            // 'create-staff',
            'edit-staff',
            // 'delete-staff',
        ]);

        $manager->givePermissionTo([
            'create-staff',
            // 'edit-user'
        ]);
    }
}
