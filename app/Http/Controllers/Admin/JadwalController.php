<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    
    public function index(){

        $schedules = $this->getSchedule();

        // dd($schedules, $detail, $detailProduk);
        return view('admin.admin-data-jadwal', ['schedules' => $schedules]);
    }

    public function update(Request $request, $id){
        $resi = $request->resi;
        
        $affectedRows = Pengiriman::where("id", $id)->update(["status" => $resi]);
        
        // dd($jadwalNew);
        return redirect()->route('admin.jadwal')->with('success', 'Jadwal Telah Diupdate');
    }

    public function getSchedule(){
        $schedules = DB::table('transaksi as t')
        ->join('user', 'user.id', '=', 't.id')
        ->join('pengiriman as p', 'p.id_transaksi', '=', 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select('p.id', 'user.nama', 't.alamat', 'p.status', 'p.tanggal_pengiriman', 't.ekspedisi')
        ->where('p.status', '=', 'On Process')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->groupBy('p.id')
        ->groupBy('user.nama')
        ->groupBy('t.alamat')
        ->groupBy('p.status')
        ->groupBy('p.tanggal_pengiriman')
        ->groupBy('t.ekspedisi')
        ->orderBy('p.tanggal_pengiriman', 'asc')
        ->get();

        $details = DB::table('pengiriman as p')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('transaksi as t', 'p.id_transaksi', '=', 't.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select('t.id as id_transaksi','p.id as id_pengiriman', 'prod.nama_produk', 'dp.qty')
        ->where('p.status', '=', 'On Process')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->groupBy('t.id')
        ->groupBy('p.id')
        ->groupBy('prod.nama_produk')
        ->groupBy('dp.qty')
        ->orderBy('p.tanggal_pengiriman', 'asc')
        ->get();
        
        // dd($schedules, $details);

        foreach ($schedules as $key => $value) {
            $detailProduk = [];
            foreach ($details as $key2 => $value2) {
                if($schedules[$key]->id == $details[$key2]->id_pengiriman){
                    array_push($detailProduk, $details[$key2]);
                }
            }            
            $schedules[$key]->details =  $detailProduk;
        }

        return $schedules;
    }
}
