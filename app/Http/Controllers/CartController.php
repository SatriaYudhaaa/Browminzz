<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "qty" => 1
            ];
        }


        session()->put('cart', $cart);

        // 🔥 BEDAIN RESPONSE
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Produk masuk ke keranjang!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    public function checkout()
    {
        return view('cart.checkout');
    }
    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);

        if(empty($cart)){
            return redirect('/cart')->with('error', 'Keranjang kosong');
        }

        $nama = $request->nama;
        $no_hp = $request->no_hp;

        $total = 0;
        $pesan = "Halo, saya ingin pesan:%0A";

        foreach($cart as $item){
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;

            $pesan .= "- ".$item['name']." x".$item['qty']." = Rp ".number_format($subtotal,0,',','.')."%0A";
        }

        $pesan .= "%0ATotal: Rp ".number_format($total,0,',','.');

        // 🔥 HAPUS CART SETELAH CHECKOUT
        session()->forget('cart');

        // 🔥 REDIRECT KE WA
        return redirect("https://wa.me/6285846987881?text=".$pesan);
    }
    public function decrease(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){

            if($cart[$id]['qty'] > 1){
                $cart[$id]['qty']--;
            } else {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true]); // 🔥 INI PENTING
        }

        return back();
    }
    public function getCart()
    {
        $cart = session()->get('cart', []);

        // 🔥 tambahin id ke setiap item
        foreach ($cart as $id => $item) {
            $cart[$id]['id'] = $id;
        }

        return response()->json($cart);
    }
}
