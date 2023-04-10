<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(){
        $products = Produk::all();

        return view('admin.admin-data-produk', ['products' => $products]);
    }

    public function create(){
        return view('admin.admin-tambah-produk');
    }

    public function store(Request $request){
        $data = $request->except("_token");
        $request->validate([
            'nama_produk' => 'required|string',
            'produk_thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'desc' => 'required|string',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $thumbnail = $request->produk_thumbnail;
        $thumbnailName = Str::random(10).$thumbnail->getClientOriginalName();

        $thumbnail->storeAs('public/thumbnail', $thumbnailName); //store image

        $data['produk_thumbnail'] = $thumbnailName;

        Produk::create($data);

        return redirect()->route('admin.produk')->with('success', 'Product Created');
        // dd($data);
        
    }

    public function update(){
        return view('admin.admin-edit-produk');
    }

    public function destroy(){
        return view('admin.admin-data-produk'); 
    }
}
