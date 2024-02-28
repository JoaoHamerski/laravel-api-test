<?php

namespace Domains\Products\Controllers;

use App\Http\Controllers\Controller;
use Domains\Products\Models\Product;
use Domains\Products\Resources\ProductResource;
use Illuminate\Http\Request;

class GetProductsController extends Controller
{
    public function __invoke(Request $request)
    {
        return ProductResource::collection(
            Product::paginate()
        );
    }
}
