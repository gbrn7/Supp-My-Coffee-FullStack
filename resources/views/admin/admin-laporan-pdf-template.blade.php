<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

    <div>
        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th class="head">Banyak Transaksi:</th>
                            <td class="text-right">{{$totalTransaksi}} Transaksi</td>
                        </tr>
                        <tr>
                            <th class="head">Banyak Pengiriman: </th>
                            <td class="text-right">{{$totalPengiriman}} Pengiriman</td>
                        </tr>
                        <tr>
                            <th class="head">Banyak Produk Terjual: </th>
                            <td class="text-right">{{$totalProdukTerjual}} Produk Terjual</td>
                        </tr>
                        <tr>
                            <th class="head">Total Pendapatan: </th>
                            <td class="text-right">Rp {{number_format($revenue,0, ".", ".")}}</td>
                        </tr>
                        <tr>
                            <th class="head">Rentang Tanggal: </th>
                            <td class="text-right">{{$tglAwal}} sd {{$tglAkhir}}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

            </div>
        </div>

        <table class="table" style="width: 100%">
            <thead style="background: #F5F5F5; " >
                <tr>
                    <th>Tanggal</th>
                    <th>Qty Transaksi</th>
                    <th>Qty Pengiriman</th>
                    <th>Qty Produk Terjual</th>
                    <th>Sub Total </th>
                  </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                  <td>{{$transaction->tanggal}}</td>
                  <td class="text-capitalize">{{$transaction->banyakTransaksi}} Transaksi</td>
                  <td class="text-capitalize">{{$transaction->banyakPengiriman}} Pengiriman</td>
                  <td class="text-capitalize">{{$transaction->banyakProduk}} Produk</td>
                  <td>Rp {{number_format($transaction->subTotal,0, ".", ".")}}</td>
                </tr>                    
              @endforeach
            </tbody>
            <tfoot >
                <tr>
                  <th>Total</th>
                  <th>{{$totalTransaksi}} Transaksi</th>
                  <th>{{$totalPengiriman}} Pengiriman</th>
                  <th>{{$totalProdukTerjual}} Produk Terjual</th>
                  <th>Rp {{number_format($revenue,0, ".", ".")}}</th>
                </tr>
              </tfoot>
        </table>

            <div class="row">

            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <th class="head">Admin:</th>
                                <td class="text-right">{{auth()->user()->nama}}</td>
                            </tr>
                            <tr>
                                <th class="head">Tanggal Cetak: </th>
                                <td class="text-right">{{now()}}</td>
                            </tr>
                        </tbody>
                    </table>
    
                    <div style="margin-bottom: 0px">&nbsp;</div>
    
                </div>
            </div>
        </div>

    </body>
    </html>