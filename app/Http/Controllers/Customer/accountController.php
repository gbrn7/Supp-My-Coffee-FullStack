<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index(){

        // dd('test');
        return view('customer.customer-account');
    }
}
