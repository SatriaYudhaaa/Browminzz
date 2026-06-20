<body style="
    margin:0;
    font-family: 'Poppins', sans-serif;
    background:#f5f5f5;
">

@include('components.navbar')

</div>

<!-- HEADER -->
<div style="text-align:center; margin:40px 0 20px;">
    <h1 style="margin:0; font-size:32px;">Checkout</h1>
    <p style="color:#777; margin-top:8px;">
        Isi data untuk melanjutkan pesanan kamu
    </p>
</div>

<!-- CARD -->
<div style="
    max-width:500px;
    margin:auto;
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
">

<form action="/checkout" method="POST">
    @csrf

    <!-- NAMA -->
    <div style="margin-bottom:20px;">
        <label style="font-weight:500;">Nama</label><br>
        <input 
            type="text" 
            name="nama" 
            required 
            maxlength="100"
            placeholder="Masukkan nama kamu"
            style="
                width:100%;
                padding:12px;
                margin-top:5px;
                border-radius:10px;
                border:1px solid #ddd;
                outline:none;
                font-size:14px;
            "
        >
    </div>

    <!-- NO HP -->
    <div style="margin-bottom:25px;">
        <label style="font-weight:500;">No HP</label><br>
        <input 
            type="text" 
            name="no_hp" 
            id="no_hp"
            required
            placeholder="628xxxxxxxxxx"
            pattern="^(08|628)[0-9]{8,11}$"
            title="Gunakan format nomor Indonesia"
            style="
                width:100%;
                padding:12px;
                margin-top:5px;
                border-radius:10px;
                border:1px solid #ddd;
                outline:none;
                font-size:14px;
            "
        >
    </div>

    <!-- BUTTON -->
    <button type="submit" style="
        width:100%;
        background:linear-gradient(135deg, #2ecc71, #27ae60);
        color:white;
        padding:14px;
        border:none;
        border-radius:12px;
        font-size:16px;
        cursor:pointer;
        font-weight:bold;
        transition:0.2s;
    "
    onmouseover="this.style.opacity='0.85'"
    onmouseout="this.style.opacity='1'"
    >
        Pesan Sekarang 🚀
    </button>

</form>

</div>

<!-- SCRIPT VALIDASI -->
<script>
const inputHp = document.getElementById('no_hp');

if(inputHp){
    inputHp.addEventListener('input', function(e){
        let val = e.target.value;

        val = val.replace(/[^0-9]/g, '');

        if(val.startsWith('08')){
            val = '628' + val.slice(2);
        }

        e.target.value = val;
    });
}
</script>

</body>