@extends('layouts.dashboard')

@section('title', 'Dashboard | Stok Air')
@section('header', 'Stok Air')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tambah Produk Baru</h2>

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

        <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama produk"
                    required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Masukkan brand produk"
                    required value="{{ old('brand') }}">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Berat (kg)</label>
                <input type="number" step="0.01" class="form-control" id="weight" name="weight"
                    placeholder="Masukkan berat dalam kg" required value="{{ old('weight') }}">
            </div>

            <div class="mb-3">
                <label for="size" class="form-label">Ukuran</label>
                <input type="text" class="form-control" id="size" name="size"
                    placeholder="Masukkan ukuran produk" required value="{{ old('size') }}">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Jumlah Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan jumlah stok"
                    required value="{{ old('stock') }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp)</label>
                <input type="number" step="100" class="form-control" id="price" name="price"
                    placeholder="Masukkan harga dalam Rupiah" required value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>

            <div style="margin-top: 20px">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
