<head>
    <title>Browminzz</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="margin:0; font-family:Arial; background:#f5f5f5;">

<!-- NAVBAR -->
@include('components.navbar')

<!-- HERO -->
<div style="
    background:url('/images/banner.png') center/cover;
    height:400px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;
    position:relative;
">

    <!-- overlay gelap -->
    <div style="
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.5);
    "></div>

    <!-- isi -->
    <div style="position:relative; z-index:2;">
        <h1 style="font-size:56px; margin-bottom:10px;">
            Brownies Premium
        </h1>

        <p style="font-size:18px;">
            Lembut, lumer, dan dibuat dengan bahan terbaik
        </p>

        <p style="font-size:16px; opacity:0.9; margin-top:5px;">
            Mulai dari Rp 50.000 • Fresh setiap hari
        </p>
        
        <a href="/products" style="
            background:#6b3e26;
            color:white;
            padding:12px 25px;
            border-radius:8px;
            text-decoration:none;
            display:inline-block;
            margin-top:15px;
        ">
            Lihat Menu
        </a>
    </div>

</div>

<!-- TENTANG -->
<div style="text-align:center; padding:100px 20px;">
    <h2 style="margin-bottom:10px;">Tentang Kami</h2>

    <p style="
        max-width:600px; 
        margin:auto; 
        color:#555;
        line-height:1.6;
    ">
        Browminzz adalah UMKM yang menyediakan brownies homemade 
        dengan bahan berkualitas, menghasilkan rasa coklat yang 
        lembut, manis, dan premium.
    </p>
    <hr style="width:120px; margin:25px auto; border:3px solid #6b3e26; border-radius:10px;">
</div>

<!-- MENU FAVORIT -->
<div style="text-align:center; padding:70px 20px; background:#f9f7f5;">
    <h2 style="font-size:28px; margin-bottom:10px;">
        Menu Favorit
    </h2>

    <p style="color:#777; margin-top:0; margin-bottom:10px;">
        Pilihan brownies terbaik favorit pelanggan
    </p>

    <!-- garis kecil biar ada pemisah -->
    <div style="
        width:60px;
        height:3px;
        background:#6b3e26;
        margin:10px auto 30px auto;
        border-radius:10px;
    "></div>

    <!-- container biar ga terlalu lebar -->
    <div style="max-width:1000px; margin:auto;">

        <div style="
            display:flex;
            justify-content:center;
            gap:30px;
            margin-top:10px;
            flex-wrap:wrap;
        ">

            @foreach($products as $p)
            <a href="/products/{{ $p->id }}" style="text-decoration:none; color:black;">
                
                <div style="
                    background:white; 
                    padding:15px; 
                    border-radius:15px; 
                    width:240px;
                    text-align:center;
                    transition:0.3s ease;
                    box-shadow:0 5px 15px rgba(0,0,0,0.08);
                "
                onmouseover="this.style.transform='translateY(-8px) scale(1.03)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.15)'"
                onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.08)'"
                >

                    <img src="{{ asset('images/'.$p->image) }}" 
                        style="
                            width:100%; 
                            border-radius:10px;
                            height:150px;
                            object-fit:cover;
                        ">

                    <h3 style="margin:12px 0 5px 0; font-size:18px;">
                        {{ $p->name }}
                    </h3>

                    <p style="
                        color:#6b3e26; 
                        font-weight:bold;
                        margin:0;
                        font-size:15px;
                    ">
                        Rp {{ number_format($p->price) }}
                    </p>

                    <p style="
                        font-size:12px;
                        color:#888;
                        margin-top:6px;
                    ">
                        Klik untuk lihat detail
                    </p>

                </div>

            </a>
            @endforeach

        </div>

        <!-- CTA bawah -->
        <div style="margin-top:50px;">
            <p style="color:#555; margin-bottom:12px; font-size:14px;">
                Temukan varian favoritmu sekarang
            </p>

            <a href="/products" style="
                background:#6b3e26;
                color:white;
                padding:12px 30px;
                border-radius:8px;
                text-decoration:none;
                display:inline-block;
                transition:0.3s;
            "
            onmouseover="this.style.background='#4e2d1c'"
            onmouseout="this.style.background='#6b3e26'"
            >
                Lihat Semua Menu
            </a>
        </div>

    </div>

</div>

<!-- KENAPA PILIH -->
<div style="
    padding:60px 20px;
    background:white;
    text-align:center;
">

    <h2 style="font-size:26px; margin-bottom:10px;">
        Kenapa Pilih Browminzz?
    </h2>

    <div style="
        width:60px;
        height:3px;
        background:#6b3e26;
        margin:10px auto 40px auto;
        border-radius:10px;
    "></div>

    <div style="
        display:flex;
        justify-content:center;
        gap:20px;
        flex-wrap:wrap;
        max-width:900px;
        margin:auto;
    ">

        <div style="
            width:220px;
            background:#f9f7f5;
            padding:25px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        ">
            <h3 style="font-size:20px; margin-bottom:8px;">🍫 Premium</h3>
            <p style="color:#777; font-size:14px; margin:0;">
                Bahan berkualitas terbaik
            </p>
        </div>

        <div style="
            width:220px;
            background:#f9f7f5;
            padding:25px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        ">
            <h3 style="font-size:20px; margin-bottom:8px;">🔥 Fresh</h3>
            <p style="color:#777; font-size:14px; margin:0;">
                Dibuat setiap hari
            </p>
        </div>

        <div style="
            width:220px;
            background:#f9f7f5;
            padding:25px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        ">
            <h3 style="font-size:20px; margin-bottom:8px;">🚚 Cepat</h3>
            <p style="color:#777; font-size:14px; margin:0;">
                Pengiriman cepat & aman
            </p>
        </div>

    </div>

</div>

<!-- TESTIMONI -->
<div style="
    display:flex;
    justify-content:center;
    align-items:center;
    gap:25px;
    flex-wrap:wrap;
    margin-top:20px;
    max-width:900px;
    margin-left:auto;
    margin-right:auto;
">

@foreach($testimoni as $t)
<div style="
    background:white;
    padding:25px;
    border-radius:15px;
    width:300px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s;
"
onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.15)'"
onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.08)'"
>

    <img src="{{ asset('images/'.$t->foto) }}" style="
        width:80px;
        height:80px;
        border-radius:50%;
        object-fit:cover;
        margin-bottom:10px;
        border:3px solid #6b3e26;
    ">

    <p style="
        font-size:14px; 
        color:#555;
        line-height:1.6;
        margin-bottom:10px;
    ">
        "{{ $t->isi }}"
    </p>

    <div style="color:#f5a623;">
        ⭐⭐⭐⭐⭐
    </div>

    <b>- {{ $t->nama }}</b>

</div>
@endforeach

</div>

<div style="
    text-align:center;
    padding:30px;
    background:#6b3e26;
    color:white;
    margin-top:120px;
">
    <p>© 2026 Browminzz - Brownies Premium</p>
</div>

<!-- keranjang -->
    <div id="cartModal" style="
        position:fixed;
        top:0;
        right:-400px;
        width:350px;
        height:100%;
        background:white;
        box-shadow:-5px 0 15px rgba(0,0,0,0.1);
        padding:20px;
        padding-bottom:50px;
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
    <!-- CHECKOUT FORM (HIDDEN DULU) -->
    <div id="checkoutContent" style="display:none; margin-top:10px;">

        <div style="
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
        ">

            <h4 style="margin-bottom:15px;">Checkout</h4>

            <!-- NAMA -->
            <div style="margin-bottom:15px;">
                <label style="font-weight:500;">Nama</label>
                <input 
                    type="text" 
                    id="co_nama"
                    placeholder="Masukkan nama kamu"
                    style="
                        width:100%;
                        padding:10px;
                        margin-top:5px;
                        border-radius:8px;
                        border:1px solid #ddd;
                    "
                >
            </div>

            <!-- NO HP -->
            <div style="margin-bottom:20px;">
                <label style="font-weight:500;">No HP</label>
                <input 
                    type="tel" 
                    id="co_hp"
                    inputmode="numeric"
                    placeholder="628xxxxxxxxxx"
                    maxlength="13"
                    style="
                        width:100%;
                        padding:10px;
                        margin-top:5px;
                        border-radius:8px;
                        border:1px solid #ddd;
                    "
                >
            </div>

            <!-- BUTTON -->
            <button onclick="processCheckout()" style="
                width:100%;
                background:linear-gradient(135deg, #2ecc71, #27ae60);
                color:white;
                padding:12px;
                border:none;
                border-radius:10px;
                font-weight:bold;
                cursor:pointer;
            ">
                Kirim ke WhatsApp 🚀
            </button>

            <button onclick="backToCart()" style="
                width:100%;
                margin-top:10px;
                background:#eee;
                padding:10px;
                border:none;
                border-radius:8px;
                cursor:pointer;
            ">
                ← Kembali
            </button>

        </div>

    </div>


    <!-- FOOTER (INI HARUS DI LUAR) -->
    <div id="cartFooter" style="
        border-top:1px solid #eee;
        padding:15px;
        background:white;

        margin-bottom:15px; /* 🔥 NAIKIN */
        border-radius:12px;
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

// ADD / MINUS (POST FIX)
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

// LOAD CART + TOTAL
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

// FORMAT
function formatRupiah(angka){
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// SYNC KE CARD PRODUK
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

// UPDATE CART COUNT
function updateCartCount(change){
    let el = document.getElementById('cart-count');
    if(!el) return;

    let current = parseInt(el.innerText) || 0;
    el.innerText = current + change;
}

// CLOSE CLICK OUTSIDE
document.addEventListener('click', function(e){
    let modal = document.getElementById('cartModal');

    if(isOpen && !modal.contains(e.target) && !e.target.closest('button')){
        modal.style.right = '-400px';
        isOpen = false;
    }
});

function openCheckout(){
    document.getElementById('cartContent').style.display = 'none';
    document.getElementById('checkoutContent').style.display = 'block';

    document.getElementById('cartFooter').style.display = 'none';
}

function backToCart(){
    document.getElementById('checkoutContent').style.display = 'none';
    document.getElementById('cartContent').style.display = 'block';

    document.getElementById('cartFooter').style.display = 'block';
}

function processCheckout(){
    let nama = document.getElementById('co_nama').value;
    let hp = document.getElementById('co_hp').value;

    if(!nama){
        alert('Nama wajib diisi!');
        return;
    }

    if(!/^628[0-9]{8,10}$/.test(hp)){
        alert('Nomor harus format Indonesia (628xxxx)');
        return;
    }

    fetch('/cart/data')
    .then(res => res.json())
    .then(data => {

        let pesan = "Halo, saya ingin pesan:%0A";
        let total = 0;

        Object.values(data).forEach(item => {
            let subtotal = item.price * item.qty;
            total += subtotal;

            pesan += `- ${item.name} x${item.qty} = Rp ${formatRupiah(subtotal)}%0A`;
        });

        pesan += `%0ATotal: Rp ${formatRupiah(total)}`;
        pesan += `%0ANama: ${nama}`;
        pesan += `%0ANo HP: ${hp}`;

        window.location.href = "https://wa.me/6285846987881?text=" + pesan;
    });
}

// VALIDASI INPUT NO HP (REALTIME)
const inputHp = document.getElementById('co_hp');

if(inputHp){
    inputHp.addEventListener('input', function(e){
        let val = e.target.value;

        // hapus selain angka
        val = val.replace(/[^0-9]/g, '');

        // auto 08 → 628
        if(val.startsWith('08')){
            val = '628' + val.slice(2);
        }

        // max 13 digit
        val = val.slice(0, 13);

        e.target.value = val;
    });
}
</script>

</body>