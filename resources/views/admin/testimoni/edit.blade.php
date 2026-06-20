<form action="/admin/testimoni/{{ $testimoni->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $testimoni->nama }}"><br><br>

    <textarea name="isi">{{ $testimoni->isi }}</textarea><br><br>

    <p>Rating:</p>
    <select name="rating">
        <option value="1" {{ $testimoni->rating == 1 ? 'selected' : '' }}>⭐</option>
        <option value="2" {{ $testimoni->rating == 2 ? 'selected' : '' }}>⭐⭐</option>
        <option value="3" {{ $testimoni->rating == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
        <option value="4" {{ $testimoni->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
        <option value="5" {{ $testimoni->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
    </select>

    <br><br>

    <!-- FIX DI SINI -->
    <input type="file" name="foto"><br><br>

    <button type="submit">Update</button>
</form>