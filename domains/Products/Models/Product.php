<?php

namespace Domains\Products\Models;

use Domains\Sales\Models\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description'
    ];

    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Sale::class);
    }
}
