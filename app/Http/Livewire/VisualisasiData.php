<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\produk;
use Illuminate\Support\Facades\DB;

class VisualisasiData extends Component
{

    public $products;
    protected $listeners = ['ubahData' => 'changeData'];

    public function mount(){
        $products = produk::latest()->limit(10)->get();
        foreach ($products as $product) {
            $data['label'][] = $product->nama_produk;
            $data['data'][] = (int) $product->harga;
        }
        // dd($data);
        $this->products = json_encode($data);
        // dd($this->products);
    }

    public function render(){
        return view('livewire.visualisasi-data')->extends('admin.admin-visualisasi-data')->section('content');
    }


    public function handler(){
        $products = produk::latest()->limit(10)->get();
        $labels = $products->pluck('nama_produk');
        $data = $products->pluck('harga');

        // $tscLastWeek = \DB::select("SELECT prod.nama_produk from transaksi as t inner join pengiriman as p on t.id = p.id_transaksi
        //                     inner join detail_produk as dp on dp.id_pengiriman = p.id inner join produk as prod on prod.id = dp.id_produk
        //                     where t.status_pembayaran = 'success' and YEARWEEK (t.created_at) = YEARWEEK (NOW () - INTERVAL 1 WEEK)" );
        // dd($tscLastWeek);

        return response()->json(compact('labels', 'data'));
    }
}
