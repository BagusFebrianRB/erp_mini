<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'code', 'name', 'category_id',
        'purchase_price', 'selling_price',
        'stock', 'min_stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stockCards()
    {
        return $this->hasMany(StockCard::class);
    }
}
