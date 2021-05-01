<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    protected $fillable = [
        'fullname', 'user_id', 'tel', 'house_number', 'note', 'district', 'amphore', 'province', 'postal_code', 'product_name', 'code', 'amount', 'image', 'status'
    ];
}
