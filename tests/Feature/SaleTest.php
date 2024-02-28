<?php

namespace Tests\Feature;

use Domains\Products\Models\Product;
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
}
