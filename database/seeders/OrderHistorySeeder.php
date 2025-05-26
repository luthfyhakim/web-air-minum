<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Database\Seeder;

class OrderHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = Order::find(1);
        $order2 = Order::find(2);
        $order3 = Order::find(3);

        OrderHistory::insert([
            [
                'order_id' => $order1->id,
                'order_number' => $order1->order_number,
                'pesanan' => $order1->product->name,
                'jumlah' => $order1->quantity,
                'alamat' => $order1->address,
                'status' => $order1->status,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => $order2->id,
                'order_number' => $order2->order_number,
                'pesanan' => $order2->product->name,
                'jumlah' => $order2->quantity,
                'alamat' => $order2->address,
                'status' => $order2->status,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => $order3->id,
                'order_number' => $order3->order_number,
                'pesanan' => $order3->product->name,
                'jumlah' => $order3->quantity,
                'alamat' => $order3->address,
                'status' => $order3->status,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
