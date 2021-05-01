<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_amount', 'product_price', 'product_old_price', 'product_detail', 'product_type', 'product_image', 'date', 'status', 'product_ar_id', 'product_360_link'
    ];
}
