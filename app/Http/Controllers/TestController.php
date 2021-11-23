<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function test(){


        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
            ->where('cityadmin_email', $cityadmin_email)
            ->first();
        $vendor= DB::table('vendor')
            ->leftjoin('vendor_packages', function($q) {
                $q->on('vendor.vendor_id', '=', 'vendor_packages.vend_id')
                    ->where('vendor_packages.status', '=', 'active');
            })
            ->leftjoin('packages','vendor_packages.package_id', '=', 'packages.id')
            ->select('vendor_name','owner','vendor_phone','vendor_email','vendor_logo','vendor_id','vend_id','name','type','orders_quantity','price')
            ->where('cityadmin_id', $cityadmin->cityadmin_id)
            ->get()->groupBy('vendor_id')->map(function ($vendor){
                if (count($vendor) == 1){
                    if ($vendor[0]->vend_id == null){
                        $vendor['status'] = 'not_active';
                    }else{
                        $vendor['status'] = 'active';
                    }
                }else{
                    $vendor['status'] = 'active';
                }
                return $vendor;
            });




        dd($vendor);


    }
}
