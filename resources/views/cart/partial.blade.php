@forelse($cart as $item)
<div style="margin-bottom:10px;">
    <b>{{ $item['name'] }}</b><br>
    {{ $item['qty'] }} x Rp {{ number_format($item['price']) }}
</div>
@empty
<p>Keranjang kosong 😢</p>
@endforelse