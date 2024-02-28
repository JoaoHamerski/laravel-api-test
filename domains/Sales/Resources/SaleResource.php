<?php

namespace Domains\Sales\Resources;

use Domains\Products\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'amount' => 100,
            'products' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
