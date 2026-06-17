<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        // ambil produk favorit (max 3)
        $products = Product::where('is_favorite', true)
                            ->latest()
                            ->take(3)
                            ->get();

        // ambil testimoni terbaru (max 3)
        $testimoni = Testimoni::latest()
                              ->take(3)
                              ->get();

        return view('home', compact('products', 'testimoni'));
    }
}