<?php

namespace Tests\Unit;

use Domains\Products\Models\Product;
use Domains\Sales\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_get_route()
    {
        $this->assertTrue(
            Route::has('api.sales.get-all')
        );
    }

    /** @test */
    public function it_has_create_route()
    {
        $this->assertTrue(
            Route::has('api.sales.create')
        );
    }

    /** @test */
    public function it_belongs_to_many_products()
    {
        $sale = Sale::factory()
        ->has(Product::factory()->count(5))
        ->create();

        $products = $sale->products;

        $this->assertCount(5, $products);
        $this->assertInstanceOf(Product::class, $products->first());
    }
}
