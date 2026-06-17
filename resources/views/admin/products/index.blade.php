<h2>Kelola Produk</h2>

@foreach($products as $p)
<div style="
    border:1px solid #ddd;
    padding:15px;
    margin-bottom:15px;
    border-radius:10px;
    display:flex;
    align-items:center;
    gap:20px;
">

    <!-- FOTO -->
    <img src="{{ asset('images/'.$p->image) }}" width="100">

    <!-- INFO -->
    <div style="flex:1;">
        <b>{{ $p->name }}</b><br>
        Rp {{ number_format($p->price) }}
    </div>

    <!-- CHECKBOX FAVORIT -->
    <form action="/admin/products/{{ $p->id }}/favorite" method="POST">
        @csrf

        <input 
            type="checkbox" 
            name="is_favorite"
            onchange="this.form.submit()"
            {{ $p->is_favorite ? 'checked' : '' }}
        >
        Favorit
    </form>

</div>
@endforeach