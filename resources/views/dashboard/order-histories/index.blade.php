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

        <form method="GET" action="{{ route('income.report.index') }}" class="mb-3 d-flex gap-2">
            <select name="month" class="form-control">
                @foreach (range(1, 12) as $month)
                    <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                    </option>
                @endforeach
            </select>
            <select name="year" class="form-control">
                @foreach (range(now()->year, now()->year - 5) as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success btn-sm" style="min-width: 90px;">Tampilkan</button>
        </form>

        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>No Order</th>
                    <th>Pesanan</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                    <th>Status Pesanan</th>
                    <th>Catatan</th>
                    <th>WhatsApp</th>
                    <th>Aksi</th>
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
                        <td>
                            @if ($history->bukti_transfer)
                                <a href="{{ asset('storage/' . $history->bukti_transfer) }}" target="_blank">Lihat</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('order_histories.updateStatus', $history) }}" method="POST"
                                onsubmit="return handleStatusChange(event, {{ $history->id }})"
                                id="status-form-{{ $history->id }}">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm"
                                    onchange="handleSelectChange(this, {{ $history->id }})">
                                    <option value="Selesai" {{ $history->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="Diproses" {{ $history->status == 'Diproses' ? 'selected' : '' }}>
                                        Diproses</option>
                                    <option value="Ditolak" {{ $history->status == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                </select>
                                <div id="message-field-{{ $history->id }}" style="display:none; margin-top:5px;">
                                    <input type="text" name="message" class="form-control form-control-sm mb-2"
                                        placeholder="Alasan penolakan">
                                    <button type="submit" class="btn btn-danger btn-sm">Kirim</button>
                                </div>
                            </form>
                            <script>
                                function handleSelectChange(select, id) {
                                    const messageField = document.getElementById('message-field-' + id);
                                    if (select.value === 'Ditolak') {
                                        messageField.style.display = 'block';
                                    } else {
                                        messageField.style.display = 'none';
                                        document.getElementById('status-form-' + id).submit();
                                    }
                                }

                                function handleStatusChange(event, id) {
                                    const select = document.querySelector(`#status-form-${id} select[name="status"]`);
                                    if (select.value === 'Ditolak') {
                                        const messageInput = document.querySelector(`#status-form-${id} input[name="message"]`);
                                        if (!messageInput.value.trim()) {
                                            alert('Silakan isi alasan penolakan.');
                                            messageInput.focus();
                                            event.preventDefault();
                                            return false;
                                        }
                                    }

                                    return true;
                                }
                            </script>
                        </td>
                        <td>
                            <span
                                class="badge bg-{{ $history->status == 'Selesai' ? 'success' : ($history->status == 'Diproses' ? 'warning' : 'danger') }}">
                                {{ $history->status }}
                            </span>
                        </td>
                        <td>
                            {{ $history->message ?? '-' }}
                        </td>
                        <td>
                            <a href="https://wa.me/{{ $history->order->user->phone }}?text={{ urlencode('Halo ' . $history->order->user->name . ', kami dari SWA Air Minum akan melakukan proses delivery pesanan Air Minum dengan nomor order ' . $history->order_number . ' ke alamat anda di ' . $history->alamat . '. Terima kasih') }}"
                                target="_blank" class="btn btn-success btn-sm">
                                WhatsApp
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('order_histories.destroy', $history->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada riwayat pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $histories->links() }}
    </div>
@endsection
