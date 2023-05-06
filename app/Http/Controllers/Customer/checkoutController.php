<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Http\Controllers\Customer\rajaOngkirController;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Http\Controllers\customer\subscribeController;

class checkoutController extends Controller
{
    public $biayaTransaksi = 5000;

    public function index(Request $request){
        // dd($request->except('_token'));
        $products = $this->processData($request->except('_token', 'provinsi', 'kabupaten/kota', 'alamat', 'ekspedisi', 'paket', 'flexRadioDefault', 'subs', 'subsDate'));
        $alamat = ($request->only('alamat'))['alamat'];
        $totalBerat = $this->getTotalBerat($request->except('_token', 'provinsi', 'kabupaten/kota', 'alamat', 'ekspedisi', 'paket', 'flexRadioDefault', 'subs', 'subsDate'));
        $subs = $this->getSubs($request->only('subs'));
        $rajaOngkirObj = new rajaOngkirController;
        $package = $rajaOngkirObj->getPaket2(255, $request->only('kabupaten/kota'), $totalBerat, $request->only('ekspedisi'));

        $totalHarga = $this->getTotalHarga($products, $subs);
        $totalHargaSekali = $this->getTotalHargaSekali($products);
        $subsDate = $this->getSubs($request->only('subsDate'));
        $biayaKirimSekali = $this->getBiayaPengirimanSekali($package, $request->only('paket'));
        $biayaPengiriman = $this->getBiayaPengiriman($package, $request->only('paket'), $subs);
        $totalTagihan = $this->getTotalTagihan($totalHarga, $biayaPengiriman, $this->biayaTransaksi);

        // dd($totalHarga, $biayaTransaksi, $products, $alamat, $subs, $subsDate, $biayaPengiriman, $totalTagihan);

        return view('customer.customer-checkout', ['products' => $products, 'totalHarga' => $totalHarga, 
        'subs' => $subs, 'biayaPengiriman' => $biayaPengiriman, 'biayaTransaksi' => $this->biayaTransaksi,
        'totalTagihan' => $totalTagihan, 'alamat' => $alamat, 'subsDate' => $subsDate, 'provinsi' => ($request->only('provinsi'))['provinsi'],
        'kabKot' => ($request->only('kabupaten/kota'))['kabupaten/kota'], 'ekspedisi' => ($request->only('ekspedisi'))['ekspedisi'], 
        'paket' => ($request->only('paket'))['paket'], 'biayaKirimSekali' => $biayaKirimSekali, 'totalHargaSekali' => $totalHargaSekali]);
    }

    public function processData($dataRaw){
        $array = [];
        $array2 = [];
        $products = [];

        foreach ($dataRaw as $key => $value) {
            array_push($array, $dataRaw[$key]);
        }
        
        foreach ($array as $key => $value) {
            if($key%2 !== 0){
                $array2 = Produk::find($array2['id']);
                // dd($array2);
                $array2['qty'] = $array[$key];
                $array2['subTotal'] = $array2['qty'] * $array2['harga'];
                array_push($products, $array2);
                $array2 = [];               
                // $products['produk-'.count($products) ] = $array2;
                
            }else{
                $array2['id'] = $array[$key];
            }
        }
        
        return $products;
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

    public function getTotalHarga($dataRaw, $subs){
        $totalHarga = 0;
        foreach ($dataRaw as $key => $value) {
            $totalHarga += $dataRaw[$key]['subTotal'];
            // dd($dataRaw[$key]['subTotal']);
        }
        
        return $totalHarga * $subs;
    }

    public function getTotalHargaSekali($dataRaw){
        $totalHarga = 0;
        foreach ($dataRaw as $key => $value) {
            $totalHarga += $dataRaw[$key]['subTotal'];
            // dd($dataRaw[$key]['subTotal']);
        }
        
        return $totalHarga;
    }

    public function getSubs($dataRaw){
        $subs ;
        foreach ($dataRaw as $key => $value) {
            $subs = $value;
        }
        // dd($subs);
        if($subs == 0){
            return 1;
        }else{
            return $subs;
        }
        return $subs;
    }

    public function getTotalBerat($products){
        $subsObj = new subscribeController;
        $processedData = $subsObj->processData($products);
        $totalBerat = $subsObj->getTotalBerat($processedData);

        return $totalBerat;
    }

    public function getBiayaPengiriman($package, $paket, $subs){
        $paket = $paket['paket'];
        $biaya = $package[0]['costs'][$paket]['cost'][0]['value'];
        // dd($biaya[0]['costs'][$paket]['cost'][0]['value']);
        return $biaya * $subs;
    }

    public function getBiayaPengirimanSekali($package, $paket){
        $paket = $paket['paket'];
        // dd($package, $paket);
        $biaya = $package[0]['costs'][$paket]['cost'][0]['value'];
        // dd($biaya[0]['costs'][$paket]['cost'][0]['value']);
        return $biaya;
    }

    public function getTotalTagihan($totalHarga, $biayaPengiriman, $biayaTransaksi){
        return $totalHarga+$biayaPengiriman+$biayaTransaksi;
    }



}
