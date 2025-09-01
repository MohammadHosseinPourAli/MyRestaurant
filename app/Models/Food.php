<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    public $fillable = ['category', 'name', 'price', 'ingredients', 'image'];
    protected $casts = [
        'ingredients' => 'array',
    ];
}
