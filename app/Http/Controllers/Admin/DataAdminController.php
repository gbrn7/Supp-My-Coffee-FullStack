<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Crypt;


class DataAdminController extends Controller
{
    public function index(){

        // dd(auth()->user());
        if(auth()->user()->role!=='superAdmin'){
            return redirect()->route('admin.dashboard')->with('error', 'Anda tidak dapat mengakses halaman Data Admin.');
        }

        $users = $this->getUser();

        return view('admin.admin-data-admin', ['users' => $users]);
    }

    public function getUser(){
        $users = DB::table('user')
            ->select('*')
            ->where(function (Builder $query) {
                $query->where('role', 'admin')
                      ->orWhere('role', 'superAdmin');
            })
            ->limit(16)
            ->get();

        return $users;
    }

    public function create(){
        return view('admin.admin-tambah-admin');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'email' => 'required|unique:user',
            'password' => 'required|min:5',
            'role' => 'required|string'
        ]);

        $isEmailExist = User::where('email', $request->email)->exists();
        if($isEmailExist){
            return back()->withErrors([
                'email' => 'This email already exist'
            ])->withInput();
        }

        $data['password'] = Crypt::encryptString($request->password); //hash password and override array
        
        dd($data);
        User::create($data);

        return redirect()->route('admin.dataAdmin')->with('success', 'Admin Ditambahkan!');;
        // dd($data);
    }

    public function edit($id){
        $user=DB::table('user')->select('*')->where('id', '=', $id)->first();
        $pw = Crypt::decryptString($user->password);
        $user->password=$pw;

        // dd($product);
        return view('admin.admin-edit-dataAdmin', ['user' => $user]);
    }

    public function update(Request $request, $id){
        $data = $request->except("_token");

        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'password' => 'required|min:5',
            'role' => 'required|string'
        ]);

        // dd($data);

        $data['password'] = Crypt::encryptString($request->password); //hash password and override array

        $user = User::where('id', $id)
        ->update(['nama' => $data['nama'], 'alamat' => $data['alamat'], 'no_telp' => $data['no_telp'], 'password' => $data['password'], 'role' => $data['role']]);

        return redirect()->route('admin.dataAdmin')->with('success', 'Data Admin Diedit!');
    }

    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('admin.dataAdmin')->with('success', 'Admin Dihapus!');
    }
}
