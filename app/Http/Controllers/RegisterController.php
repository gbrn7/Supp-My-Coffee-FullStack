<?php

namespace App\Http\Controllers;

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
        $data = $request->validate([
            'email' => 'required|unique:user',
            'password' => 'required|min:5'
        ]);

        $isEmailExist = User::where('email', $request->email)->exists();
        if($isEmailExist){
            return back()->withErrors([
                'email' => 'This email already exist'
            ])->withInput();
        }

        $data['role'] = 'member'; //adding the array
        $data['password'] = Hash::make($request->password); //hash password and override array
        
        dd($data);
        User::create($data);

        return redirect()->route('customer.login');
    }
}
?>