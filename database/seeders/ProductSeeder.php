<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Sample Product 1',
            'price' => 29.99,
            'stock' => 100,
            'created_by' => 1
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'price' => 49.99,
            'stock' => 50,
            'created_by' => 1
        ]);
    }
}
