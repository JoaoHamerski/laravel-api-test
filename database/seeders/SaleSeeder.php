<?php

namespace Database\Seeders;

use Domains\Products\Models\Product;
use Domains\Sales\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SALES_QUANTITY = fake()->numberBetween(5, 10);

        if (!Product::query()->count()) {
            $this->call(ProductSeeder::class);
        }

        Sale::factory()
            ->count($SALES_QUANTITY)
            ->create()
            ->each(function (Sale $sale) {
                $this->attachProducts($sale);
            });
    }

    private function attachProducts(Sale $sale)
    {
        $PRODUCTS_QUANTITY = fake()->numberBetween(0, 10);

        $products = Product::query()
            ->inRandomOrder()
            ->take($PRODUCTS_QUANTITY)
            ->get();

        $productIds = $products->pluck('id');


        $sale->products()->attach(
            fake()->randomElements($productIds, $PRODUCTS_QUANTITY, true)
        );
    }
}
