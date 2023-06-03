<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class SuperAdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.admin-superAdmin-login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = user::where('email', $credentials['email'])
                ->where('role', 'superAdmin') ->first();    
   
        $pw = Crypt::decryptString($user->password);
        if ($pw=$credentials['password']){
            Auth::login($user, false);

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->with('loginError', 'Login gagal!')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('superAdmin.login');
    }
}
