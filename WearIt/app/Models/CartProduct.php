<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'cart_id',
        'product_variation_id',
        'amount'
    ];
}
