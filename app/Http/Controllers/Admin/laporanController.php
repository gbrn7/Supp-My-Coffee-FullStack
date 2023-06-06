<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class laporanController extends Controller
{
    public function index(){
        $tglAwal = Carbon::create(date('Y'), date('m'), 1)->format('Y-m-d');
        $tglAkhir = Carbon::now()->format('Y-m-d');

        DB::enableQueryLog();

        $transactions = DB::table('transaksi as t')
        ->join('pengiriman as p', 'p.id_transaksi', '=' , 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=' , 'p.id')
        ->selectRaw("DATE_FORMAT(t.updated_at, '%Y-%m-%d') AS tanggal, sum(t.total) as total , sum(dp.qty) as banyakProduk, count(t.id) as banyakTransaksi")
        ->whereBetween("t.updated_at", [$tglAwal, $tglAkhir])    
        ->where('t.status_pembayaran', '=', 'success')
        ->groupBy("tanggal")
        ->orderBy('t.updated_at', 'asc')
        ->get();

        // dd(DB::getQueryLog());

        $transaction = DB::table('transaksi as t')
        ->select(DB::raw('sum(t.total) as revenue'))
        ->where('t.updated_at', '<=' , $tglAkhir)    
        ->where('t.updated_at', '>=' , $tglAwal)
        ->where('t.status_pembayaran', '=', 'success')
        ->first();


        dd($transactions, $transaction, $tglAwal, $tglAkhir);

        return view('admin.admin-data-Laporan');
    }
}
