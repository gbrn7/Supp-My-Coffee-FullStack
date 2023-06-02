@component('mail::message')


@component('mail::table')
| Nama Tagihan | Harga | Qty | SubTotal |
| :--------- | :------------- | :------------- | :------------- |
@foreach ($mailData['products'] as $product)
| {{$product->nama_produk}} | Rp {{number_format($product->harga,0, ".", ".")}} | {{$product->qty}} | Rp {{number_format($product->subTotal,0, ".", ".")}} |
@endforeach
| Biaya Pengiriman | Rp {{number_format($mailData['biayaPengirimanSekali'], 0, ".", ".")}} | {{number_format($mailData['subs'], 0 , ".", ".")}} | Rp {{number_format($mailData['biayaPengiriman'], 0, ".", ".")}} |
| Biaya Transaksi |  |  | Rp {{number_format($mailData['biayaTransaksi'], 0, ".", ".")}} |
| | | | |
| Total Tagihan |  |  | Rp {{number_format($mailData['totalTagihan'], 0, ".", ".")}} |
@endcomponent

@component('mail::button', ['url' => $midtransRedirectUrl])
  Bayar Sekarang
@endcomponent
  
@endcomponent