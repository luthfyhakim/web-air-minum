<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_number',
        'user_id',
        'order_date',
        'address',
        'payment_method',
        'quantity',
        'total_price',
        'payment_proof',
        'status',
        'message',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_number = self::generateOrderNumber();
        });
    }

    public static function generateOrderNumber()
    {
        do {
            $random = 'ORD-' . strtoupper(Str::random(8));
        } while (self::where('order_number', $random)->exists());

        return $random;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
