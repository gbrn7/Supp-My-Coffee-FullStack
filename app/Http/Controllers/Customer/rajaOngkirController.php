<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class rajaOngkirController extends Controller
{
    public function getKabKot($id){

        // dd($id);
        $daftarKabKot = RajaOngkir::kota()->dariProvinsi($id)->get();

        // dd($daftarKabKot);
        return json_encode($daftarKabKot);
    }

    public function getPaket($idKotaAsal, $idKotaTujuan, $berat, $ekspedisi){

        // dd($idKotaAsal, $idKotaTujuan, $berat, $ekspedisi);
        $paket = RajaOngkir::ongkosKirim([
            'origin'        => $idKotaAsal,     // ID kota/kabupaten asal
            'destination'   => $idKotaTujuan,      // ID kota/kabupaten tujuan
            'weight'        => $berat,    // berat barang dalam gram
            'courier'       => $ekspedisi    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        // dd($paket);

        return json_encode($paket);
    }
    public function getPaket2($idKotaAsal, $idKotaTujuan, $berat, $ekspedisi){
        // dd($idKotaAsal, $idKotaTujuan, $berat, $ekspedisi["ekspedisi"]);
        $paket = RajaOngkir::ongkosKirim([
            'origin'        => $idKotaAsal,     // ID kota/kabupaten asal
            'destination'   => $idKotaTujuan['kabupaten/kota'],      // ID kota/kabupaten tujuan
            'weight'        => $berat,    // berat barang dalam gram
            'courier'       => $ekspedisi["ekspedisi"]    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        // dd($paket);

        return $paket;
    }
}
