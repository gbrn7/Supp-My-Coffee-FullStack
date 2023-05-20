<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class indexController extends Controller
{
    public function index(){

        if(auth()->user()){
            return redirect()->route('customer.catalog');
        }
        
        $products = $this->getProducts();

        // dd($products);
        return view('customer.customer-index', ['products' => $products]);
    }

    public function getProducts(){
        $products = DB::table('produk')
            ->select('*')
            ->where('status', '=', 'publish')
            ->limit(8)
            ->get();

        $sales = DB::table('produk as prod')
            ->join('detail_produk as dp', 'dp.id_produk', '=' , 'prod.id')
            ->select('prod.id as id_produk', DB::raw('sum(dp.qty) as sales'))
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

        // dd($products);

        return $products;
    }
}
