<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'price', 'visible', 'img1', 'img2', 'img3'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products')->withPivot('quantity');
    }
}
