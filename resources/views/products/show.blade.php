<h1 style="text-align:center;">Detail Produk</h1>

<div style="
    display:flex;
    justify-content:center;
    gap:40px;
    margin-top:40px;
    align-items:center;
">

    <!-- GAMBAR -->
    <div>
        <img src="{{ asset('images/' . $product->image) }}" 
             style="
             width:320px;
             height:220px;
             object-fit:cover;
             border-radius:12px;
             box-shadow:0 4px 10px rgba(0,0,0,0.1);
             ">
    </div>

    <!-- DETAIL INFO -->
    <div style="max-width:350px;">

        <h2 style="margin-bottom:10px;">
            {{ $product->name }}
        </h2>

        <p style="
            color:#555;
            margin-bottom:15px;
            line-height:1.5;
        ">
            {{ $product->description }}
        </p>

        <p style="
            font-size:20px;
            font-weight:bold;
            margin-bottom:10px;
        ">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </p>

        <p style="margin-bottom:20px;">
            Stok: <b>{{ $product->stock }}</b>
        </p>

        <!-- BUTTON -->
        <a href="/order/{{ $product->id }}" 
           style="
           display:inline-block;
           padding:10px 16px;
           background:#6b3e26;
           color:white;
           border-radius:8px;
           text-decoration:none;
           margin-bottom:10px;
           ">
           Pesan Sekarang
        </a>

        <br>

        <a href="/products" style="color:#6b3e26;">
            ← Kembali ke Menu
        </a>

    </div>

</div>