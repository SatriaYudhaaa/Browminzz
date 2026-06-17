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
        $product = \App\Models\Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

}