<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'weight',
        'size',
        'stock',
        'price',
        'image',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
