<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::find(2);
        $product = Product::first();

        if (!$user || !$product) {
            return;
        }

        for ($i = 0; $i < 3; $i++) {
            Order::create([
                'order_number'   => 'ORD-' . strtoupper(Str::random(8)),
                'user_id'        => $user->id,
                'product_id'     => $product->id,
                'order_date'     => now()->subDays($i)->format('Y-m-d'),
                'address'        => 'Jl. Contoh Alamat No. ' . (123 + $i),
                'payment_method' => 'Mandiri VA',
                'quantity'       => 12 + $i,
                'total_price'    => $product->price * (12 + $i),
                'payment_proof'  => null,
                'status'         => 'Selesai',
            ]);
        }
    }
}
