<?php

namespace App\Http\Controllers\DeliveryBoy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function vendorIndex(Request $request)
    {
        $created_at = Carbon::Now();
        if (Session::has('delivery_boy')) {
            $delivery_boy=Session::get('delivery_boy');
   
            $current = Carbon::now();
            $current->toDateString();
            $currentDate = date('Y-m-d');
            $day = 1;
            $current2 = date('d-m-Y', strtotime($current.' + '.$day.' days'));
                    
            return view('delivery_boy.index', compact("delivery_boy"));
        } else {
            return redirect()->route('delivery_boy.login')->withErrors('please login first');
        }
    }

    public function logout(Request $request)
    {
        if (Session::has('delivery_boy')) {
            DB::table('delivery_boy')
                  ->where('delivery_boy_id', Session::get('delivery_boy')->delivery_boy_id)
                  ->update(['fcm_token'=>null]);
            $request->session()->flush();
            return redirect()->route('delivery_boy.login');
        } else {
            return redirect()->route('delivery_boy.login')->withErrors('please login first');
        }
    }
}
