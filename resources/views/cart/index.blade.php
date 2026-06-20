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

        <!-- IMAGE -->
        <img src="{{ asset('images/'.$item['image']) }}" width="100">

        <!-- INFO -->
        <div style="flex:1;">
            <b>{{ $item['name'] }}</b><br>

            <!-- QUANTITY CONTROL -->
            <div style="
                margin-top:5px;
                display:flex;
                align-items:center;
                gap:10px;
            ">

                <a href="/cart/decrease/{{ $id }}" style="
                    background:#e74c3c;
                    color:white;
                    padding:4px 10px;
                    border-radius:5px;
                    text-decoration:none;
                ">-</a>

                <span style="font-weight:bold;">
                    {{ $item['qty'] }}
                </span>

                <a href="/cart/add/{{ $id }}" style="
                    background:#2ecc71;
                    color:white;
                    padding:4px 10px;
                    border-radius:5px;
                    text-decoration:none;
                ">+</a>

            </div>

            <small>
                Rp {{ number_format($item['price'],0,',','.') }}
            </small>
        </div>

        <!-- SUBTOTAL -->
        <div>
            <b>
                Rp {{ number_format($subtotal,0,',','.') }}
            </b>
        </div>

    </div>

    @endforeach

    <hr>

    <!-- TOTAL -->
    <h2 style="text-align:right;">
        Total: Rp {{ number_format($total,0,',','.') }}
    </h2>

    <!-- CHECKOUT -->
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