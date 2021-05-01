<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'total_price', 'date', 'code', 'status', 'product_count', 'paid', 'payment_type', 'shipping_fullname', 'shipping_house_number', 'shipping_district', 'shipping_amphore', 'shipping_province', 'shipping_postal_code', 'shipping_tel', 'shipping_note', 'slip_payment'
    ];

    public function detail()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id');
    }

    public function orderdetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id', 'product_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
