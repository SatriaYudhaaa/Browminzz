<div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 50px;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
">

    <!-- LOGO -->
    <h2 style="margin:0; color:#6b3e26;">Browminzz</h2>

    <!-- MENU -->
    <div style="display:flex; align-items:center; gap:25px;">

        <a href="/" style="
            text-decoration:none;
            font-weight:500;
            {{ request()->is('/') ? 'color:#6b3e26; border-bottom:2px solid #6b3e26;' : 'color:#333;' }}
        ">Home</a>

        <a href="/products" style="
            text-decoration:none;
            font-weight:500;
            {{ request()->is('products*') ? 'color:#6b3e26; border-bottom:2px solid #6b3e26;' : 'color:#333;' }}
        ">Menu</a>

        @php
            $cart = session('cart', []);
            $totalQty = 0;
            foreach($cart as $item){
                $totalQty += $item['qty'];
            }
        @endphp

        <a id="cartBtn" href="javascript:void(0)" onclick="toggleCart()" style="
            text-decoration:none;
            font-weight:500;
            position:relative;
            color:#333;
        ">
            Cart

            @if($totalQty > 0)
            <span id="cart-count" style="
                position:absolute;
                top:-8px;
                right:-15px;
                background:#e74c3c;
                color:white;
                font-size:11px;
                padding:3px 6px;
                border-radius:50%;
            ">
                {{ $totalQty }}
            </span>
            @endif
        </a>

    </div>
</div>