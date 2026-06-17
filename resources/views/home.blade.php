<body style="margin:0; font-family:Arial; background:#f5f5f5;">

<!-- NAVBAR -->
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

    <div style="display:flex; gap:30px;">
        <a href="/" style="text-decoration:none; color:black;">Home</a>
        <a href="/products" style="text-decoration:none; color:black;">Menu</a>
        <a href="/cart" style="text-decoration:none; color:black;">Keranjang</a>
    </div>

</div>

<!-- HERO -->
<div style="
    background:url('/images/brownies1.jpg') center/cover;
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
        <h1 style="font-size:40px; margin-bottom:10px;">
            Brownies Premium
        </h1>

        <p>Lembut, lumer, dan dibuat dengan bahan terbaik</p>

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
<div style="text-align:center; padding:60px 20px;">
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
</div>

<!-- MENU FAVORIT -->
<div style="text-align:center; padding:60px 20px;">
    <h2>Menu Favorit</h2>

    <div style="
        display:flex;
        justify-content:center;
        gap:25px;
        margin-top:30px;
        flex-wrap:wrap;
    ">

        @foreach($products as $p)
        <a href="/products/{{ $p->id }}" style="text-decoration:none; color:black;">
            
            <div style="
                background:white; 
                padding:15px; 
                border-radius:15px; 
                width:220px;
                text-align:center;
                transition:0.3s;
                box-shadow:0 5px 15px rgba(0,0,0,0.1);
            "
            onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.2)'"
            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.1)'"
            >

                <img src="{{ asset('images/'.$p->image) }}" 
                    style="
                        width:100%; 
                        border-radius:10px;
                        height:150px;
                        object-fit:cover;
                    ">

                <h3 style="margin:12px 0 5px 0;">
                    {{ $p->name }}
                </h3>

                <p style="
                    color:#6b3e26; 
                    font-weight:bold;
                    margin:0;
                ">
                    Rp {{ number_format($p->price) }}
                </p>

            </div>

        </a>
        @endforeach

    </div>
</div>

<div style="
    text-align:center;
    padding:30px;
    background:#6b3e26;
    color:white;
    margin-top:80px;
">
    <p>© 2026 Browminzz - Brownies Premium</p>
</div>

</body>