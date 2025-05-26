@extends('layouts.app')

@section('content')
    @include('partials.navbar')

    <div class="container py-5">
        <a href="{{ route('profile.index') }}" class="btn btn-primary mb-3">
            &larr; Kembali ke Profil
        </a>
        <h2 class="mb-4">Detail Transaksi</h2>

        <div class="card p-4">
            <p><strong>No. Order:</strong> {{ $order->order_number }}</p>
            <p><strong>Produk:</strong> {{ $order->product->name }}</p>
            <p><strong>Tanggal Order:</strong> {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d F Y') }}
            </p>
            <p><strong>Alamat:</strong> {{ $order->address }}</p>
            <p><strong>Jumlah:</strong> {{ $order->quantity }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Bukti Transfer:</strong></p>
            @if ($order->payment_proof)
                @php
                    $extension = strtolower(pathinfo($order->payment_proof, PATHINFO_EXTENSION));
                    $fileUrl = asset('storage/' . $order->payment_proof);
                @endphp

                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                    <img src="{{ $fileUrl }}" width="300" class="img-thumbnail">
                @elseif($extension === 'pdf')
                    <a href="{{ $fileUrl }}" target="_blank" class="btn btn-primary">Lihat Bukti Transfer (PDF)</a>
                @else
                    <span class="text-muted">Format file tidak didukung.</span>
                @endif
            @else
                <span class="text-muted">Belum ada bukti transfer.</span>
            @endif
        </div>
    </div>

    @include('partials.footer')
@endsection
