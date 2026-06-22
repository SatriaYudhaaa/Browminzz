@extends('layouts.app')

@section('content')

<div style="max-width:900px; margin:auto; padding:30px;">

```
<!-- HEADER -->
<h2 style="margin-bottom:10px;">💬 Data Testimoni</h2>

<!-- BACK BUTTON -->
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
<a href="/admin/testimoni/create" style="
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
    + Tambah Testimoni
</a>

<!-- LIST -->
@foreach($testimoni as $t)

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
" onmouseover="this.style.transform='scale(1.01)'" onmouseout="this.style.transform='scale(1)'">

    <!-- FOTO -->
    <img src="{{ asset('images/'.$t->foto) }}" style="
        width:80px;
        height:80px;
        object-fit:cover;
        border-radius:50%;
        background:#ddd;
    " onerror="this.src='https://via.placeholder.com/80'">

    <!-- INFO -->
    <div style="flex:1;">
        <b style="font-size:16px;">{{ $t->nama }}</b><br>
        <span style="color:#555;">"{{ $t->isi }}"</span>
    </div>

    <!-- ACTION -->
    <div style="display:flex; flex-direction:column; gap:6px;">

        <a href="/admin/testimoni/{{ $t->id }}/edit" style="
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

        <form action="/admin/testimoni/{{ $t->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Yakin mau hapus testimoni ini?')"
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
