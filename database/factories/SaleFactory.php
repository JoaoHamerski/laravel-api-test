<?php

namespace Database\Factories;

use Domains\Sales\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domains\Sales\Models\Sale>
 */
class SaleFactory extends Factory
{
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
