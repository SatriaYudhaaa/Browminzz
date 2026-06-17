<h2>Edit Testimoni</h2>

<form action="/admin/testimoni/{{ $testimoni->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $testimoni->nama }}"><br><br>
    <textarea name="isi">{{ $testimoni->isi }}</textarea><br><br>
    <input type="text" name="foto" value="{{ $testimoni->foto }}"><br><br>

    <button type="submit">Update</button>
</form>