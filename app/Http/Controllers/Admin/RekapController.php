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
        ->selectRaw("p.id, user.nama, t.alamat, p.status, DATE_FORMAT(p.tanggal_pengiriman, '%Y-%m-%d') AS tanggal_pengiriman, t.ekspedisi, DATE_FORMAT(p.updated_at, '%Y-%m-%d') AS updated_at")
        ->where('p.status', '!=', 'On Process')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->whereRaw("DATE_FORMAT(p.updated_at, '%Y-%m-%d') = '$tglAkhir'")  
        ->groupBy('p.id')
        ->groupBy('user.nama')
        ->groupBy('t.alamat')
        ->groupBy('p.status')
        ->groupBy('p.tanggal_pengiriman')
        ->groupBy('t.ekspedisi')
        ->groupBy('p.updated_at')
        ->orderBy('p.updated_at', 'asc')
        ->get();

        // dd($schedules, $tglAkhir);

        $details = DB::table('pengiriman as p')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('transaksi as t', 'p.id_transaksi', '=', 't.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->selectRaw('t.id as id_transaksi,p.id as id_pengiriman, prod.nama_produk, dp.qty,t.updated_at')
        ->where('p.status', '!=', 'On Process')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->whereRaw("DATE_FORMAT(p.updated_at, '%Y-%m-%d') = '$tglAkhir'")  
        ->groupBy('t.id')
        ->groupBy('p.id')
        ->groupBy('prod.nama_produk')
        ->groupBy('dp.qty')
        ->groupBy('t.updated_at')
        ->orderBy('p.updated_at', 'asc')
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

        // dd($data);
        return $data;
    }

    public function getData(Request $request){

        $tgl = $request->validate([
            'tglAkhir' => 'required'
        ]);
        
        $dataSchedules = $this->getSchedule($request->tglAkhir);
        
        return view('admin.admin-rekap', ['schedules' => $dataSchedules['schedules'], 'tglAkhir' => $request->tglAkhir]);
    }

    public function updateResi(Request $request, $id){
        $resi = $request->resi;
        
        $affectedRows = Pengiriman::where("id", $id)->update(["status" => $resi]);
        
        // dd($jadwalNew);
        return redirect()->route('admin.rekap')->with('success', 'Jadwal Telah Diupdate');
    }

}
