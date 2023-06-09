<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class catalogController extends Controller
{
    public function index(){
        
        $products = $this->getProducts();
        $newProducts = $this->getNewProducts();

        // dd($products, $newProducts);
        return view('customer.customer-catalog', ['products' => $products, 'newProducts' => $newProducts]);
    }

    public function getProducts(){
        $products = DB::table('produk')
            ->select('*')
            ->where('status', '=', 'publish')
            ->whereNull('deleted_at')
            ->limit(16)
            ->get();

        // dd($products);
        
        $sales = DB::table('produk as prod')
        ->join('detail_produk as dp', 'dp.id_produk', '=' , 'prod.id')
        ->join('pengiriman as p', 'dp.id_pengiriman', '=' , 'p.id')
        ->join('transaksi as t', 't.id', '=', 'p.id_transaksi')
        ->select('prod.id as id_produk', DB::raw('sum(dp.qty) as sales'))
        ->where('t.status_pembayaran', '=', 'success')
        ->whereNull('prod.deleted_at')
        ->groupBy('prod.id')
        ->get();

        // dd($sales);

        foreach ($products as $key => $product) {
            $products[$key]->sales =  0;
            foreach ($sales as $key2 => $sale) {
                if($products[$key]->id == $sales[$key2]->id_produk){
                    $products[$key]->sales =  $sales[$key2]->sales;
                }
            }            
        }

        return $products;
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

    public function search(Request $request)
    {
        $data = $request -> search;
        // dd($data);
        $products = DB::table('produk')
            ->select('*')
            ->where('status', '=', 'publish')
            ->where('nama_produk','like','%'.$data.'%')
            ->whereNull('deleted_at')
            ->limit(16)
            ->get();

        // dd($products);
        
        $sales = DB::table('produk as prod')
        ->join('detail_produk as dp', 'dp.id_produk', '=' , 'prod.id')
        ->join('pengiriman as p', 'dp.id_pengiriman', '=' , 'p.id')
        ->join('transaksi as t', 't.id', '=', 'p.id_transaksi')
        ->select('prod.id as id_produk', DB::raw('sum(dp.qty) as sales'))
        ->where('t.status_pembayaran', '=', 'success')
        ->whereNull('prod.deleted_at')
        ->groupBy('prod.id')
        ->get();

        foreach ($products as $key => $product) {
            $products[$key]->sales =  0;
            foreach ($sales as $key2 => $sale) {
                if($products[$key]->id == $sales[$key2]->id_produk){
                    $products[$key]->sales =  $sales[$key2]->sales;
                }
            }            
        }

        $newProducts = $this->getNewProducts();
        // dd($products);
        return view('customer.customer-catalog', ['products' => $products, 'newProducts' => $newProducts]);
    }
    public function searchByCategory($category)
    {
        $data = $category;
        // dd($data);
        $products = DB::table('produk')
            ->select('*')
            ->where('status', '=', 'publish')
            ->where('nama_produk','like','%'.$data.'%')
            ->whereNull('deleted_at')
            ->limit(16)
            ->get();

        // dd($products);
        
        $sales = DB::table('produk as prod')
        ->join('detail_produk as dp', 'dp.id_produk', '=' , 'prod.id')
        ->join('pengiriman as p', 'dp.id_pengiriman', '=' , 'p.id')
        ->join('transaksi as t', 't.id', '=', 'p.id_transaksi')
        ->select('prod.id as id_produk', DB::raw('sum(dp.qty) as sales'))
        ->where('t.status_pembayaran', '=', 'success')
        ->whereNull('prod.deleted_at')
        ->groupBy('prod.id')
        ->get();

        foreach ($products as $key => $product) {
            $products[$key]->sales =  0;
            foreach ($sales as $key2 => $sale) {
                if($products[$key]->id == $sales[$key2]->id_produk){
                    $products[$key]->sales =  $sales[$key2]->sales;
                }
            }            
        }

        $newProducts = $this->getNewProducts();
        // dd($products);
        return view('customer.customer-catalog', ['products' => $products, 'newProducts' => $newProducts]);
    }
}
