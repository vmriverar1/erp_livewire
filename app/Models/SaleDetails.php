<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    protected $fillable = [
        'price',
        'quantity',
        'sale_id',
        'product_id',
    ];
}
