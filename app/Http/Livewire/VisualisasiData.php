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
        $revenue = $dataSets['revenue'];
        $totalPenjualan = $dataSets['totalPenjualan'];
        $totalCustomer = $dataSets['totalCustomer'];
        // dd($dataSets);
        // dd($transactionsPerMonth, $transactionsPerWeek);
        // dd($revenue, $totalPenjualan, $totalCustomer);
        return view('livewire.visualisasi-data', ['transactionsPerWeek' => $transactionsPerWeek, 'transactionsPerMonth' => $transactionsPerMonth, 'revenue' => $revenue, 
        'totalPenjualan' => $totalPenjualan, 'totalCustomer' => $totalCustomer])->extends('admin.admin-visualisasi-data')->section('content');
    }


    public function handler(){

        $data = \DB::select("SELECT sum(t.total) as total, DAYNAME(t.updated_at) as day
        from transaksi as t where t.status_pembayaran = 'success' 
        and  t.updated_at >= (now() - INTERVAL 6 day)
        GROUP by day order by t.updated_at asc" );

        // dd($data);
        // $first = (String) Carbon::now()->subDays(0)->dayName;
        // dd($first);

        for ($i=0, $j=0; $i <=6 ; $i++) { 
            $date = (String) Carbon::now()->subDays(6 - $i)->dayName;
            if($date === $data[$j]->day){
                $transactionsPerWeek['label'][] = $data[$j]->day;
                $transactionsPerWeek['data'][] = (double) $data[$j]->total;
                if($j+1 < count($data)){
                    $j++;
                }
            }else{
                $transactionsPerWeek['label'][] = $date;
                $transactionsPerWeek['data'][] = 0;
            }
        }

        // dd($data, $transactionsPerWeek);

        $data = \DB::select("SELECT sum(t.total) as total, concat(MONTHNAME(t.updated_at), ' ',  Year(t.updated_at)) as month 
        from transaksi as t where t.status_pembayaran = 'success' 
        and t.updated_at >= (now() - INTERVAL 12 month)
        GROUP by month order by t.updated_at asc");

        // dd($data);
        // dd((String) Carbon::now()->subMonth(11 - $i)->format('F Y'));

        for ($i=0, $j=0; $i <=11 ; $i++) { 
            $date = (String) Carbon::now()->subMonth(11 - $i)->format('F Y');
            if($date === $data[$j]->month){
                $transactionsPerMonth['label'][] = $data[$j]->month;
                $transactionsPerMonth['data'][] = (double) $data[$j]->total;
                if($j+1 < count($data)){
                    $j++;
                }
            }else{
                $transactionsPerMonth['label'][] = $date;
                $transactionsPerMonth['data'][] = 0;
            }
        }

        // dd($transactionsPerMonth, $transactionsPerWeek);


        $revenue = DB::table('transaksi as t')
        ->select(DB::raw('sum(t.total) as revenue'))
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->first();

        $totalPenjualan = DB::table('transaksi as t')
        ->join('pengiriman as p', 'p.id_transaksi', '=', 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->select(DB::raw('sum(dp.qty) as totalPenjualan'))
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->first();

        $totalCustomer = DB::table('user')
        ->select(DB::raw('count(user.id) as totalCustomer'))
        ->where('user.role', '=', 'member')
        ->first();

        // dd($revenue, $totalPenjualan, $totalCustomer);

        return ['transactionsPerWeek' => $transactionsPerWeek, 'transactionsPerMonth' => $transactionsPerMonth, 'revenue' => number_format($revenue->revenue,0, ".", "."), 
        'totalPenjualan' => (double) $totalPenjualan->totalPenjualan, 'totalCustomer' => (double) $totalCustomer->totalCustomer];
    }
}
