<?php

namespace Domains\Products\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'amount_price' => $this->when($this->amount_price, round($this->amount_price, 2)),
            'description' => $this->description,
            'amount' => $this->whenNotNull($this->amount)
        ];
    }
}
