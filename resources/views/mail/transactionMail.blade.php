@component('mail::message')


@component('mail::table')
| Nama Tagihan | Harga | Qty | SubTotal |
| :--------- | :------------- | :------------- | :------------- |
@foreach ($mailData['products'] as $product)
| {{$product->nama_produk}} | Rp.{{$product->harga}} | {{$product->qty}} | {{$product->subTotal}} |
@endforeach
| Biaya Pengiriman | Rp.{{$mailData['biayaPengirimanSekali']}} | {{$mailData['subs']}} | Rp.{{$mailData['biayaPengiriman']}} |
| Biaya Transaksi |  |  | Rp.{{$mailData['biayaTransaksi']}} |
| | | | |
| Total Tagihan |  |  | Rp.{{$mailData['totalTagihan']}} |
@endcomponent

@component('mail::button', ['url' => $midtransRedirectUrl])
  Bayar Sekarang
@endcomponent
  
@endcomponent