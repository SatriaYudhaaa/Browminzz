<div id="cartModal" style="
    position:fixed;
    top:0;
    right:-400px;
    width:350px;
    height:100%;
    background:white;
    box-shadow:-5px 0 20px rgba(0,0,0,0.1);
    padding:20px;
    transition:0.3s;
    z-index:999;
    overflow:auto;
">

    <h3 style="margin-bottom:15px;">Keranjang 🛒</h3>

    <div id="cart-items">
        <!-- isi cart via AJAX -->
    </div>

    <hr>

    <h4>Total: Rp <span id="cart-total">0</span></h4>

    <button onclick="openCheckout()" style="
        width:100%;
        padding:12px;
        background:#2ecc71;
        color:white;
        border:none;
        border-radius:10px;
        margin-top:10px;
        cursor:pointer;
    ">
        Checkout
    </button>

</div>