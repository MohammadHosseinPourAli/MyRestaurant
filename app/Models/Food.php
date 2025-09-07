<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    public $timestamps = false;
    public $fillable = ['category', 'name', 'price', 'ingredients', 'image'];
    protected $casts = [
        'ingredients' => 'array',
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'food_order', 'food_id', 'order_id')->withPivot('count');
    }
}
