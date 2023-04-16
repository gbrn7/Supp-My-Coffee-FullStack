<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index(){
        // $transactions = Transaksi::all();
        $transactions = $this->getTransactions();
        // dd($transactions);
        return view('admin.admin-data-transaksi', ['transactions'=> $transactions]);
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
        ->orderBy('t.created_at', 'desc')
        ->get();

        // dd($transactions);
        
        return $transactions;
    }
}
