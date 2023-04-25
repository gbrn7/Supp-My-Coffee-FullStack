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
        $validatedData = $request->validate([
            'email' => 'required|unique:user',
            'password' => 'required|min:5'
        ]);

        $data = $request -> except('_token');

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registrasi berhasil. Silahkan login!');
        
        return redirect('/login');
    }
}
?>