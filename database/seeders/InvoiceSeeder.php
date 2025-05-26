<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
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

        Invoice::create([
            'invoice_number' => 'INV-' . date('Ymd') . '-' . rand(1000, 9999),
            'order_id' => $order1->id,
            'total' => $order1->total_price,
        ]);

        Invoice::create([
            'invoice_number' => 'INV-' . date('Ymd') . '-' . rand(1000, 9999),
            'order_id' => $order2->id,
            'total' => $order2->total_price,
        ]);

        Invoice::create([
            'invoice_number' => 'INV-' . date('Ymd') . '-' . rand(1000, 9999),
            'order_id' => $order3->id,
            'total' => $order3->total_price,
        ]);
    }
}
