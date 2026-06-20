@php use Illuminate\Support\Str; @endphp

<body style="
    margin:0;
    font-family: Arial, sans-serif;
    background:#f5f5f5;
">

@include('components.navbar')

<!-- NOTIF -->
<div id="notif" style="
    position:fixed;
    top:80px;
    right:20px;
    background:#2ecc71;
    color:white;
    padding:12px 20px;
    border-radius:8px;
    display:none;
    z-index:999;
"></div>

<!-- CONTAINER -->
<div style="
    background:#f9f6f3;
    padding:40px 20px;
    border-radius:20px;
    max-width:1200px;
    margin:auto;
">

<div style="
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap:25px;
">

@foreach($products as $p)

@php
    $cart = session('cart', []);
    $qty = isset($cart[$p->id]) ? $cart[$p->id]['qty'] : 0;
@endphp

<div style="
    background:white;
    padding:15px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    text-align:center;
">

<img src="{{ asset('images/'.$p->image) }}" style="
    width:100%;
    height:160px;
    object-fit:cover;
    border-radius:10px;
">

<h3>{{ $p->name }}</h3>

<p style="color:#666;">
    {{ Str::limit($p->description, 60) }}
</p>

<b style="color:#6b3e26;">
    Rp {{ number_format($p->price, 0, ',', '.') }}
</b>

<div style="margin-top:10px;">

<a href="/products/{{ $p->id }}" style="
    display:block;
    background:#6b3e26;
    color:white;
    padding:8px;
    border-radius:8px;
    text-decoration:none;
    margin-bottom:8px;
">
    Lihat Detail
</a>

@if($qty > 0)

<div style="display:flex; justify-content:center; gap:10px; align-items:center;">

<button type="button" onclick="decreaseCart({{ $p->id }}, this)" style="
    background:#e74c3c;
    color:white;
    padding:5px 12px;
    border-radius:5px;
    border:none;
    cursor:pointer;
">-</button>

<span id="qty-{{ $p->id }}" style="font-weight:bold;">
    {{ $qty }}
</span>

<button type="button" onclick="addToCart({{ $p->id }}, this)" style="
    background:#2ecc71;
    color:white;
    padding:5px 12px;
    border-radius:5px;
    border:none;
    cursor:pointer;
">+</button>

</div>

@else

<button type="button" onclick="addToCart({{ $p->id }}, this)" style="
    background:#2ecc71;
    color:white;
    padding:8px 15px;
    border-radius:8px;
    border:none;
    cursor:pointer;
    font-weight:bold;
">
    + Keranjang
</button>

@endif

</div>

</div>

@endforeach

</div>
</div>

<!-- SCRIPT -->
<script>
function addToCart(id){
    fetch('/cart/add/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(() => {
        updateQty(id, 1);
        updateCartCount(1);
        showNotif("Ditambahkan ke keranjang");
    });
}

function decreaseCart(id){
    fetch('/cart/decrease/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(() => {
        updateQty(id, -1);
        updateCartCount(-1);
    });
}

function updateQty(id, change){
    let qtyEl = document.getElementById('qty-'+id);

    // 🔥 kalau belum ada (berarti masih tombol "+ Keranjang")
    if(!qtyEl){
        // reload ringan biar struktur blade kepake lagi
        location.reload();
        return;
    }

    let current = parseInt(qtyEl.innerText);
    let newQty = current + change;

    if(newQty <= 0){
        // balik ke kondisi awal (biar blade yang handle)
        location.reload();
    } else {
        qtyEl.innerText = newQty;
    }
}

function updateCartCount(change){
    let el = document.getElementById('cart-count');
    el.innerText = parseInt(el.innerText) + change;
}

function showNotif(text){
    let notif = document.getElementById('notif');
    notif.innerText = text;
    notif.style.display = 'block';

    setTimeout(() => {
        notif.style.display = 'none';
    }, 1500);
}
</script>

</body>