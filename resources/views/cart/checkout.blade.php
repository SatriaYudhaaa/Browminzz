<h1 style="text-align:center; margin-bottom:30px;">
    Checkout
</h1>

<div style="
    max-width:500px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
">

<form action="/checkout" method="POST">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="nama" required style="
        width:100%;
        padding:10px;
        margin-bottom:15px;
        border-radius:8px;
        border:1px solid #ccc;
    ">

    <label>No HP</label><br>
    <input type="text" name="no_hp" required style="
        width:100%;
        padding:10px;
        margin-bottom:20px;
        border-radius:8px;
        border:1px solid #ccc;
    ">

    <button type="submit" style="
        width:100%;
        background:#2ecc71;
        color:white;
        padding:12px;
        border:none;
        border-radius:10px;
        font-size:16px;
        cursor:pointer;
    ">
        Pesan Sekarang
    </button>

</form>

</div>