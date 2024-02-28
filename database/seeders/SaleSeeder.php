<?php

namespace Database\Seeders;

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

        Sale::factory()->count($SALES_QUANTITY)->create();
    }
}
