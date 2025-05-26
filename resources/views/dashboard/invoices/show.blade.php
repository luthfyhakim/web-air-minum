@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-4">Detail Invoice</h2>

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>No Invoice:</strong></div>
                            <div class="col-md-9">{{ $invoice->invoice_number }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>No Order:</strong></div>
                            <div class="col-md-9">{{ $invoice->order->order_number }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Total:</strong></div>
                            <div class="col-md-9">Rp {{ number_format($invoice->total, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('invoices.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-primary" target="_blank">
                        <i class="fas fa-file-pdf"></i> Lihat Invoice
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
