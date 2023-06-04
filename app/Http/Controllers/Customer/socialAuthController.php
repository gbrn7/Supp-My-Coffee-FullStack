<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class socialAuthController extends Controller
{
    public function redirectToProvider() //mengarahkan ke google
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handlerCallBack() //mengarahkan ke aplikasi
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Throwable $th) {
            return redirect()->route('customer.login');
        }
        $isEmailExist = User::where('email', $user->email)->first();
        if ($isEmailExist) {
            Auth::login($isEmailExist, false);
            return redirect()->intended(route('customer.catalog'));
        } else {
          $newUser = User::create([
            'nama'=>$user->name,
            'email'=>$user->email,
            'role'=>'customer'
          ])  ;
        }

        Auth::login($newUser,false);
        return redirect()->intended(route('customer.catalog'));
    }
}
