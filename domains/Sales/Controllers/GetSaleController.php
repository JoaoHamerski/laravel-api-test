<?php

namespace Domains\Sales\Controllers;

use App\Http\Controllers\Controller;
use Domains\Sales\Models\Sale;
use Domains\Sales\Resources\SaleResource;

class GetSaleController extends Controller
{
    public function __invoke(Sale $sale)
    {
        return new SaleResource($sale->load('products'));
    }
}
