<h2>Edit Produk</h2>

<form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <p>Nama:</p>
    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    <p>Detail Produk (Deskripsi Panjang):</p>
    <textarea name="detail" rows="6" style="width:300px;">
    {{ $product->detail }}
    </textarea>
    <br><br>

    <p>Harga:</p>
    <input type="number" name="price" value="{{ $product->price }}"><br><br>

    <p>Stock:</p>
    <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

    <p>Gambar sekarang:</p>
    <img src="{{ asset('images/'.$product->image) }}" width="100"><br><br>

    <p>Ganti gambar:</p>
    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>