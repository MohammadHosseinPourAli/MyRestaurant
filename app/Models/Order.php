<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'extras',
    ];
    protected $casts = [
        'extras' => 'array',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function foods(){
        return $this->belongsToMany(Food::class, 'food_order', 'order_id', 'food_id')->withPivot('count');
    }
}
