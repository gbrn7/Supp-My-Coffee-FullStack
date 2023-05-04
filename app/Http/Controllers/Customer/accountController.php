<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index(){

        // dd('test');
        $user = auth() ->user();
        return view('customer.customer-account',['user'=> $user]);
    }
}
