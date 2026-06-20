<!-- NAVBAR -->
<body style="
    margin:0;
    font-family: 'Poppins', sans-serif;
    background:#f5f5f5;
">

<div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 50px;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
    position:sticky;
    top:0;
    z-index:100;
">

    <h2 style="margin:0; color:#6b3e26;">Browminzz</h2>

    <div style="display:flex; align-items:center; gap:20px;">

        <a href="/" style="
            text-decoration:none;
            {{ request()->is('/') ? 'color:#6b3e26; font-weight:bold; border-bottom:2px solid #6b3e26;' : 'color:#333;' }}
        ">Home</a>

        <a href="/products" style="
            text-decoration:none;
            {{ request()->is('products') ? 'color:#6b3e26; font-weight:bold; border-bottom:2px solid #6b3e26;' : 'color:#333;' }}
        ">Menu</a>

        @php
            $cart = session('cart', []);
            $totalQty = 0;
            foreach($cart as $item){
                $totalQty += $item['qty'];
            }
        @endphp

        <a href="/cart" style="
            background:#6b3e26;
            color:white;
            padding:8px 15px;
            border-radius:8px;
            text-decoration:none;
            font-weight:bold;
        ">
            🛒 Cart (<span id="cart-count">{{ $totalQty }}</span>)
        </a>

    </div>

</div>

<h1 style="text-align:center; margin-bottom:30px;">
    Keranjang Belanja
</h1>

<div style="max-width:800px; margin:auto;">

@if(session('cart') && count(session('cart')) > 0)
    
    @php $total = 0; @endphp

    @foreach(session('cart') as $id => $item)

    @php 
        $subtotal = $item['price'] * $item['qty']; 
        $total += $subtotal;
    @endphp

    <div style="
        display:flex;
        gap:20px;
        margin-bottom:15px;
        padding:15px;
        border:1px solid #ddd;
        border-radius:10px;
        align-items:center;
        background:white;
    ">

        <img src="{{ asset('images/'.$item['image']) }}" width="100">

        <div style="flex:1;">
            <b>{{ $item['name'] }}</b><br>

            <div style="
                margin-top:5px;
                display:flex;
                align-items:center;
                gap:10px;
            ">

                <!-- MINUS -->
                <button onclick="minusCart({{ $id }}, this)" style="
                    background:#e74c3c;
                    color:white;
                    padding:4px 10px;
                    border-radius:5px;
                    border:none;
                    cursor:pointer;
                ">-</button>

                <span class="qty" style="font-weight:bold;">
                    {{ $item['qty'] }}
                </span>

                <!-- PLUS -->
                <button onclick="addCart({{ $id }}, this)" style="
                    background:#2ecc71;
                    color:white;
                    padding:4px 10px;
                    border-radius:5px;
                    border:none;
                    cursor:pointer;
                ">+</button>

            </div>

            <small>
                Rp {{ number_format($item['price'],0,',','.') }}
            </small>
        </div>

        <div>
            <b class="subtotal">
                Rp {{ number_format($subtotal,0,',','.') }}
            </b>
        </div>

    </div>

    @endforeach

    <hr>

    <h2 style="text-align:right;">
        Total: Rp <span id="total">{{ number_format($total,0,',','.') }}</span>
    </h2>

    <div style="text-align:right; margin-top:20px;">
        <a href="/checkout" style="
            background:#2ecc71;
            color:white;
            padding:12px 20px;
            border-radius:8px;
            text-decoration:none;
            font-weight:bold;
        ">
            Checkout
        </a>
    </div>

@else

    <p style="text-align:center;">
        Keranjang kosong 😢<br><br>
        <a href="/products" style="
            background:#6b3e26;
            color:white;
            padding:10px 20px;
            border-radius:8px;
            text-decoration:none;
        ">
            Lihat Menu
        </a>
    </p>

@endif

</div>

<!-- SCRIPT -->
<script>
function addCart(id, el){
    fetch('/cart/add/' + id, {
        headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(res => res.json())
    .then(() => {
        safeUpdate(el, 1);
    })
    .catch(err => console.log(err));
}

function minusCart(id, el){
    fetch('/cart/decrease/' + id, {
        headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(res => res.json())
    .then(() => {
        safeUpdate(el, -1);
    })
    .catch(err => console.log(err));
}

function safeUpdate(el, change){
    try {
        let itemBox = el.closest('div[style*="border:1px solid"]');
        if(!itemBox) return;

        let qtyEl = itemBox.querySelector('.qty');
        let subtotalEl = itemBox.querySelector('.subtotal');
        let priceEl = itemBox.querySelector('small');

        if(!qtyEl || !subtotalEl || !priceEl) return;

        let qty = parseInt(qtyEl.innerText) || 0;
        let newQty = qty + change;

        let price = parseInt(priceEl.innerText.replace(/[^0-9]/g, '')) || 0;

        // 🔥 HAPUS ITEM
        if(newQty <= 0){
            itemBox.remove();
            updateTotal();
            return;
        }

        // update qty
        qtyEl.innerText = newQty;

        // update subtotal
        subtotalEl.innerText = "Rp " + formatRupiah(price * newQty);

        updateTotal();

    } catch (err) {
        console.log("ERROR UPDATE UI:", err);
    }
}

function updateTotal(){
    let subtotals = document.querySelectorAll('.subtotal');
    let total = 0;

    subtotals.forEach(el => {
        total += parseInt(el.innerText.replace(/[^0-9]/g, '')) || 0;
    });

    let totalEl = document.getElementById('total');
    if(totalEl){
        totalEl.innerText = formatRupiah(total);
    }
}

function formatRupiah(angka){
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
</script>

</body>