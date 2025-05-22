<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'order_items',
        'total_price',
        'order_number'
    ];
    protected $casts =[
        'order_items' => 'array'
    ];
}
