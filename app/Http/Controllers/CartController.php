<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);

        // ambil cart dari session
        $cart = session()->get('cart', []);

        // kalau produk sudah ada → tambah qty
        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            // kalau belum ada → tambah baru
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "qty" => 1
            ];
        }

        // simpan ke session
        session()->put('cart', $cart);

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
    public function decrease($id)
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

        return back();
    }
}
