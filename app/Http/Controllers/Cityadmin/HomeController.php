<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
	public function cityadminIndex(Request $request)
    {
        $created_at = Carbon::Now();
    if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
        
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $cityadmin_id = $cityadmin->cityadmin_id;
        
        
        	$currentDate = date('Y-m-d');
				$day = 1;
       $current2 = date('d-m-Y', strtotime($currentDate.' + '.$day.' days'));
        
        
                            
         $total_earnings = 0; 
    	   $orders = 0;  
    	   $total_cash = 0;                  
    	                    
    	 $total_users = 0;     
    	  $ongoing =  0;      
    	   $complete =   0; 
    	   $cityadmin1 =   0; 
    	   $user =   0; 
    	   $comment =  0; 
    	   $cancel =   0;
    	   $currency =  0; 
    	   $app_share =   0;
    	   $daily_count =   0; 
    	   $today =       0;
    	   
    	   $recent_order = array();
    	   $reffer_arning = 0;                   
    	                    
        return view('cityadmin.index', compact("cityadmin_email", "cityadmin", "total_earnings", "total_users", "ongoing","complete","cityadmin1","orders","user","comment","cancel","total_cash","currency","app_share","daily_count","today","recent_order","reffer_arning"));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
}
