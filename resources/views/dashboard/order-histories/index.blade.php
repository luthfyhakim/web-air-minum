@extends('layouts.dashboard')

@section('title', 'Dashboard | Stok Air')
@section('header', 'Data Pembayaran')

@section('content')
    <div class="container">
        <form method="GET" class="mb-3 d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
            <select name="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>

        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>No Order</th>
                    <th>Pesanan</th>
                    <th>Jumlah</th>
                    <th>Alamat</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                    <th>WhatsApp</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($histories as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('order_histories.show', $history->id) }}">
                                {{ $history->order_number }}
                            </a>
                        </td>
                        <td>{{ $history->pesanan }}</td>
                        <td>{{ $history->jumlah }}</td>
                        <td>{{ $history->alamat }}</td>
                        <td>
                            @if ($history->bukti_transfer)
                                <a href="{{ asset('storage/' . $history->bukti_transfer) }}" target="_blank">Lihat</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('order_histories.updateStatus', $history) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="Selesai" {{ $history->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="Diproses" {{ $history->status == 'Diproses' ? 'selected' : '' }}>
                                        Diproses</option>
                                    <option value="Ditolak" {{ $history->status == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="https://wa.me/{{ $history->order->user->phone }}?text={{ urlencode('Halo ' . $history->order->user->name . ', kami dari SWA Air Minum akan melakukan proses delivery pesanan Air Minum dengan nomor order ' . $history->order_number . ' ke alamat anda di ' . $history->alamat . '. Terima kasih') }}"
                                target="_blank" class="btn btn-success btn-sm">
                                WhatsApp
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada riwayat pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $histories->links() }}
    </div>
@endsection
