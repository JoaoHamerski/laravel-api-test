<?php

namespace Domains\Sales\Models;

use Domains\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
