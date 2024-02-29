<?php

namespace Domains\Products\Actions;

use Domains\Products\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class MergeSaleProductsAction
{
    public static function execute(Collection $products)
    {
        return $products->groupBy('id')->map(function ($groupedProducts) {
            $product = new Product([...$groupedProducts[0]->toArray()]);

            $product->id = $groupedProducts[0]->id;
            $product->amount = $groupedProducts->count();
            $product->amount_price = $groupedProducts->sum('price');

            return $product;
        });
    }
}
