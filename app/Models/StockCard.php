<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCard extends Model
{
    protected $fillable = [
        'product_id', 'date', 'transaction_type',
        'reference_number', 'quantity_in',
        'quantity_out', 'balance'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
