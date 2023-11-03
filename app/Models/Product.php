<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
    'barcode',
    'cost',
    'price',
    'stock',
    'image',
    'alert',
    'category_id'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
