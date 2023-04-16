<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index(){

        $revenue = $this->getRevenue();
        $totalOrder = $this->getTotalOrder();
        $newOrder = $this->getNewOrder();
        $products = $this->getProducts();
        $transactions = $this->getTransactions();
        $schedules = $this->getSchedules();
        

        // dd($revenue, $totalOrder, $newOrder, $products, $transactions, $schedules);
        // dd($newOrder);
        return view('admin.admin-dashboard', 
        ['revenue' => $revenue, 
        'totalOrder' => $totalOrder,
        'newOrder' => $newOrder,    
        'products' => $products,
        'transactions' => $transactions,
        'schedules' => $schedules]);

        // return view('admin.admin-dashboard', ['revenue' => $revenue]);
    }

    public function getRevenue(){
        $revenue = DB::table('transaksi as t')
        ->join('pengiriman as p', 'p.id_transaksi', '=', 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select(DB::raw('sum(dp.qty * prod.harga) as revenue'))
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->first();
        
        return $revenue;
    }

    public function getTotalOrder(){
        $totalOrder = DB::table('pengiriman as p')
        ->select(DB::raw('count(p.id) as totalOrder'))
        ->join('transaksi as t', 't.id', '=', 'p.id_transaksi')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->first();
        
        return $totalOrder;
    }

    public function getNewOrder(){
        $newOrder = DB::table('pengiriman as p')
        ->select(DB::raw('count(p.id) as newOrder'))
        ->join('transaksi as t', 't.id', '=', 'p.id_transaksi')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->where('p.status', '=', 'On Process')
        ->first();
        
        return $newOrder;
    }

    public function getProducts(){
        $products = Produk::orderBy('id', 'desc')->take(5)->get();

        return $products;
    }

    public function getTransactions(){
        $transactions = DB::table('transaksi as t')
                        ->join('pengiriman as p', 'p.id_transaksi', '=', 't.id')
                        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
                        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
                        ->select('t.id', 't.user_id', DB::raw('sum(dp.qty * prod.harga) as amount'), 't.alamat', 't.transaction_code', 't.status_pembayaran')
                        ->groupBy('t.id')
                        ->groupBy('t.user_id')
                        ->groupBy('t.alamat')
                        ->groupBy('t.transaction_code')
                        ->groupBy('t.status_pembayaran')
                        ->orderBy('t.id', 'desc')
                        ->limit(5)
                        ->get(); 
        return $transactions;
    }

    public function getSchedules(){
        // DB::enableQueryLog();

        $schedules = DB::table('transaksi as t')
        ->join('user', 'user.id', '=', 't.id')
        ->join('pengiriman as p', 'p.id_transaksi', '=', 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select('p.id', 'user.nama', 't.alamat', 'p.status', 'p.tanggal_pengiriman')
        ->where('p.status', '=', 'On Process')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->groupBy('p.id')
        ->groupBy('user.nama')
        ->groupBy('t.alamat')
        ->groupBy('p.status')
        ->groupBy('p.tanggal_pengiriman')
        ->orderBy('p.tanggal_pengiriman', 'asc')
        ->limit(5)
        ->get();

        // dd(DB::getQueryLog());

        // dd($schedules);

        // $topTransaksi = DB::table('transaksi')->select('id')->where('id', '<', '5')->get();
        // $value= [];
        // foreach ($topTransaksi as $key => $e) {
        //     array_push($value, $topTransaksi[$key]->id);
        // }

        // $details = DB::table('pengiriman as p')
        // ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        // ->join('transaksi as t', 'p.id_transaksi', '=', 't.id')
        // ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        // ->select('t.id as id_transaksi','p.id as id_pengiriman', 'prod.nama_produk', 'dp.qty')
        // ->whereIn('t.id', $value)
        // ->where('p.status', '=', 'On Process')
        // ->where('t.status_pembayaran', '=', 'SUCCESS')
        // ->groupBy('t.id')
        // ->groupBy('p.id')
        // ->groupBy('prod.nama_produk')
        // ->groupBy('dp.qty')
        // ->orderBy('p.id', 'desc')
        // ->get();

        // foreach ($schedules as $key => $value) {
        //     $detailProduk = [];
        //     foreach ($details as $key2 => $value2) {
        //         if($schedules[$key]->id == $details[$key2]->id_pengiriman){
        //             array_push($detailProduk, $details[$key2]);
        //         }
        //     }            
        //     $schedules[$key]->details =  $detailProduk;
        // }
        return $schedules;
    }
}
