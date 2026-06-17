<h2>Tambah Testimoni</h2>

<form action="/admin/testimoni" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nama" placeholder="Nama"><br><br>
    <textarea name="isi" placeholder="Isi"></textarea><br><br>

    <!-- INI PENTING -->
    <input type="file" name="foto"><br><br>

    <button type="submit">Simpan</button>
</form>