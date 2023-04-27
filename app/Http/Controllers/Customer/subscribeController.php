<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Collection;
use App\Models\Produk;


class subscribeController extends Controller
{
    public function index(Request $request){
        $dataRaw= $request->except('_token');
        $products = $this->processData($dataRaw);
        $totalBerat = $this->getTotalBerat($products);
        // dd($products, $totalBerat);
        // dd($dataRaw);
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        // dd($products[0]['id']);
        return view('customer.customer-subscribe', [
        'daftarProvinsi' => $daftarProvinsi, 
        'products' => $dataRaw , 
        'totalBerat' => $totalBerat]);
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
                $array2['qty'] = $array[$key];
                $array2['berat'] = Produk::where('id', $array2['id'])->pluck('berat')->first();
                $array2['harga'] = Produk::where('id', $array2['id'])->pluck('harga')->first();
                array_push($products, $array2);
                $array2 = [];               
                // $products['produk-'.count($products) ] = $array2;
                
            }else{
                $array2['id'] = $array[$key];
            }
        }
        
        return $products;
    }

    public function getTotalBerat($products){
        $totalBerat = 0;
        foreach ($products as $key => $value) {
            $berat = $products[$key]['qty'] * $products[$key]['berat'];
            $totalBerat += $berat;
        }
        // dd($totalBerat);

        return $totalBerat;
    }



}
