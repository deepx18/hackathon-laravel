<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $order = \App\Models\Order::first();
        $product = \App\Models\Product::first();

        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => $product->price
        ]);
    }
}
