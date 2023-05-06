<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailProdukController extends Controller
{
    public function index($id){
        
        $product = $this->getProducts($id);
        $newProducts = $this->getNewProducts();

        // dd($product, $newProducts);
        return view('customer.customer-detail-produk', ['product' => $product, 'newProducts' => $newProducts]);
    }

    public function getProducts($id){
        $product = DB::table('produk')
            ->select('*')
            ->where('id', '=', $id)
            ->where('status', '=', 'publish')
            ->whereNull('deleted_at')
            ->First();
        
        $sales = DB::table('produk as prod')
        ->join('detail_produk as dp', 'dp.id_produk', '=' , 'prod.id')
        ->join('pengiriman as p', 'dp.id_pengiriman', '=' , 'p.id')
        ->join('transaksi as t', 't.id', '=', 'p.id_transaksi')
        ->select('prod.id as id_produk', DB::raw('sum(dp.qty) as sales'))
        ->where('t.status_pembayaran', '=', 'success')
        ->where('prod.id', '=', $id)
        ->whereNull('prod.deleted_at')
        ->groupBy('prod.id')
        ->first();
        // dd($sales);

        if($sales == null){
            $product-> sales =  0;
        }else{
            $product-> sales =  $sales-> sales;
        }
        return $product;
    }

    public function getNewProducts(){
        $newProducts = DB::table('produk as prod')
        ->select('*')
        ->where('status', '=', 'publish')
        ->whereNull('deleted_at')
        ->limit(6)
        ->orderBy('prod.id', 'desc')
        ->get();

        $sales = DB::table('produk as prod')
        ->join('detail_produk as dp', 'dp.id_produk', '=' , 'prod.id')
        ->join('pengiriman as p', 'dp.id_pengiriman', '=' , 'p.id')
        ->join('transaksi as t', 't.id', '=', 'p.id_transaksi')
        ->select('prod.id as id_produk', DB::raw('sum(dp.qty) as sales'))
        ->where('t.status_pembayaran', '=', 'success')
        ->whereNull('prod.deleted_at')
        ->groupBy('prod.id')
        ->get();

        foreach ($newProducts as $key => $product) {
            $newProducts[$key]->sales =  0;
            foreach ($sales as $key2 => $sale) {
                if($newProducts[$key]->id == $sales[$key2]->id_produk){
                    $newProducts[$key]->sales =  $sales[$key2]->sales;
                }
            }            
        }
        
        return $newProducts;
    }

  
}