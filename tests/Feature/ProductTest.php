<?php

namespace Tests\Feature;

use Domains\Products\Models\Product;
use Domains\Sales\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_access_get_endpoint()
    {
        $response = $this->get(route('api.products.get'));

        $response->assertStatus(200);
    }
}
