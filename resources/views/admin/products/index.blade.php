@extends('layouts.app')

@section('content')

<div style="max-width:900px; margin:auto; padding:30px;">

```
<!-- HEADER -->
<h2 style="margin-bottom:10px;">🍫 Kelola Produk</h2>

<!-- BACK -->
<a href="/admin" style="
    display:inline-block;
    margin-bottom:15px;
    background:#555;
    color:white;
    padding:8px 14px;
    border-radius:8px;
    text-decoration:none;
    font-size:13px;
">
    ← Kembali ke Dashboard
</a>

<!-- TAMBAH -->
<a href="/admin/products/create" style="
    display:inline-block;
    margin-bottom:25px;
    margin-left:10px;
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    font-weight:bold;
">
    + Tambah Produk
</a>

<!-- LIST -->
@foreach($products as $p)

<div style="
    border:1px solid #eee;
    padding:15px;
    margin-bottom:20px;
    border-radius:15px;
    display:flex;
    align-items:center;
    gap:20px;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
    transition:0.2s;
" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">

    <!-- FOTO -->
    <img src="{{ asset('images/'.$p->image) }}" style="
        width:100px;
        height:100px;
        object-fit:cover;
        border-radius:10px;
    " onerror="this.src='https://via.placeholder.com/100'">

    <!-- INFO -->
    <div style="flex:1;">
        <b style="font-size:18px;">{{ $p->name }}</b><br>
        <span style="color:#555;">Rp {{ number_format($p->price) }}</span>
    </div>

    <!-- FAVORIT -->
    <form action="/admin/products/{{ $p->id }}/favorite" method="POST" style="margin-right:10px;">
        @csrf

        <label style="
            cursor:pointer;
            background:#f5f5f5;
            padding:6px 10px;
            border-radius:8px;
        ">
            <input 
                type="checkbox" 
                name="is_favorite"
                onchange="this.form.submit()"
                {{ $p->is_favorite ? 'checked' : '' }}
            >
            ⭐
        </label>
    </form>

    <!-- ACTION -->
    <div style="display:flex; flex-direction:column; gap:6px;">

        <a href="/admin/products/{{ $p->id }}/edit" style="
            background:#3498db;
            color:white;
            padding:6px 12px;
            border-radius:6px;
            text-decoration:none;
            font-size:12px;
            text-align:center;
        ">
            Edit
        </a>

        <form action="/admin/products/{{ $p->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Yakin mau hapus produk ini?')"
                style="
                    background:#e74c3c;
                    color:white;
                    padding:6px 12px;
                    border:none;
                    border-radius:6px;
                    font-size:12px;
                    cursor:pointer;
                    width:100%;
                ">
                Hapus
            </button>
        </form>

    </div>

</div>

@endforeach
```

</div>

@endsection
