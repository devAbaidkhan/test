<?php

namespace App\Http\Controllers\Ordertaker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ordertaker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function vendorIndex(Request $request)
    {
        $created_at = Carbon::Now();
        if (Session::has('ordertaker')) {
            $ordertaker=Session::get('ordertaker');
   
            $current = Carbon::now();
            $current->toDateString();
            $currentDate = date('Y-m-d');
            $day = 1;
            $current2 = date('d-m-Y', strtotime($current.' + '.$day.' days'));
                    
            return view('ordertaker.index', compact("ordertaker"));
        } else {
            return redirect()->route('ordertaker.login')->withErrors('please login first');
        }
    }

	public function logout(Request $request)
	{
	 if(Session::has('ordertaker'))
	{
       $ordertaker= Ordertaker::find(Session::get('ordertaker')->id);
       $ordertaker->fcm_token=null;
       $ordertaker->save();
		$request->session()->flush();
		return redirect()->route('ordertaker.login');
	}
   else
	{
	   return redirect()->route('ordertaker.login')->withErrors('please login first');
	}
	}
}
