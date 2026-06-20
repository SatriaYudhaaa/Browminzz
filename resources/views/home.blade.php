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

        <!-- ✅ TAMBAHAN INI -->
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

<!-- 🔥 TAMBAH DI SINI -->
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

</body>