<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage_orders', 'description' => 'Can manage all orders']);
        Permission::create(['name' => 'view_orders', 'description' => 'Can view orders']);
        Permission::create(['name' => 'create_orders', 'description' => 'Can create orders']);
    }
}
