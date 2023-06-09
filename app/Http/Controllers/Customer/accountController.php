<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;



class accountController extends Controller
{
    public function index(){

        // dd('test');
        $user = auth()->user();
        $historys =  $this->getTransaksi($user->id);
        return view('customer.customer-account',['user'=> $user, 'historys'=> $historys ]);
    }

    public function getTransaksi($userId){
        $history = DB::table('transaksi as t')
        ->join('user', 'user.id', '=', 't.user_id')
        ->join('pengiriman as p', 'p.id_transaksi', '=', 't.id')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select('p.status', 'p.id as id_pengiriman', 'p.tanggal_pengiriman')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->where('user.id', '=', $userId)
        ->groupBy('p.status')
        ->groupBy('p.id')
        ->groupBy('p.tanggal_pengiriman')
        ->orderBy('status', 'desc')
        ->orderBy('p.tanggal_pengiriman', 'asc')
        ->get();

        // dd($history);

        $details = DB::table('pengiriman as p')
        ->join('detail_produk as dp', 'dp.id_pengiriman', '=', 'p.id')
        ->join('transaksi as t', 'p.id_transaksi', '=', 't.id')
        ->join('produk as prod', 'prod.id', '=', 'dp.id_produk')
        ->select('p.id as id_pengiriman', 'prod.nama_produk', 'dp.qty', 'prod.harga', 'prod.produk_thumbnail')
        ->where('t.status_pembayaran', '=', 'SUCCESS')
        ->where('t.user_id', '=', $userId)
        ->groupBy('p.id')
        ->groupBy('prod.nama_produk')
        ->groupBy('dp.qty')
        ->groupBy('prod.harga')
        ->groupBy('prod.produk_thumbnail')
        ->get();
        
        // dd($history, $details);

        foreach ($history as $key => $value) {
            foreach ($details as $key2 => $value2) {
                if($history[$key]->id_pengiriman == $details[$key2]->id_pengiriman){
                    $history[$key]->products[] = $details[$key2];
                }
            }            
        }
        // dd($history);

        return $history;
    }

    public function updateDataUser(Request $request){
        $data = $request->except("_token");
        
        // dd($data);
        // dd(auth()->user()->id);
        // dd($data['alamat']);

        $user = User::where('id', auth()->user()->id)
        ->update(['nama' => $data['nama'], 'alamat' => $data['alamat'], 'no_telp' => $data['noHp']]);

        // Alert::success('Success', 'Profil Diperbarui!');

        // dd($user);
        return redirect()->route('customer.account')->with('toast_success', 'Profil Diperbarui!');
    }
}
