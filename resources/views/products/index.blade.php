@php use Illuminate\Support\Str; @endphp

<h1 style="
    text-align:center; 
    margin-bottom:10px;
    font-size:32px;
">
    Browminzz Menu
</h1>

<p style="
    text-align:center;
    color:#777;
    margin-bottom:40px;
">
    Pilihan brownies premium favorit untuk kamu 
</p>

<div style="
    background:#f9f6f3;
    padding:40px 20px;
    border-radius:20px;
">

<div style="
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap:25px;
    max-width:1200px;
    margin:auto;
">

@foreach($products as $p)

    <div style="
        width:260px;
        background:white;
        padding:15px;
        border-radius:15px;
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
        text-align:center;
        transition:0.3s;
        position:relative;
    " 
    onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)'" 
    onmouseout="this.style.transform='none'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.08)'">

        {{-- GAMBAR --}}
        <img src="{{ asset('images/'.$p->image) }}" style="
            width:100%;
            height:160px;
            object-fit:cover;
            border-radius:10px;
        ">

        {{-- NAMA --}}
        <h3 style="margin:10px 0 5px 0;">
            {{ $p->name }}
        </h3>

        {{-- DESKRIPSI --}}
        <p style="
            font-size:14px; 
            color:#666;
            min-height:40px;
        ">
            {{ Str::limit($p->description, 60) }}
        </p>

        {{-- HARGA --}}
        <div style="
            font-size:16px;
            font-weight:bold;
            color:#6b3e26;
            margin:8px 0;
        ">
            Rp {{ number_format($p->price, 0, ',', '.') }}
        </div>

        {{-- BUTTON --}}
        <a href="/products/{{ $p->id }}" style="
            background:#6b3e26;
            color:white;
            padding:10px 18px;
            border-radius:8px;
            text-decoration:none;
            display:inline-block;
            transition:0.2s;
        "
        onmouseover="this.style.background='#4e2d1c'"
        onmouseout="this.style.background='#6b3e26'"
        >
            Lihat Detail →
        </a>

    </div>

@endforeach

</div>
</div>