<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::updateOrCreate(
            ['email' => 'ysly305@gmail.com'],
            [
                'name' => 'AashaTech Pvt. Ltd.',
                'password' => Hash::make('pass12345')
            ]
        );
        $superAdmin->assignRole('Super Admin');

        $admin = User::updateOrCreate(
            ['email' => 'ysly306@gmail.com'],
            [
            'name' => 'AashaTech Branch Office',
            'password' => Hash::make('pass1234')
        ]
        );
        $manager = User::updateOrCreate(
            ['email' => 'ysly307@gmail.com'],
            [
                'name' => 'AashaTech Manager',
                'password' => Hash::make('pass123'),
            ]
        );
        $manager->assignRole('Manager');
    }
}




// <?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use App\Models\User; // Assuming your user model is located in this namespace
// use Illuminate\Support\Facades\Hash;

// class RolesAndPermissionsSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         // Create roles
//         Role::create(['name' => 'superadmin']);
//         Role::create(['name' => 'customer']);
//         Role::create(['name' => 'vendor']);

//         // Define permissions
//         $permissions = [
//             'manage_users',
//             'manage_products',
//             'manage_orders',
//             'view_reports',
//             'manage_business_profile',
//             'manage_customer_profile',
//             'make_payments',
//             'view_business_dashboard',
//             'view_customer_dashboard'
//         ];

//         // Create permissions
//         foreach ($permissions as $permission) {
//             Permission::create(['name' => $permission]);
//         }

//         // Assign all permissions to superadmin
//         $superadminRole = Role::where('name', 'superadmin')->first();
//         $permissions = Permission::pluck('id', 'id')->all();
//         $superadminRole->syncPermissions($permissions);

//         // Create superadmin user
//         $superadmin = User::create([
//             'name' => 'Superadmin',
//             'email' => 'superadmin@gmail.com',
//             'password' => Hash::make('password'), // Change 'password' to your desired superadmin password
//         ]);

//         // Assign superadmin role to the superadmin user
//         $superadmin->assignRole('superadmin');
//     }
// }

