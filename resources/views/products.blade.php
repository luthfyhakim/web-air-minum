@extends('layouts.app')

@section('title', 'Daftar Produk | SWA Air Minum')

@section('content')
    @include('partials.navbar')

    <section class="py-5" id="all-products">
        <div class="container">
            <h2 class="text-center mb-4" style="font-weight: bold; color: #165BA1;">Semua Produk</h2>

            <div class="row g-4">
                @forelse ($products as $product)
                    <div class="col-md-4 text-center">
                        <div class="card h-100 shadow-sm py-2">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Produk"
                                style="height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">
                                    <strong>Brand:</strong> {{ $product->brand }} <br>
                                    <strong>Berat:</strong> {{ $product->weight }} <br>
                                    <strong>Ukuran:</strong> {{ $product->size }} <br>
                                    <strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Pesan
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada produk tersedia.</p>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
