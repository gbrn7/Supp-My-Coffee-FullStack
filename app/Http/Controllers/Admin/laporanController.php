<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class laporanController extends Controller
{
    public function index(){
        $tglAwal = Carbon::create(date('Y'), date('m'), 1)->format('Y-m-d');
        $tglAkhir = Carbon::now()->format('Y-m-d');

        $dataTransactions = $this->getDataTransactions($tglAwal, $tglAkhir);
        
        // dd($dataTransactions);

        return view('admin.admin-data-Laporan', ['transactions' => $dataTransactions['transactions'], 'revenue' => $dataTransactions['revenue']
                    , 'tglAwal' => $tglAwal, 'tglAkhir' => $tglAkhir, 'totalPengiriman' => $dataTransactions['totalPengiriman'], 
                    'totalProdukTerjual' => $dataTransactions['totalProdukTerjual'], 'totalTransaksi' => $dataTransactions['totalTransaksi']]);
    }

    public function getDataTransactions($tglAwal, $tglAkhir){
        
        $transactions = DB::table('transaksi as t')
        ->join('pengiriman as p', 'p.id_transaksi', '=' , 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=' , 'p.id')
        ->selectRaw("DATE_FORMAT(t.updated_at, '%Y-%m-%d') AS tanggal, sum(dp.qty) as banyakProduk, count(p.id) as banyakPengiriman")
        ->whereBetween("t.updated_at", [$tglAwal, $tglAkhir])    
        ->where('t.status_pembayaran', '=', 'success')
        ->groupBy("tanggal")
        ->orderBy('t.updated_at', 'asc')
        ->get();

        $transactionsQty = DB::table('transaksi as t')
        ->selectRaw("DATE_FORMAT(t.updated_at, '%Y-%m-%d') AS tanggal, sum(t.total) as subTotal, count(t.id) as banyakTransaksi")
        ->whereBetween("t.updated_at", [$tglAwal, $tglAkhir])    
        ->where('t.status_pembayaran', '=', 'success')
        ->groupBy("tanggal")
        ->orderBy('t.updated_at', 'asc')
        ->get();

        $data = [
            'transactions' => $transactions,
            'totalPengiriman'=> 0,
            'totalProdukTerjual'=> 0,
            'totalTransaksi'=> 0,
            'revenue' => 0
          ];


        foreach ($transactions as $key => $transaction) {
            $data['totalPengiriman'] +=  $transactions[$key]->banyakPengiriman;
            $data['totalProdukTerjual'] += $transactions[$key]->banyakProduk;

            foreach ($transactionsQty as $key2 => $transactionQty) {
                if($transactions[$key]->tanggal == $transactionsQty[$key2]->tanggal){
                    $data['transactions'][$key]->subTotal =  $transactionsQty[$key2]->subTotal;
                    $data['transactions'][$key]->banyakTransaksi =  $transactionsQty[$key2]->banyakTransaksi;

                    $data['totalTransaksi'] +=  $transactionsQty[$key2]->banyakTransaksi;
                    $data['revenue'] +=  $transactionsQty[$key2]->subTotal;

                    $transactionsQty->pull($key2);  //remove from collection
                }
            }            
        }

        // dd($data);

        return $data;
    }

    public function getData(Request $request){

            $tgl = $request->validate([
                'tglAwal' => 'required',
                'tglAkhir' => 'required'
            ]);
            
            $dataTransactions = $this->getDataTransactions($request->tglAwal, $request->tglAkhir);

            return view('admin.admin-data-Laporan', ['transactions' => $dataTransactions['transactions'], 'revenue' => $dataTransactions['revenue']
            , 'tglAwal' => $request->tglAwal, 'tglAkhir' => $request->tglAkhir, 'totalPengiriman' => $dataTransactions['totalPengiriman'], 
            'totalProdukTerjual' => $dataTransactions['totalProdukTerjual'], 'totalTransaksi' => $dataTransactions['totalTransaksi']]);
    }

    public function printPdf(Request $request){
        // dd('test');

        $tgl = $request->validate([
            'tglAwal' => 'required',
            'tglAkhir' => 'required'
        ]);

        $dataTransactions = $this->getDataTransactions($request->tglAwal, $request->tglAkhir);

        $pdf = Pdf::loadView('admin.admin-laporan-pdf-template', ['transactions' => $dataTransactions['transactions'], 'revenue' => $dataTransactions['revenue']
        , 'tglAwal' => $request->tglAwal, 'tglAkhir' => $request->tglAkhir, 'totalPengiriman' => $dataTransactions['totalPengiriman'], 
        'totalProdukTerjual' => $dataTransactions['totalProdukTerjual'], 'totalTransaksi' => $dataTransactions['totalTransaksi']])
        ->setOptions(['defaultFont' => 'sans-serif']);

        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        // dd('test');
        return $pdf->stream('laporan.pdf');
    }

}
