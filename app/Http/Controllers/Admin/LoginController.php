<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.admin-login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('user')
                ->where('email', $credentials['email']) 
                ->where(function (Builder $query) {
                    $query->where('role', 'admin')
                          ->orWhere('role', 'superAdmin');
                })
                ->first();    
        if (!$user) return back()->with('loginError', 'Login gagal!')->withInput();

        $pw = Crypt::decryptString($user->password);


        if ($pw == $credentials['password']){
            Auth::loginUsingId($user->id, $remember = false);

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->with('loginError', 'Login gagal!')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('admin.login');
    }
}
