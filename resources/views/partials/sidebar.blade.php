<div class="sidebar p-3 position-fixed">
    <h5 class="text-center">SWA Segar</h5>
    <hr>

    <a href="{{ route('dashboard.products.index') }}">Produk</a>
    <a href="{{ route('order_histories.index') }}">Data Pembayaran</a>
    <a href="{{ route('invoices.index') }}">Faktur</a>

    <hr>
    <div class="mt-2 d-flex align-items-center p-2">
        <div class="bg-light rounded-circle text-dark d-flex justify-content-center align-items-center"
            style="width: 35px; height: 35px;">
            A
        </div>
        <div class="ms-2">Admin</div>
    </div>
</div>
