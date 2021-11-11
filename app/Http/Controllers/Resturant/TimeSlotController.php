<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class TimeSlotController extends Controller
{
    public function resturanttimeslot(Request $request)
    {
        $vendor_email=Session::get('vendor');
        
        $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
       
        
        $city = DB::table('time_slot')
                ->where('vendor_id', $vendor->vendor_id)
                    ->first();
                
                    $keywords=explode(',',$vendor->keywords);
                   
        return view('resturant.time_slot.time_slot', compact("vendor_email", 'vendor', 'city','keywords'));
    }

    
    public function resturanttimeslotupdate(Request $request)
    {
        $time_slot_id = $request->time_slot_id;
        $open_hrs = $request->open_hour;
        $close_hrs = $request->close_hour;
        $interval = $request->time_slot;
        $delivery_range = $request->delivery_range;
        $delivery_charges = $request->delivery_charges;
        $keywords="";
        foreach ($request->res_keywords as $row) {
            $keywords.=$row.',';
        }
        $keywords = rtrim($keywords, ",");
        $insert = DB::table('time_slot')
                    ->where('time_slot_id', $time_slot_id)
                    ->update([
                        'open_hour'=>$open_hrs,
                        'close_hour'=>$close_hrs,
                        'time_slot'=>$interval,
                        
                        ]);
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
                    
                    
        DB::table('vendor')
                    ->where('vendor_id', $vendor->vendor_id)
                    ->update([
                        'delivery_range'=>$delivery_range,
                        'delivery_charges'=>$delivery_charges,
                        'keywords'=>$keywords,
                        'avg_cost_meal'=>$request->avg_cost_meal,
                        'estimated_delivery_time'=>$request->estimated_delivery_time,
                        ]);
     
        return redirect()->back()->withSuccess('Updated Successfully');
    }
}
