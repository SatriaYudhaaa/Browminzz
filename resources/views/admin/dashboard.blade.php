@extends('layouts.app')

@section('content')

<div style="max-width:1100px; margin:auto; padding:40px;">

    <!-- TITLE -->
    <div style="margin-bottom:30px;">
        <h1 style="font-size:32px; font-weight:bold;">
            👋 Admin Dashboard
        </h1>
        <p style="color:gray;">
            Kelola semua data Browminzz di sini
        </p>
    </div>

    <!-- CARDS -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px,1fr)); gap:20px;">

        <!-- PRODUK -->
        <a href="/admin/products" style="
            background:linear-gradient(135deg,#8B4513,#A0522D);
            color:white;
            padding:25px;
            border-radius:15px;
            text-decoration:none;
            transition:0.3s;
        " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">

            <h2 style="font-size:20px;">🍫 Kelola Produk</h2>
            <p style="opacity:0.8;">Tambah, edit, hapus menu brownies</p>

        </a>

        <!-- TESTIMONI -->
        <a href="/admin/testimoni" style="
            background:linear-gradient(135deg,#D2691E,#CD853F);
            color:white;
            padding:25px;
            border-radius:15px;
            text-decoration:none;
            transition:0.3s;
        " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">

            <h2 style="font-size:20px;">💬 Kelola Testimoni</h2>
            <p style="opacity:0.8;">Lihat & atur feedback pelanggan</p>

        </a>

    </div>

</div>

@endsection