@extends('layouts.app')

@section('title', 'Daftar Produk | SWA Air Minum')

@section('content')
    @include('partials.navbar')

    <section class="py-5" id="product-detail">
        <div class="container">
            <h2 class="mb-4 text-center" style="font-weight: bold; color: #165BA1;">Pemesanan</h2>

            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mb-3"
                        alt="Produk {{ $product->name }}">
                    <h4>{{ $product->name }}</h4>
                    <p>
                        <strong>Brand:</strong> {{ $product->brand }} <br>
                        <strong>Berat:</strong> {{ $product->weight }} kg <br>
                        <strong>Ukuran:</strong> {{ $product->size }} <br>
                    </p>
                </div>

                <div class="col-md-6">
                    <div class="card shadow p-4">
                        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="mb-3">
                                <label>No Order</label>
                                <input type="text" name="order_number" class="form-control"
                                    value="{{ 'ORD-' . strtoupper(Str::random(8)) }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Untuk Tanggal</label>
                                <input type="date" name="order_date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="address" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Pembayaran</label>
                                <select name="payment_method" class="form-control" required>
                                    <option value="" disabled selected>Pilih Virtual Account</option>
                                    <option value="Mandiri VA">Mandiri Virtual Account 335781354795</option>
                                    <option value="BRI VA">BRI Virtual Account 123456789012</option>
                                    <option value="BNI VA">BNI Virtual Account 987654321098</option>
                                    <option value="BCA VA">BCA Virtual Account 567890123456</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Jumlah</label>
                                <input type="number" name="quantity" id="quantity" min="1" value="1"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Total Harga</label>
                                <input type="text" id="total_price" name="total_price" class="form-control"
                                    value="Rp {{ number_format($product->price, 0, ',', '.') }}" readonly>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const price = {{ $product->price }};
                                    const quantityInput = document.getElementById('quantity');
                                    const totalPriceInput = document.getElementById('total_price');

                                    function formatRupiah(angka) {
                                        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                    }

                                    function updateTotal() {
                                        let qty = parseInt(quantityInput.value) || 1;
                                        let total = price * qty;
                                        totalPriceInput.value = formatRupiah(total);
                                    }

                                    quantityInput.addEventListener('input', updateTotal);
                                });
                            </script>

                            <div class="mb-3">
                                <label>Upload Bukti Transfer</label>
                                <input type="file" name="payment_proof" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
