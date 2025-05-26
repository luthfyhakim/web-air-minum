@extends('layouts.dashboard')

@section('title', 'Dashboard | Stok Air')
@section('header', 'Stok Air')

@section('content')
    <div class="container">
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary mb-4">Tambah Produk</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Brand</th>
                    <th>Berat</th>
                    <th>Ukuran</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" width="50" alt="{{ $product->name }}">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->weight }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('dashboard.products.edit', $product->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada produk tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-start">
                    @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                    @endif

                    @foreach ($products->links()->elements[0] as $page => $url)
                        @if ($page == $products->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link">Next</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endsection
