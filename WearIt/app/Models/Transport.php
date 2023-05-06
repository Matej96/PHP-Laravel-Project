<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'price',
        'duration_days'
    ];
}
