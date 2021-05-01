<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_price', 'product_name', 'quantity', 'total_price'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');;
    }
}
