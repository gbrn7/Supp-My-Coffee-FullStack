<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


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

        $data = \DB::select("SELECT sum(dp.qty * prod.harga) as amount, DAYNAME(t.updated_at) as day
        from transaksi as t inner join pengiriman as p on t.id = p.id_transaksi
        inner join detail_produk as dp on dp.id_pengiriman = p.id inner join produk as prod on prod.id = dp.id_produk
        where t.status_pembayaran = 'success' and  t.updated_at >= (now() - INTERVAL 1 week)
        GROUP by day order by t.updated_at asc" );

        // dd($data);
        // $first = (String) Carbon::now()->subDays(0)->dayName;
        // dd($first);

        for ($i=0, $j=0; $i <=6 ; $i++) { 
            $date = (String) Carbon::now()->subDays(6 - $i)->dayName;
            if($date === $data[$j]->day){
                $transactionsPerWeek['label'][] = $data[$j]->day;
                $transactionsPerWeek['data'][] = (double) $data[$j]->amount;
                if($j+1 < count($data)){
                    $j++;
                }
            }else{
                $transactionsPerWeek['label'][] = $date;
                $transactionsPerWeek['data'][] = 0;
            }
        }

        // dd($data, $transactionsPerWeek);

        $data = \DB::select("SELECT sum(dp.qty * prod.harga) as amount, concat(MONTHNAME(t.updated_at), ' ',  Year(t.updated_at)) as month 
        from transaksi as t inner join pengiriman as p on t.id =  p.id_transaksi inner join detail_produk as dp on dp.id_pengiriman = p.id 
        inner join produk as prod on prod.id = dp.id_produk 
        where t.status_pembayaran = 'success' and t.updated_at >= (now() - INTERVAL 12 month)
        GROUP by month order by t.updated_at asc");

        // dd($data);
        // dd((String) Carbon::now()->subMonth(11 - $i)->format('F Y'));

        for ($i=0, $j=0; $i <=11 ; $i++) { 
            $date = (String) Carbon::now()->subMonth(11 - $i)->format('F Y');
            if($date === $data[$j]->month){
                $transactionsPerMonth['label'][] = $data[$j]->month;
                $transactionsPerMonth['data'][] = (double) $data[$j]->amount;
                if($j+1 < count($data)){
                    $j++;
                }
            }else{
                $transactionsPerMonth['label'][] = $date;
                $transactionsPerMonth['data'][] = 0;
            }
        }

        // dd($transactionsPerMonth, $transactionsPerWeek);

        return ['transactionsPerWeek' => $transactionsPerWeek, 'transactionsPerMonth' => $transactionsPerMonth];
    }
}
