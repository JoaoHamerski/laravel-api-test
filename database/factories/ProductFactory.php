<?php

namespace Database\Factories;

use Domains\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domains\Products\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->words(3, true)),
            'price' => fake()->randomFloat(2, 10, 1000),
            'description' => fake()->text()
        ];
    }
}
