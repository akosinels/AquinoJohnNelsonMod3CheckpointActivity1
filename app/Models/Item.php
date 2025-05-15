<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock'
    ];

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
} 