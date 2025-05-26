<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'order_number',
        'pesanan',
        'jumlah',
        'alamat',
        'bukti_transfer',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
