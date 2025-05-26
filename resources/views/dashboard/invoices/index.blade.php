@extends('layouts.dashboard')

@section('title', 'Dashboard | Stok Air')
@section('header', 'Faktur')

@section('content')
    <div class="container">
        <form method="GET" class="mb-3 d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Cari Invoice..."
                value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>

        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>No Invoice</th>
                    <th>Order</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invoices as $invoice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->order->order_number }}</td>
                        <td>Rp {{ number_format($invoice->total, 0, ',', '.') }}</td>
                        <td><a href="{{ route('invoices.show', $invoice->id) }}">Detail</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada riwayat faktur.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $invoices->links() }}
    </div>
@endsection
