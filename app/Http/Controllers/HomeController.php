<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function product()
    {
        $products = Product::latest()->paginate(9);
        return view('products', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product'));
    }
}
