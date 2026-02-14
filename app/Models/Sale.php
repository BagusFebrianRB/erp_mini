<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'invoice_number', 'sale_date',
        'total', 'paid', 'change'
    ];

    protected $casts = [
        'sale_date' => 'date',
    ];

    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
