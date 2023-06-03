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
        ->join('user', 'user.id', '=', 't.user_id')
        ->select('t.id', 'user.nama', 't.total', 't.alamat', 't.transaction_code', 't.status_pembayaran')
        ->orderBy('t.created_at', 'desc')
        ->get();

        // dd($transactions);
        
        return $transactions;
    }
}
