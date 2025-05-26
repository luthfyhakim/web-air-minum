@extends('layouts.app')

@section('title', 'Beranda SWA | SWA Air Minum')

@section('content')
    @include('partials.navbar')

    <section class="hero d-flex align-items-center justify-content-center">
        <div class="hero-overlay">
            <img src="{{ asset('images/hero.png') }}" alt="Logo SWA" class="img-fluid">
        </div>
    </section>

    <section class="text-center py-5" id="about">
        <div class="container">
            <div class="mb-5">
                <iframe width="1120" height="630" src="https://www.youtube.com/embed/2onzMqvwljA"
                    title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>
            <p style="color: #165BA1; font-weight: bold;" class="px-5">
                Untuk memenuhi kebutuhan akan air minum dalam kemasan yang bermutu tinggi, SWA menghadirkan produk air segar
                higienis SWA Segar yang bahan bakunya diambil dari mata air alami di Pandaan. Diproduksi dengan peralatan
                modern dan sistem pengawasan mutu yang ketat, menjadikan SWA Segar memiliki kualitas prima dan sehat untuk
                dikonsumsi sehari-hari.
            </p>
        </div>
    </section>

    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('images/produk-1.png') }}" class="img-fluid" alt="Produk">
                </div>
                <div class="col-md-6 text-start" style="font-weight: bold">
                    <p>
                        Untuk menjamin kualitas dan keamanannya, air minum SWA Segar telah mendapatkan sertifikasi Halal dan
                        ISO 9001:2005, serta telah memenuhi standar mutu yang ditentukan oleh BPOM dan SNI. Saat ini, SWA
                        Segar tersedia dalam kemasan galon 19 liter, gelas 240 ml, botol 330 ml, botol 600 ml dan botol 1500
                        ml.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="product">
        <div class="container">
            <h2 class="text-center mb-4" style="font-weight: bold; color: #165BA1;">Produk</h2>
            <div class="row g-4">
                @foreach ($products->take(6) as $product)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" class="product-img mb-2" alt="Produk">
                        <p>{{ $product->name }}</p>
                        <p>
                            Brand: {{ $product->brand }} <br>
                            Berat: {{ $product->weight }} <br>
                            Ukuran: {{ $product->size }} <br>
                            Harga: Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                @endforeach
            </div>
            @if ($products->count() > 6)
                <div class="text-center mt-4">
                    <a href="{{ route('products') }}" class="btn btn-outline-primary">Lihat Produk Lainnya</a>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="text-center mb-5" style="font-weight: bold; color: #165BA1;">Infografis</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('images/infografis-1.png') }}" class="img-fluid" alt="Infografis">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/infografis-2.png') }}" class="img-fluid" alt="Infografis">
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
