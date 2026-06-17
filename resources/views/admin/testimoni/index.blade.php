<h2>Data Testimoni</h2>

<a href="/admin/testimoni/create">Tambah Testimoni</a>

@foreach($testimoni as $t)
    <p>
        {{ $t->nama }} - {{ $t->isi }}

        <!-- EDIT -->
        <a href="/admin/testimoni/{{ $t->id }}/edit">Edit</a>

        <!-- DELETE -->
        <form action="/admin/testimoni/{{ $t->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Yakin mau hapus testimoni ini?')"
                style="color:red;">
                Hapus
            </button>
        </form>
    </p>
@endforeach