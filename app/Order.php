<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'phone_num', 'email', 'delivery_type', 'city', 'address', 'status', 'email', 'order_num'
    ];

    /*
     * Statuses:
     * 1 - Order made
     * 2 - Order sent
     * 3 - Order cancelled
     * 4 - Order completed
     * */

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity', 'price');
    }
}
