<?php

namespace Domains\Sales\Controllers;

use App\Http\Controllers\Controller;
use Domains\Sales\Models\Sale;
use Domains\Sales\Resources\SaleResource;

class GetSalesController extends Controller
{
    public function __invoke()
    {
        return SaleResource::collection(
            Sale::with('products')->paginate()
        );
    }
}
