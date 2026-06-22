<head>
    <title>Browminzz</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="margin:0; font-family:Arial; background:#f5f5f5;">

@include('components.navbar')

<h1 style="text-align:center; margin-bottom:40px;">
    Detail Produk
</h1>

<div style="
    max-width:900px;
    margin:30px auto;
    display:flex;
    gap:30px;
    flex-wrap:wrap;
    align-items:flex-start;
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
">

    {{-- GAMBAR --}}
    <div style="flex:1; min-width:280px;">
        <img src="{{ asset('images/'.$product->image) }}" style="
            width:100%;
            border-radius:20px;
            object-fit:cover;
        ">
    </div>

    {{-- INFO --}}
    <div style="flex:1; min-width:280px;">

        <h2 style="
            font-size:26px;
            margin-bottom:8px;
            color:#222;
        ">
            {{ $product->name }}
        </h2>

        <h3 style="
            color:#6b3e26;
            font-size:24px;
            margin-bottom:15px;
            font-weight:bold;
        ">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </h3>

        <p style="
            color:#666;
            line-height:1.6;
            margin-bottom:20px;
            font-size:14px;
        ">
            {{ $product->detail ?? $product->description }}
        </p>

        <!-- HIGHLIGHT -->
        <div style="
            background:#fff8f3;
            padding:15px;
            border-radius:12px;
            margin-bottom:20px;
            font-size:13px;
            color:#444;
            border:1px solid #f0e5dc;
        ">
            ✔ Fresh setiap hari <br>
            ✔ Tanpa pengawet <br>
            ✔ Cokelat premium <br>
            ✔ Cocok untuk hadiah 🎁
        </div>

        <!-- BUTTON -->
        <a href="https://wa.me/6285846987881?text={{ urlencode('Halo, saya mau pesan '.$product->name.' seharga Rp '.number_format($product->price,0,',','.')) }}" 
        target="_blank"
        style="
            display:block;
            text-align:center;
            background:#25D366;
            color:white;
            padding:14px;
            border-radius:12px;
            text-decoration:none;
            font-weight:bold;
            font-size:16px;
            margin-bottom:10px;
            box-shadow:0 8px 20px rgba(0,0,0,0.1);
        ">
            🛒 Pesan Sekarang
        </a>

        <a href="/products" style="
            text-decoration:none;
            color:#6b3e26;
            font-size:13px;
        ">
            ← Kembali ke menu
        </a>

    </div>

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

        margin-bottom:15px; 
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

function openCheckout(){
    document.getElementById('cartContent').style.display = 'none';
    document.getElementById('checkoutContent').style.display = 'block';

    
    document.getElementById('cartFooter').style.display = 'none';
}

function backToCart(){
    document.getElementById('checkoutContent').style.display = 'none';
    document.getElementById('cartContent').style.display = 'block';

    //  munculin lagi footer
    document.getElementById('cartFooter').style.display = 'block';
}

function processCheckout(){
    let nama = document.getElementById('co_nama').value;
    let hp = document.getElementById('co_hp').value;

    if(!nama){
        alert('Nama wajib diisi!');
        return;
    }

    //  VALIDASI NOMOR INDONESIA
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