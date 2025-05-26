@extends('layouts.dashboard')

@section('title', 'Dashboard | Stok Air')
@section('header', 'Stok Air')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali input Anda:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" required
                    value="{{ old('name', $product->name) }}">
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" required
                    value="{{ old('brand', $product->brand) }}">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <input type="text" class="form-control" id="weight" name="weight" required
                    value="{{ old('weight', $product->weight) }}">
            </div>

            <div class="mb-3">
                <label for="size" class="form-label">Ukuran</label>
                <input type="text" class="form-control" id="size" name="size" required
                    value="{{ old('size', $product->size) }}">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Jumlah Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" required
                    value="{{ old('stock', $product->stock) }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" required
                    value="{{ old('price', $product->price) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Produk Saat Ini</label><br>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="120" class="mb-2">
                @else
                    <p class="text-muted">Tidak ada gambar.</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ganti Gambar</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>

            <div style="margin-top: 20px">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
