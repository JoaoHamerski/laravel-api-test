<?php

namespace Domains\Sales\Controllers;

use App\Http\Controllers\Controller;
use Domains\Sales\Models\Sale;
use Domains\Sales\Requests\SaleRequest;
use Domains\Sales\Resources\SaleResource;

class CreateSaleController extends Controller
{
    public function __invoke(SaleRequest $request)
    {
        $sale = Sale::create();

        $sale->products()->attach($request->product_ids);

        return new SaleResource($sale->load('products'));
    }
}
