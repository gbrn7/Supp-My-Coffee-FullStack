<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class checkoutController extends Controller
{
    public function index(Request $request){
        // dd($request->except('_token'));
        $products = $this->processData($request->except('_token', 'provinsi', 'kabupaten/kota', 'alamat', 'ekspedisi', 'paket', 'flexRadioDefault', 'subs', 'subsDate'));
        $alamat = $this->getAlamat($request->only('provinsi', 'kabupaten/kota', 'alamat',));
        $totalHarga = $this->getTotalHarga($products);
        $banyakBarang = $this->getBanyakBarang($products);
        $subs = $this->getSubs($request->only('subs'));
        $subsDate = $this->getSubs($request->only('subsDate'));
        $biayaPengiriman = $this->getBiayaPengiriman($subs, $request->only('paket'));
        $biayaTransaksi = 5000;
        $totalTagihan = $this->getTotalTagihan($totalHarga, $biayaPengiriman, $biayaTransaksi);
        $ekpedisiDetail = $this->getEkspedisiDetail($request->only( 'ekspedisi'), $biayaPengiriman);

        // dd($totalHarga, $banyakBarang, $biayaTransaksi, $products, $alamat, $subs, $subsDate, $biayaPengiriman, $totalTagihan, $ekpedisiDetail);

        return view('customer.customer-checkout', ['products' => $products, 'totalHarga' => $totalHarga, 
        'banyakBarang' => $banyakBarang, 'subs' => $subs, 'biayaPengiriman' => $biayaPengiriman, 'biayaTransaksi' => $biayaTransaksi,
        'totalTagihan' => $totalTagihan, 'alamat' => $alamat, 'ekpedisiDetail' => $ekpedisiDetail, 'subsDate' => $subsDate]);
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

    public function getTotalHarga($dataRaw){
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
        // if($subs == 0){
        //     return 1;
        // }else{
        //     return $subs;
        // }
        return $subs;
    }

    public function getBiayaPengiriman($subs, $paket){
        // dd($subs, $paket['paket']);
        return $subs * $paket['paket'];
    }

    public function getTotalTagihan($totalHarga, $biayaPengiriman, $biayaTransaksi){
        return $totalHarga+$biayaPengiriman+$biayaTransaksi;
    }

    public function getBanyakBarang($products){
        $banyakBarang = 0;
        foreach ($products as $key => $value) {
            $banyakBarang += $products[$key]['qty'];
            // dd($products[$key]['qty']);
        }
        // dd($banyakBarang);
        return $banyakBarang;
    }

    public function getEkspedisiDetail($dataRaw, $biayaPengiriman){
        // dd($dataRaw['ekspedisi'].' Rp.'.$biayaPengiriman);

        return $dataRaw['ekspedisi'].' Rp.'.$biayaPengiriman;
    }
}
