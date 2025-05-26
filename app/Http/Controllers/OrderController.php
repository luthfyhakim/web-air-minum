<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'order_date' => 'required|date',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|string|max:255',
            'payment_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $totalPrice = preg_replace('/[^\d]/', '', $request->total_price);

        $invoiceNumber = 'INV-' . date('Ymd') . '-' . rand(1000, 9999);

        $filename = $request->file('payment_proof')->store('payment_proofs', 'public');

        $order = Order::create([
            'order_number' => $request->order_number,
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'order_date' => $request->order_date,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'payment_proof' => $filename,
            'status' => 'Diproses', // ['Selesai', 'Diproses', 'Ditolak']
        ]);

        OrderHistory::create([
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'pesanan' => $order->product->name ?? '',
            'jumlah' => $order->quantity,
            'alamat' => $order->address,
            'bukti_transfer' => $order->payment_proof,
            'status' => $order->status,
        ]);

        Invoice::create([
            'invoice_number' => $invoiceNumber,
            'order_id' => $order->id,
            'total' => $totalPrice,
        ]);

        return redirect()->route('orders.show', $order->id)->with('success', 'Pesanan berhasil dibuat.');
    }

    public function show($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('order_detail', compact('order'));
    }
}
