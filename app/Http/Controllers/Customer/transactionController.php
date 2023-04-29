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
        $totalTagihan = $request['totalTagihan'];
        
        
        dd($transaksi, $pengiriman, $totalTagihan);

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
                'gross_amount' => $totalTagihan,
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
        // dd($first);

        //material for detail Produk
        $dataRaw = $request->except('_token', 'alamat', 'ekpedisiDetail', 'subs', 'subsDate', 'totalTagihan');
        $dataProduk = [];

        foreach ($dataRaw as $key => $value) {
            array_push($dataProduk, $value);
        }

        //Execution
        for ($i=0; $i < $data['subs']; $i++) {
            if($i == 0){
                $pengiriman = Pengiriman::create([
                    'status' => 'On Process',
                    'tanggal_pengiriman' => now(),
                    'id_transaksi' => $idTransaksi,
                ]);
                $this->createDetailProduk($dataProduk);
                $first->addMonth(1);
            }else{
                $second = Carbon::create($first->year, $first->month, $data['subsDate']);
                // dd($second);
                $pengiriman = Pengiriman::create([
                    'status' => 'On Process',
                    'tanggal_pengiriman' => $second,
                    'id_transaksi' => $idTransaksi,
                ]);
                $this->createDetailProduk($dataProduk);
                $first->addMonth(1);
            }
        };
        // dd($pengiriman);
        return $pengiriman;
    }

    public function createDetailProduk($dataProduk){
        $idPengiriman =  DB::table('pengiriman')->max('id');
        $detailPengiriman;

        for ($i=0; $i < count($dataProduk); $i++) { 
            if($i%2 != 0){
                $detailPengiriman = Detail_produk::create([
                    'id_pengiriman' => $idPengiriman,
                    'id_produk' => $dataProduk[$i-1],
                    'qty' => $dataProduk[$i],
                ]);
            }
        }
        // dd($detailPengiriman);
        return $detailPengiriman;
    }
}
