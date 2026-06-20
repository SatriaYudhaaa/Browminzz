<?php 

namespace App\Http\Controllers;

use App\Models\Product;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        // 🔥 FIX DI SINI (hapus "s")
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }
}