<?php

namespace Database\Seeders;

use Domains\Products\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PRODUCTS_QUANTITY = fake()->numberBetween(5, 25);

        Product::factory()->count($PRODUCTS_QUANTITY)->create();
    }
}
