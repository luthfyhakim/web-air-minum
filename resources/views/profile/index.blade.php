@extends('layouts.app')

@section('title', 'Profil User | SWA Air Minum')

@section('content')
    @include('partials.navbar')

    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow border-0 rounded-4 bg-light">
                    <div class="card-body p-5">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <img src="{{ asset('images/profile_user.png') }}" alt="User Profile" class="rounded-circle"
                                    style="width:120px; height:120px; object-fit:cover; margin:auto;">
                                <h5 class="mt-3">{{ $user->name }}</h5>
                            </div>
                            <div class="col-md-9">
                                <h4 class="mb-3 fw-bold">My Profile</h4>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-semibold">Tanggal Lahir</div>
                                    <div class="col-sm-8">{{ $user->birth_date ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-semibold">No. Handphone</div>
                                    <div class="col-sm-8">{{ $user->phone ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-semibold">Alamat</div>
                                    <div class="col-sm-8">{{ $user->address ?? '-' }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-semibold">Email</div>
                                    <div class="col-sm-8">{{ $user->email }}</div>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary mt-2">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <h5 class="fw-bold mb-3">Riwayat Pesanan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nomor Order</th>
                                <th>Pesanan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}">
                                            {{ $order->order_number }}
                                        </a>
                                    </td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->date)->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($order->status == 'Selesai')
                                            <span class="text-success fw-bold">Selesai</span>
                                        @elseif ($order->status == 'Diproses')
                                            <span class="text-warning fw-bold">Diproses</span>
                                        @else
                                            <span class="text-danger fw-bold">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('invoices.pdf', $order->id) }}" target="_blank"
                                            class="btn btn-sm btn-primary">
                                            <i class="bi bi-download"></i> Download
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Belum ada riwayat pesanan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection
