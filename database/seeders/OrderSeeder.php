<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;   
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $user = User::first();

    Order::create([
        'user_id' => $user->id,
        'total' => 2000,
        'status' => 'pending'
    ]);
    }
}
