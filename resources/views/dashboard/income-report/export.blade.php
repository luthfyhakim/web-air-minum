<table>
    <thead>
        <tr>
            <th colspan="6" style="text-align: center; font-weight: bold; background-color: #f2f2f2;">
                Daftar Laporan Pendapatan SWA Segar pada Bulan
                {{ \Carbon\Carbon::create()->locale('id')->month($month)->translatedFormat('F') }}
                {{ $year }}
            </th>
        </tr>
        <tr>
            <th style="background-color: #e0e0e0;">No</th>
            <th style="background-color: #e0e0e0;">Nomer Order</th>
            <th style="background-color: #e0e0e0;">Tanggal</th>
            <th style="background-color: #e0e0e0;">Nama Produk</th>
            <th style="background-color: #e0e0e0;">Jumlah Produk</th>
            <th style="background-color: #e0e0e0;">Pemasukan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
            <tr>
                <td style="background-color: #f9f9f9;">{{ $loop->iteration }}</td>
                <td style="background-color: #f9f9f9;">{{ $report->order_number }}</td>
                <td style="background-color: #f9f9f9;">{{ $report->order_date }}</td>
                <td style="background-color: #f9f9f9;">{{ $report->product->name }}</td>
                <td style="background-color: #f9f9f9;">{{ $report->quantity }}</td>
                <td style="background-color: #f9f9f9;">{{ number_format($report->total_price, 2, ',', '.') }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5" class="text-end" style="background-color: #d1ffd1;"><strong>Total Pemasukan:</strong>
            </td>
            <td style="background-color: #d1ffd1;"><strong>Rp {{ number_format($income, 2, ',', '.') }}</strong></td>
        </tr>
    </tbody>
</table>
