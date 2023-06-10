<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RekapController extends Controller
{
    
    public function index(){
        $tglAkhir = Carbon::now()->format('Y-m-d');

        $dataSchedules = $this->getSchedule($tglAkhir);

        // dd($dataSchedules);
        return view('admin.admin-rekap', ['schedules' => $dataSchedules['schedules'], 'tglAkhir' => $tglAkhir]);
    }

    public function getSchedule($tglAkhir){
        $schedules = DB::table('transaksi as t')
        ->join('user', 'user.id', '=', 't.user_id')
        ->join('pengiriman as p', 'p.id_transaksi', '=', 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select('p.id', 'user.nama', 't.alamat', 'p.status', 'p.tanggal_pengiriman', 't.ekspedisi', 't.updated_at')
        ->where('p.status', '!=', 'On Process')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->where("p.tanggal_pengiriman", '=', [$tglAkhir])  
        ->groupBy('p.id')
        ->groupBy('user.nama')
        ->groupBy('t.alamat')
        ->groupBy('p.status')
        ->groupBy('p.tanggal_pengiriman')
        ->groupBy('t.ekspedisi')
        ->groupBy('t.updated_at')
        ->orderBy('p.tanggal_pengiriman', 'asc')
        ->get();

        $details = DB::table('pengiriman as p')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('transaksi as t', 'p.id_transaksi', '=', 't.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select('t.id as id_transaksi','p.id as id_pengiriman', 'prod.nama_produk', 'dp.qty','t.updated_at')
        ->where('p.status', '!=', 'On Process')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->where("p.tanggal_pengiriman",'=', [$tglAkhir])  
        ->groupBy('t.id')
        ->groupBy('p.id')
        ->groupBy('prod.nama_produk')
        ->groupBy('dp.qty')
        ->groupBy('t.updated_at')
        ->orderBy('p.tanggal_pengiriman', 'asc')
        ->get();
        
        // dd($schedules, $details);
        $data = [
            'schedules' => $schedules
        ];

        foreach ($schedules as $key => $value) {
            $detailProduk = [];
            foreach ($details as $key2 => $value2) {
                if($schedules[$key]->id == $details[$key2]->id_pengiriman){
                    array_push($detailProduk, $details[$key2]);
                }
            }            
            $schedules[$key]->details =  $detailProduk;
        }

        return $data;
    }

    public function getData(Request $request){

        $tgl = $request->validate([
            'tglAkhir' => 'required'
        ]);
        
        $dataSchedules = $this->getSchedule($request->tglAkhir);
        
        return view('admin.admin-rekap', ['schedules' => $dataSchedules['schedules'], 'tglAkhir' => $request->tglAkhir]);
    }

}
