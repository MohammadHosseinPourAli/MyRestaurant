<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food_Order extends Model
{
    protected $table = 'food_order';
    public $timestamps = false;
    protected $fillable = ['order_id', 'food_id'];
}
