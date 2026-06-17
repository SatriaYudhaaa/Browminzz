<h1 style="text-align:center;">Browminzz Menu</h1>

<div style="
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
">

@foreach($products as $p)
    <div style="
        width:220px;
        background:white;
        padding:15px;
        border-radius:10px;
        box-shadow:0 4px 10px rgba(0,0,0,0.1);
        text-align:center;
    ">
        <img src="{{ asset('images/' . $p->image) }}" 
             style="width:100%; height:150px; object-fit:cover; border-radius:8px;">
        
        <h3>{{ $p->name }}</h3>
        
        <p style="color:#555;">{{ $p->description }}</p>
        
        <p style="font-weight:bold;">Rp {{ $p->price }}</p>

        <a href="/products/{{ $p->id }}" 
           style="display:inline-block; margin-top:10px; padding:6px 12px; background:#8B4513; color:white; border-radius:6px; text-decoration:none;">
           Lihat Detail
        </a>
    </div>
@endforeach

</div>