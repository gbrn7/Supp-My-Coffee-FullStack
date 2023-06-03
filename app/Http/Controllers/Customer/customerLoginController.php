<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customerLoginController extends Controller
{
    public function index()
    {
        return view('customer.customer-login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials['role'] = 'customer';
  
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended(route('customer.catalog'));
        }

        return back()->with('loginError', 'Login gagal!')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
?>