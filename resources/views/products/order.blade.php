<h1 style="text-align:center;">Pemesanan</h1>

<div style="width:300px; margin:auto;">

    <h2>{{ $product->name }}</h2>

    <p>Rp {{ $product->price }}</p>

    <label>Pilih Topping:</label><br>
    <select>
        <option>- Pilih -</option>
        <option>Keju (+5000)</option>
        <option>Almond (+7000)</option>
    </select>

    <br><br>

    <label>Ucapan:</label><br>
    <input type="text" placeholder="Tulis ucapan...">

    <br><br>

    <p><b>Total Harga: Rp {{ $product->price }}</b></p>

    <button style="
        background:#6b3e26;
        color:white;
        padding:8px;
        border:none;
        border-radius:6px;">
        Tambah ke Keranjang
    </button>

</div>