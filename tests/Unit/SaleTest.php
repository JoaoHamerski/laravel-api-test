<?php

namespace Tests\Unit;

use Domains\Sales\Actions\MergeSaleProductsAction;
use Domains\Products\Models\Product;
use Domains\Sales\Models\Sale;
use Domains\Sales\Resources\SaleResource;
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
    public function it_has_cancel_route()
    {
        $this->assertTrue(
            Route::has('api.sales.cancel')
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

    /** @test */
    public function it_calculates_the_correct_amount()
    {
        $sale = Sale::factory()->has(
            Product::factory()->count(5)
        )->create();

        $productsAmountFromQuery = $sale->products()->sum('price');
        $productsAmountFromCollection = $sale->products->sum('price');

        $this->assertEquals($productsAmountFromQuery, $sale->amount);
        $this->assertEquals($productsAmountFromCollection, $sale->amount);
    }

    /** @test */
    public function it_calculates_the_correct_amount_from_resource()
    {
        $newSale = Sale::factory()->has(
            Product::factory()->count(5)
        )->create();

        $saleResource = (new SaleResource($newSale->load('products')));
        $sale = $saleResource->response();

        $data = $sale->getData(true);
        $amount = $data['amount'];

        $this->assertEqualsWithDelta($amount, $newSale->amount, 0.1);
    }

    /** @test */
    public function it_merge_all_sale_products()
    {
        $product = Product::factory()->create();
        $sale = Sale::factory()->create();

        $sale->products()->attach([$product->id, $product->id]);

        $mergedProducts = MergeSaleProductsAction::execute($sale->products);
        $mergedProduct = $mergedProducts->first();

        $mergedProductPrice = $mergedProduct->amount_price;
        $saleProductsPrice = $sale->products()->sum('price');

        $this->assertEquals($mergedProduct->amount, $sale->products->count());
        $this->assertEqualsWithDelta(
            $mergedProductPrice,
            $saleProductsPrice,
            0.1
        );
    }
}
