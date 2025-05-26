<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = OrderHistory::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('order_number', 'like', "%$search%")
                ->orWhere('pesanan', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $histories = $query->oldest()->paginate(10);

        return view('dashboard.order-histories.index', compact('histories'));
    }

    public function show($id)
    {
        $orderHistories = OrderHistory::with('order.user')->findOrFail($id);
        return view('dashboard.order-histories.show', compact('orderHistories'));
    }


    public function updateStatus(Request $request, OrderHistory $orderHistory)
    {
        $request->validate(['status' => 'required|in:Selesai,Diproses,Ditolak']);

        $orderHistory->update(['status' => $request->status]);
        $orderHistory->order->update(['status' => $request->status]);

        return back()->with('success', 'Status updated.');
    }

    public function destroy($id)
    {
        $orderHistory = OrderHistory::findOrFail($id);

        $order = $orderHistory->order;
        if ($order) {
            $invoice = $order->invoice;
            if ($invoice) {
                $invoice->delete();
            }
            $order->delete();
        }

        $orderHistory->delete();

        return back()->with('success', 'Order history and related records deleted.');
    }
}
