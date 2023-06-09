<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'user_id',
      'payment_id',
      'transport_id',
      'city_id',
      'street_id',
      'country_id',
      'total_price',
      'created_at'
    ];

}
