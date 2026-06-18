<h2>Kelola Produk</h2>

@foreach($products as $p)
<div style="
    border:1px solid #ddd;
    padding:15px;
    margin-bottom:15px;
    border-radius:10px;
    display:flex;
    align-items:center;
    gap:20px;
">

    <!-- FOTO -->
    <img src="{{ asset('images/'.$p->image) }}" width="100">

    <!-- INFO -->
    <div style="flex:1;">
        <b>{{ $p->name }}</b><br>
        Rp {{ number_format($p->price) }}
    </div>

    <!-- CHECKBOX FAVORIT -->
    <form action="/admin/products/{{ $p->id }}/favorite" method="POST">
        @csrf

        <input 
            type="checkbox" 
            name="is_favorite"
            onchange="this.form.submit()"
            {{ $p->is_favorite ? 'checked' : '' }}
        >
        Favorit
    </form>
    
</div>
<div style="margin-top:10px;">

    <a href="/admin/products/{{ $p->id }}/edit" style="
        background:#3498db;
        color:white;
        padding:6px 12px;
        border-radius:6px;
        text-decoration:none;
        font-size:12px;
        margin-right:5px;
    ">
        Edit
    </a>

    <form action="/admin/products/{{ $p->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')

        <button type="submit" onclick="return confirm('Yakin mau hapus produk ini?')"="
            background:#e74c3c;
            color:white;
            padding:6px 12px;
            border:none;
            border-radius:6px;
            font-size:12px;
            cursor:pointer;
        ">
            Hapus
        </button>
    </form>

</div>
@endforeach