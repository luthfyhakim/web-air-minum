<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(7);
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string',
            'brand'  => 'required|string',
            'weight' => 'required|string',
            'size'   => 'required|string',
            'stock'  => 'required|integer',
            'price'  => 'required|integer',
            'image'  => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'brand', 'weight', 'size', 'stock', 'price');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('dashboard.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'   => 'required|string',
            'brand'  => 'required|string',
            'weight' => 'required|string',
            'size'   => 'required|string',
            'stock'  => 'required|integer',
            'price'  => 'required|integer',
            'image'  => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'brand', 'weight', 'size', 'stock', 'price');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('dashboard.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
