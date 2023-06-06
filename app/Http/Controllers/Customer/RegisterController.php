<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('customer.customer-register');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'email' => 'required|unique:user',
            'password' => 'required|min:5'
        ]);

        // dd($data);

        $isEmailExist = User::where('email', $request->email)->exists();
        if($isEmailExist){
            return back()->withErrors([
                'email' => 'This email already exist'
            ])->withInput();
        }

        $data['role'] = 'customer'; //adding the array
        $data['password'] = Hash::make($request->password); //hash password and override array
        
        // dd($data);
        User::create($data);

        return redirect()->route('customer.login')->with('success', 'Pendaftaran Berhasil');;
    }
}
?>