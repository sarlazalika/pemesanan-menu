<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'product_type_id',
    ];

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }
}
