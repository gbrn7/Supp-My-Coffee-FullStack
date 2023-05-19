<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\produk;
use Illuminate\Support\Facades\DB;

class VisualisasiData extends Component
{

    public $products;

    public function render(){
        $dataSets = $this->handler();
        // dd($dataSets['transactionsPerWeek']);
        $transactionsPerWeek = json_encode($dataSets['transactionsPerWeek']);
        $transactionsPerMonth = json_encode($dataSets['transactionsPerMonth']);
        // dd($transactionsPerMonth, $transactionsPerWeek);
        return view('livewire.visualisasi-data', ['transactionsPerWeek' => $transactionsPerWeek, 'transactionsPerMonth' => $transactionsPerMonth])->extends('admin.admin-visualisasi-data')->section('content');
    }


    public function handler(){

        $data = \DB::select("SELECT sum(dp.qty * prod.harga) as amount, DAYNAME(t.updated_at) as day from transaksi as t inner join pengiriman as p on t.id = p.id_transaksi
        inner join detail_produk as dp on dp.id_pengiriman = p.id inner join produk as prod on prod.id = dp.id_produk
        where t.status_pembayaran = 'success' and YEARWEEK (t.updated_at) >= YEARWEEK (now() - INTERVAL 1 week)
        GROUP by day" );

        // dd($data );
        foreach ($data as $e) {
            $transactionsPerWeek['label'][] = $e->day;
            $transactionsPerWeek['data'][] = (double) $e->amount;
        }

        $data = \DB::select("SELECT sum(dp.qty * prod.harga) as amount, MONTHNAME(t.updated_at) as month from transaksi as t inner join pengiriman as p on t.id = p.id_transaksi
        inner join detail_produk as dp on dp.id_pengiriman = p.id inner join produk as prod on prod.id = dp.id_produk
        where t.status_pembayaran = 'success' and MONTH(t.updated_at) >= MONTH(now() - INTERVAL 12 month)
        GROUP by month" );

        foreach ($data as $e) {
            $transactionsPerMonth['label'][] = $e->month;
            $transactionsPerMonth['data'][] = (double) $e->amount;
        }
        // dd($transactions);

        return ['transactionsPerWeek' => $transactionsPerWeek, 'transactionsPerMonth' => $transactionsPerMonth];
    }
}
