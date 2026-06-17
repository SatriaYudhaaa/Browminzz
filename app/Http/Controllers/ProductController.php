<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $last = Product::latest()->first();
        $nextId = $last ? $last->id + 1 : 1;

        $number = str_pad($nextId, 3, '0', STR_PAD_LEFT);

        $ext = $request->file('image')->getClientOriginalExtension();
        $filename = 'produk' . $number . '.' . $ext;

        $request->file('image')->move(public_path('images'), $filename);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
        ]);

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];

        if ($request->hasFile('image')) {

            if ($product->image && file_exists(public_path('images/'.$product->image))) {
                unlink(public_path('images/'.$product->image));
            }

            $ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'produk' . str_pad($product->id, 3, '0', STR_PAD_LEFT) . '.' . $ext;

            $request->file('image')->move(public_path('images'), $filename);

            $data['image'] = $filename;
        }

        $product->update($data);

        return redirect('/admin/products');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->image && file_exists(public_path('images/'.$product->image))) {
            unlink(public_path('images/'.$product->image));
        }

        $product->delete();

        return redirect('/admin/products');
    }
    public function show($id)
    {

    }
    public function toggleFavorite(Request $request, $id)
    {
        $product = Product::find($id);

        $product->is_favorite = $request->has('is_favorite');
        $product->save();

        return back();
    }
}