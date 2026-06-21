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

<div id="cartModal" style="
    position:fixed;
    top:0;
    right:-400px;
    width:350px;
    height:100%;
    background:white;
    box-shadow:-5px 0 15px rgba(0,0,0,0.1);
    padding:20px;
    transition:0.3s;
    z-index:999;

    display:flex;
    flex-direction:column;
">

    <!-- HEADER -->
    <h3 style="margin:0;">
        Keranjang 🛒 
        <span onclick="toggleCart()" style="
            float:right;
            cursor:pointer;
            font-size:20px;
        ">✖</span>
    </h3>

    <!-- CONTENT (SCROLL AREA) -->
    <div id="cartContent" style="
        flex:1;
        overflow-y:auto;
        margin-top:10px;
    ">
    </div>

    <!-- FOOTER (INI HARUS DI LUAR) -->
    <div id="cartFooter" style="
        border-top:1px solid #eee;
        padding:15px;
        background:white;
        margin-bottom:10px;
        border-radius:12px 12px 0 0;
        box-shadow: 0 -5px 15px rgba(0,0,0,0.05);
    ">

        <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
            <b>Total</b>
            <b id="cartTotal">Rp 0</b>
        </div>

        <button onclick="openCheckout()" style="
            width:100%;
            background:#2ecc71;
            color:white;
            padding:10px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-weight:bold;
        ">
            Checkout
        </button>

    </div>

</div>

<script>
let isOpen = false;

// =====================
// TOGGLE CART
// =====================
function toggleCart(){
    let modal = document.getElementById('cartModal');

    if(isOpen){
        modal.style.right = '-400px';
        isOpen = false;
    } else {
        modal.style.right = '0px';
        isOpen = true;
        loadCart();
    }
}

// =====================
// ADD / MINUS (POST FIX)
// =====================
function addModal(id){
    fetch('/cart/add/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.json())
    .then(() => {
        loadCart();
        updateCartCount(1);
        syncProductQty(id, 1);
    });
}

function minusModal(id){
    fetch('/cart/decrease/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.json())
    .then(() => {
        loadCart();
        updateCartCount(-1);
        syncProductQty(id, -1);
    });
}

// =====================
// LOAD CART + TOTAL
// =====================
function loadCart(){
    fetch('/cart/data')
    .then(res => res.json())
    .then(data => {

        let container = document.getElementById('cartContent');
        let totalEl = document.getElementById('cartTotal');

        let total = 0;

        if(Object.keys(data).length === 0){
            container.innerHTML = "Cart kosong 😢";
            totalEl.innerText = "Rp 0";
            return;
        }

        let html = '';

        Object.values(data).forEach(item => {

            let subtotal = item.price * item.qty;
            total += subtotal;

            html += `
                <div style="margin-bottom:15px; border-bottom:1px solid #eee; padding-bottom:10px;">
                    
                    <b>${item.name}</b><br>

                    <div style="display:flex; align-items:center; gap:10px; margin-top:5px;">
                        
                        <button onclick="minusModal(${item.id})" style="
                            background:#e74c3c;
                            color:white;
                            border:none;
                            padding:3px 10px;
                            border-radius:5px;
                            cursor:pointer;
                        ">-</button>

                        <span>${item.qty}</span>

                        <button onclick="addModal(${item.id})" style="
                            background:#2ecc71;
                            color:white;
                            border:none;
                            padding:3px 10px;
                            border-radius:5px;
                            cursor:pointer;
                        ">+</button>

                    </div>

                    <span>
                        Rp ${formatRupiah(subtotal)}
                    </span>

                </div>
            `;
        });

        container.innerHTML = html;
        totalEl.innerText = "Rp " + formatRupiah(total);
    });
}

// =====================
// FORMAT
// =====================
function formatRupiah(angka){
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// =====================
// SYNC KE CARD PRODUK
// =====================
function syncProductQty(id, change){
    let qtyEl = document.getElementById('qty-' + id);
    if(!qtyEl) return;

    let current = parseInt(qtyEl.innerText) || 0;
    let newQty = current + change;

    if(newQty <= 0){
        let container = qtyEl.parentElement.parentElement;

        container.innerHTML = `
            <button onclick="addToCart(${id})" style="
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
        `;
    } else {
        qtyEl.innerText = newQty;
    }
}

// =====================
// UPDATE CART COUNT
// =====================
function updateCartCount(change){
    let el = document.getElementById('cart-count');
    if(!el) return;

    let current = parseInt(el.innerText) || 0;
    el.innerText = current + change;
}

// =====================
// CLOSE CLICK OUTSIDE
// =====================
document.addEventListener('click', function(e){
    let modal = document.getElementById('cartModal');

    if(isOpen && !modal.contains(e.target) && !e.target.closest('button')){
        modal.style.right = '-400px';
        isOpen = false;
    }
});
</script>

</body>