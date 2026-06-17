<h2>Tambah Produk</h2>

<form action="/admin/products" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Nama Produk"><br><br>

    <textarea name="description" placeholder="Deskripsi"></textarea><br><br>

    <input type="number" name="price" placeholder="Harga"><br><br>

    <input type="file" name="image"><br><br>

    <!-- FAVORIT -->
    <label>
        <input type="checkbox" name="is_favorite" value="1">
        Jadikan Menu Favorit
    </label><br><br>

    <button type="submit">Simpan</button>
</form>