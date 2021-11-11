<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function adminIndex(Request $request)
    {
        $created_at = Carbon::Now();
    	 $admin_email=Session::get('admin');
    	 
    	  $admin=DB::table('admin')
    			->where('admin_email',$admin_email)
    			->first();	
                            
                        
    	                    
        return view('admin.index', compact("admin_email", "admin"));
           
      }


  }