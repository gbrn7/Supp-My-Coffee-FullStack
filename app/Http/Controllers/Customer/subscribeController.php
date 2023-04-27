<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class subscribeController extends Controller
{
    public function index(Request $request){

        dd($request->all());
        $daftarProvinsi = RajaOngkir::provinsi()->all();

        // foreach ($daftarProvinsi as $key => $value) {
        //     dd($daftarProvinsi[$key]);
        // }
        // dd($daftarProvinsi);
        return view('customer.customer-subscribe', ['daftarProvinsi' => $daftarProvinsi]);
    }
}
