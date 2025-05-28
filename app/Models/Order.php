<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable =
    [
        'user_id',
        'order_number',
        'name',
        'email',
        'phone',
        'adress',
        'products',
        'total_price',
        'courier',
        'status',
    ];
}
