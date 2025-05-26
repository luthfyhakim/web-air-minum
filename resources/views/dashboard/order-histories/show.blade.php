@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h3 class="mb-4">Detail Riwayat Order</h3>

        <div class="row">
            <div class="col-md-6 d-flex flex-column">
                <div class="card shadow-sm mb-4 flex-fill">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Informasi Order History</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Status:</strong> <span class="badge bg-success">{{ $orderHistories->status }}</span></p>
                        <p><strong>Tanggal Dibuat:</strong> {{ $orderHistories->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex flex-column">
                <div class="card shadow-sm mb-4 flex-fill">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Detail Order</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>No Order:</strong> {{ $orderHistories->order_number }}</p>
                        <p><strong>Produk:</strong> {{ $orderHistories->pesanan }}</p>
                        <p><strong>Jumlah:</strong> {{ $orderHistories->jumlah }}</p>
                        <p><strong>Alamat Pengiriman:</strong> {{ $orderHistories->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Informasi User</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Nama:</strong> {{ $orderHistories->order->user->name }}</p>
                        <p><strong>Email:</strong> {{ $orderHistories->order->user->email }}</p>
                        <p><strong>Nomor Telepon:</strong> {{ $orderHistories->order->user->phone ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('order_histories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@endsection
