<h1 style="text-align:center; margin-bottom:40px;">
    Detail Produk
</h1>

<div style="
    max-width:1000px;
    margin:auto;
    display:flex;
    gap:40px;
    flex-wrap:wrap;
    align-items:flex-start;
">

    {{-- GAMBAR --}}
    <div style="flex:1;">
        <img src="{{ asset('images/'.$product->image) }}" style="
            width:100%;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
        ">
    </div>

    {{-- INFO --}}
    <div style="flex:1;">

        <h2 style="font-size:30px; margin-bottom:10px;">
            {{ $product->name }}
        </h2>

        <h3 style="
            color:#6b3e26;
            font-size:22px;
            margin-bottom:15px;
        ">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </h3>

        <p style="
            color:#555;
            line-height:1.7;
            margin-bottom:20px;
        ">
            {{ $product->detail ?? $product->description }}
        </p>

        {{-- INFO TAMBAHAN --}}
        <div style="
            background:#f9f6f3;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            font-size:14px;
            color:#444;
        ">
            <p>✔ Dibuat fresh setiap hari</p>
            <p>✔ Tanpa bahan pengawet</p>
            <p>✔ Menggunakan cokelat premium</p>
            <p>✔ Cocok untuk hadiah & cemilan</p>
        </div>

        {{-- BUTTON --}}
        <a href="https://wa.me/6285846987881?text={{ urlencode('Halo, saya mau pesan '.$product->name.' seharga Rp '.number_format($product->price,0,',','.')) }}" 
           target="_blank"
           style="
            background:#25D366;
            color:white;
            padding:14px 25px;
            border-radius:10px;
            text-decoration:none;
            display:inline-block;
            font-weight:bold;
            font-size:16px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        "
        onmouseover="this.style.background='#1ebe5d'"
        onmouseout="this.style.background='#25D366'"
        >
            🛒 Pesan Sekarang
        </a>

        <br><br>

        <a href="/products" style="
            text-decoration:none;
            color:#6b3e26;
            font-size:14px;
        ">
            ← Kembali ke menu
        </a>

    </div>

</div>