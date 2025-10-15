<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Sample Product 1',
            'price' => 19.99,
            'stock' => 10,
            'created_by' => 1,
        ]);
        Product::create([
            'name' => 'Sample Product 2',
            'price' => 29.99,
            'stock' => 5,
            'created_by' => 1,
        ]);
    }
}
