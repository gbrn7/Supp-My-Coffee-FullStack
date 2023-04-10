<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index(){
        $transactions = Transaksi::all();

        // dd($transactions);
        return view('admin.admin-data-transaksi', ['transactions'=> $transactions]);
    }
}
