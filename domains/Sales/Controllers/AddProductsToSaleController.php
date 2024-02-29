<?php

namespace Domains\Sales\Controllers;

use App\Http\Controllers\Controller;
use Domains\Sales\Models\Sale;
use Domains\Sales\Requests\SaleRequest;
use Domains\Sales\Resources\SaleResource;

class AddProductsToSaleController extends Controller
{
    public function __invoke(Sale $sale, SaleRequest $request)
    {
        $sale->products()->attach($request->product_ids);

        return new SaleResource($sale->fresh()->load('products'));
    }
}
