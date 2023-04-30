<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class dateController extends Controller
{
    public function index($subs, $subsDate){
        $first = Carbon::create(date('Y'), date('m'), $subs);
        $data = [];
        //Execution
        for ($i=0; $i < $subs ; $i++) {
            if($i == 0){
                array_push($data, now()->toDateString());
                $first->addMonth(1);
            }else{
                $second = Carbon::create($first->year, $first->month, $subsDate);
                // dd($second);
                array_push($data, $second->toDateString());
                $first->addMonth(1);
            }
        };

        return json_encode($data);
        
    }
}
