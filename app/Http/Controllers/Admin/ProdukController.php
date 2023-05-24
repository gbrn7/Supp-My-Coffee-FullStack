<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProdukController extends Controller
{
    public function index(){

        // \DB::enableQueryLog();
        
        $products = Produk::all();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        // dd(\DB::getQueryLog());

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
            'berat' => 'required|numeric|min:-2147483648',
            'harga' => 'required|numeric|min:-2.22507385850720',
        ]);

        $thumbnail = $request->produk_thumbnail;
        $thumbnailName = Str::random(10).$thumbnail->getClientOriginalName();

        $thumbnail->storeAs('public/thumbnail', $thumbnailName); //store image

        $data['produk_thumbnail'] = $thumbnailName;

        Produk::create($data);

        // Alert::success('Success', 'Produk Telah Ditambahkan');

        return redirect()->route('admin.produk')->with('success', 'Produk Ditambahkan!');;
        // dd($data);
        
    }

    public function edit($id){
        $product = Produk::find($id);

        // dd($product);
        return view('admin.admin-edit-produk', ['product' => $product]);
    }

    public function update(Request $request, $id){
        $data = $request->except("_token");
        // dd($data);
        $request->validate([
            'nama_produk' => 'required|string',
            'produk_thumbnail' => 'image|mimes:png,jpg,jpeg',
            'desc' => 'required|string',
            'berat' => 'required|numeric|min:-2147483648',
            'harga' => 'required|numeric|min:-2.22507385850720',
            'status' => 'required|string',
        ]);

        $product = Produk::find($id);

        if($request->produk_thumbnail){
            //save new image
            $thumbnail = $request->produk_thumbnail;
            $thumbnailName = Str::random(10).$thumbnail->getClientOriginalName();

            $thumbnail->storeAs('public/thumbnail', $thumbnailName); //store image

            $data['produk_thumbnail'] = $thumbnailName; //overide thumbnail file name
            
            //delete old image
            Storage::delete('public/thumbnail/'.$product->thumbnail);
        }

        $product->update($data);

        // dd($data);
        return redirect()->route('admin.produk')->with('success', 'Produk Diedit!');

    }

    public function destroy($id){

        // example:

        Produk::find($id)->delete();
        return redirect()->route('admin.produk')->with('success', 'Product Dihapus!');
    }
}
