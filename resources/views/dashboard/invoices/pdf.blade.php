<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 20px;
        }

        .header {
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }

        .logo {
            max-width: 50px;
        }

        .invoice-title {
            color: #333;
            margin: 10px 0;
            font-size: 24px;
        }

        .invoice-details {
            margin: 20px 0;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="/public/images/logo.png" alt="Company Logo" class="logo">
        <h2 class="invoice-title">INVOICE PEMBAYARAN</h2>

        <div style="text-align: left;">
            <h3 style="margin: 0; color: #666;">SWA Air Minum</h3>
            <p style="margin: 5px 0; font-size: 12px;">
                Alamat: Jl. Example No. 123<br>
                Telp: (021) 123-4567<br>
                Email: info@example.com
            </p>
        </div>
    </div>

    <div class="invoice-details">
        <p><strong>Nomor Invoice:</strong> {{ $invoice->invoice_number }}</p>
        <p><strong>Nomor Order:</strong> {{ $invoice->order->order_number }}</p>
    </div>

    <table>
        <tr>
            <th>Item</th>
            <th>Jumlah</th>
            <th>Harga Total</th>
        </tr>
        <tr>
            <td>{{ $invoice->order->product->name }}</td>
            <td>{{ $invoice->order->quantity }}</td>
            <td>Rp {{ number_format($invoice->total, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Tanggal: {{ now()->format('d/m/Y') }}</p>
        <p>Terima kasih telah menggunakan layanan kami.</p>
    </div>
</body>

</html>
