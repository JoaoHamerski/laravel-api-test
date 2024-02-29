<?php

namespace Domains\Sales\Models;

use Domains\Products\Models\Product;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function amount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->products()->sum('price')
        );
    }
}
