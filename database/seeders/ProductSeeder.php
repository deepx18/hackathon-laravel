<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop',
            'price' => 1200
        ]);

        Product::create([
            'name' => 'Phone',
            'price' => 800
        ]);

        Product::create([
            'name' => 'Headphones',
            'price' => 150
        ]);
    }
}
