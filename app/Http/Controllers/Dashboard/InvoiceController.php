<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::with('order');

        if ($request->filled('search')) {
            $query->where('invoice_number', 'like', '%' . $request->search . '%');
        }

        $invoices = $query->oldest()->paginate(10);
        return view('dashboard.invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('order')->findOrFail($id);
        return view('dashboard.invoices.show', compact('invoice'));
    }

    public function generatePdf($id, PDF $pdf)
    {
        $invoice = Invoice::with('order')->findOrFail($id);

        $pdf = $pdf->loadView('dashboard.invoices.pdf', compact('invoice'));
        return $pdf->stream('invoice-' . $invoice->invoice_number . '.pdf');
    }
}
