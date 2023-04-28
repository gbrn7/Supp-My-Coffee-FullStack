<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pengiriman;
use App\Models\Detail_produk;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class transactionController extends Controller
{
    public function index(Request $request){
        // dd($request->except('_token'));
        $customer = auth()->user();
        $transaksi = $this->createTransaksi($request);
        $pengiriman = $this->createPengiriman($request);
        $detailProduk = $this->createDetailProduk($request);

        dd($transaksi, $pengiriman, $detailProduk);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = (bool) env('MIDTRANS_IS_SANITIZE');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = (bool) env('MIDTRANSA_IS_3DS');

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->transaction_code,
                'gross_amount' => $transaction->amount,
            ),
            'customer_details' => array(
                'first_name' => $customer->nama,
                'last_name' => $customer->nama,
                'email' => $customer->email,
            ),
        );

        $createMidtransTransaction = \Midtrans\snap::createTransaction($params);
        $midtransRedirectUrl = $createMidtransTransaction->redirect_url;

        return redirect($midtransRedirectUrl);
    }

    public function createTransaksi($request){
        $data = $request->only('alamat', 'ekpedisiDetail');
        $userId = auth()->user();

        $transaksi = Transaksi::create([
            'user_id' => $userId->id,
            'alamat' => $data['alamat'],
            'ekspedisi' => $data['ekpedisiDetail'],
            'transaction_code' => strtoupper(Str::random(10)),
            'status_pembayaran' => 'PENDING'
        ]);

        // dd($transaksi);
        // dd($data, $userId->id);

        return $transaksi;
    }
    public function createPengiriman($request){
        $data = $request->only('subs', 'subsDate');
        $idTransaksi =  DB::table('transaksi')->max('id');
        $pengiriman;

        $first = Carbon::create(date('Y'), date('m'), $data['subsDate']);

        for ($i=0; $i < $data['subs']; $i++) {
            if($i == 0){
                $pengiriman = Pengiriman::create([
                    'status' => 'On Process',
                    'tanggal_pengiriman' => now(),
                    'id_transaksi' => $idTransaksi,
                ]);
            }else{
                $pengiriman = Pengiriman::create([
                    'status' => 'On Process',
                    'tanggal_pengiriman' => $first->addMonth(1),
                    'id_transaksi' => $idTransaksi,
                ]);
                $first = $first->addMonth(1);
            }
        };
        // dd($pengiriman);
        return $pengiriman;
    }
    public function createDetailProduk($request){
        $dataRaw = $request->except('_token', 'alamat', 'ekpedisiDetail', 'subs', 'subsDate');
        $idPengiriman =  DB::table('pengiriman')->max('id');
        $data = [];
        $temp = [];
        $detailPengiriman;

        foreach ($dataRaw as $key => $value) {
            array_push($data, $value);
        }

        for ($i=0; $i < count($data); $i++) { 
            if($i%2 != 0){
                array_push($temp, $data[$i]);
                $detailPengiriman = Detail_produk::create([
                    'id_pengiriman' => $idPengiriman,
                    'id_produk' => $temp[0],
                    'qty' => $temp[1],
                ]);
                $temp = [];
            }else{
                array_push($temp, $data[$i]);
            }
        }
        // dd($detailPengiriman);
        return $detailPengiriman;
    }
}
