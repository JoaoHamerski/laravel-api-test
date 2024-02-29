<?php

namespace Domains\Sales\Resources;

use Domains\Products\Actions\MergeSaleProductsAction;
use Domains\Products\Models\Product;
use Domains\Products\Resources\ProductResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => round($this->amount, 2),
            'products' => $this->getProducts()
        ];
    }

    public function getProducts()
    {
        $products = $this->whenLoaded('products');

        if ($products instanceof MissingValue) {
            return new MissingValue();
        }

        return ProductResource::collection(
            MergeSaleProductsAction::execute($products)
        );
    }
}
