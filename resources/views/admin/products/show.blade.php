<h2>Detail Produk</h2>

<img src="{{ asset('images/'.$product->image) }}" width="200"><br><br>

<b>{{ $product->name }}</b><br><br>

<p>{{ $product->detail ?? $product->description }}</p>

<p>Rp {{ number_format($product->price) }}</p>

<a href="/admin/products">← Kembali</a>