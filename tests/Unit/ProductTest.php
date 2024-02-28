<?php

namespace Tests\Unit;

use Domains\Products\Models\Product;
use Domains\Sales\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_has_get_route()
    {
        $this->assertTrue(
            Route::has('api.products.get-all')
        );
    }

    public function it_has_create_route()
    {
        $this->assertTrue(
            Route::has('api.products.get-all')
        );
    }

    /** @test */
    public function it_can_create_a_product()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(Product::class, $product);
    }

    /** @test */
    public function it_belongs_to_many_sales()
    {
        $product = Product::factory()
            ->has(Sale::factory()->count(5))
            ->create();

        $sales = $product->sales;

        $this->assertCount(5, $sales);
        $this->assertInstanceOf(Sale::class, $sales->first());
    }
}
