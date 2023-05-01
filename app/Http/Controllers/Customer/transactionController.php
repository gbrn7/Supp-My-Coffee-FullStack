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
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Http\Controllers\Customer\rajaOngkirController;
use App\Http\Controllers\Customer\checkoutController;

class transactionController extends Controller
{
    public function index(Request $request){
        // dd($request->except('_token'));
        $customer = auth()->user(); //Get user info

        $checkoutObj = new checkoutController; //instantiotion checkoutController
        $rajaOngkirObj = new rajaOngkirController; //instantiation rajaOngkirController

        $products = $checkoutObj->processData($request->except('_token', 'provinsi', 'kabupaten/kota', 
        'ekspedisi', 'paket', 'alamat', 'subs', 'subsDate')); //get product
        // dd($products);
        $alamatLengkap = $this->getAlamat($request->only('provinsi', 'kabupaten/kota', 'alamat',));
        $subs = ($request->only('subs'))['subs'];
        $subsDate = ($request->only('subsDate'))['subsDate'];


        $totalBerat = $checkoutObj->getTotalBerat($this->getProducts($request));
        $package = $rajaOngkirObj->getPaket2(255, $request->only('kabupaten/kota'), $totalBerat, $request->only('ekspedisi'));
        $ekpedisiDetail = $this->getEkspedisiDetail($package, $request->only('paket'));
        $totalHarga = $checkoutObj->getTotalHarga($products, $subs);
        $biayaPengiriman = $checkoutObj->getBiayaPengiriman($package, $request->only('paket'), $subs);
        $totalTagihan = $checkoutObj->getTotalTagihan($totalHarga, $biayaPengiriman, $checkoutObj->biayaTransaksi);

        // dd($totalTagihan, $ekpedisiDetail, $totalHarga, $biayaPengiriman, $request->except('_token'));
        
        $transaksi = $this->createTransaksi($alamatLengkap, $ekpedisiDetail);
        $pengiriman = $this->createPengiriman($subs, $subsDate, $request);
        $totalTagihan = $totalTagihan;
        
        // dd($transaksi, $pengiriman, $totalTagihan);

        $midtransRedirectUrl = $this->midtransTransaction($transaksi, $totalTagihan, $customer);
        return redirect($midtransRedirectUrl);
    }

    public function createTransaksi($alamatLengkap, $ekpedisiDetail){
        $user = auth()->user();

        $transaksi = Transaksi::create([
            'user_id' => $user->id,
            'alamat' => $alamatLengkap,
            'ekspedisi' => $ekpedisiDetail,
            'transaction_code' => strtoupper(Str::random(10)),
            'status_pembayaran' => 'PENDING'
        ]);

        // dd($transaksi);
        // dd($data, $user->id);

        return $transaksi;
    }

    public function getProducts($request){
        $dataRaw = $request->except('_token', 'provinsi', 'kabupaten/kota', 
        'ekspedisi', 'paket', 'alamat', 'subs', 'subsDate');
        $dataProduk = [];

        foreach ($dataRaw as $key => $value) {
            array_push($dataProduk, $value);
        }

        return $dataProduk;
    }

    public function createPengiriman($subs, $subsDate, $request){
        $data = $request->only('subs', 'subsDate');
        $idTransaksi =  DB::table('transaksi')->max('id');
        $pengiriman;

        $first = Carbon::create(date('Y'), date('m'), $data['subsDate']);
        // dd($first);

        //Get material for detail Produk;
        $dataProduk = $this->getProducts($request);

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
                // dd($first);
            }else{
                $second = Carbon::create($first->year, $first->month, $data['subsDate']);
                // dd($second);
                $pengiriman = Pengiriman::create([
                    'status' => 'On Process',
                    'tanggal_pengiriman' => $second,
                    'id_transaksi' => $idTransaksi,
                ]);
            // dd($pengiriman);
                $this->createDetailProduk($dataProduk);
                $first->addMonth(1);
            }
        };
        
        // dd($pengiriman);
        return $pengiriman;
    }

    public function getAlamat($dataRaw){
        $dataRaw['provinsi'] = RajaOngkir::provinsi()->find($dataRaw['provinsi']);
        $dataRaw['provinsi'] = $dataRaw['provinsi']['province'];
        $dataRaw['kabupaten/kota'] = RajaOngkir::kota()->find($dataRaw['kabupaten/kota']);
        $dataRaw['kabupaten/kota'] = $dataRaw['kabupaten/kota']['type'].' '.$dataRaw['kabupaten/kota']['city_name'];
        
        $alamat = $dataRaw['alamat'].', '.$dataRaw['kabupaten/kota'].', Provinsi '.$dataRaw['provinsi'];
        // dd($alamat);

        return $alamat;
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

    public function paymentFinish(){
        return view('customer.customer-payment-finish');
    }
    
    public function getEkspedisiDetail($package, $paket){
        $paket = $paket['paket'];
        $namaPaket = $package[0]['code']." ".$package[0]['costs'][$paket]['service']." Rp.".$package[0]['costs'][$paket]['cost'][0]['value'];
        // dd($namaPaket);
        return $namaPaket;
    }

    public function midtransTransaction($transaksi, $totalTagihan, $customer){
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
                'order_id' => $transaksi->transaction_code,
                'gross_amount' => $totalTagihan,
            ),
            'customer_details' => array(
                'first_name' => $customer->nama,
                'last_name' => $customer->nama,
                'email' => $customer->email,
            ),
        );

        $createMidtransTransaction = \Midtrans\snap::createTransaction($params);
        // dd($createMidtransTransaction);
        $midtransRedirectUrl = $createMidtransTransaction->redirect_url;
        // dd($midtransRedirectUrl);

        return $midtransRedirectUrl;
    }
}
