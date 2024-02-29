<?php

namespace Tests\Feature;

use Domains\Products\Models\Product;
use Domains\Sales\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_new_sale()
    {
        $products = Product::factory()->count(3)->create();
        $productIds = $products->pluck('id')->toArray();

        $response = $this->post(route('api.sales.create'), [
            'product_ids' => $productIds
        ]);

        $response->assertStatus(201);
    }

    /** @test */
    public function it_requires_product_ids()
    {
        $response = $this->post(route('api.sales.create'), [
            'product_ids' => []
        ]);

        $response->assertSessionHasErrors(['product_ids']);
    }

    /** @test */
    public function it_requires_existing_product_ids()
    {
        $response = $this->post(route('api.sales.create'), [
            'product_ids' => [10, 20]
        ]);

        $response->assertSessionHasErrors([
            'product_ids.0',
            'product_ids.1'
        ]);
    }
}
