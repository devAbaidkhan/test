<?php

namespace App\Http\Controllers;

use App\Package;
use App\VendorPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function test(){
        $pkgs= DB::table('vendor_packages')
            ->where('status','active')
            ->leftjoin('packages','vendor_packages.package_id','=','packages.id')
            ->select(
                'vendor_packages.created_at as pkg_date',
                'packages.days',
                'vendor_packages.id as pkg_id',
                'vendor_packages.expiry_date as expiry_date'
            )
            ->get();

        foreach ($pkgs as $pkg){

            $pkg_date = Carbon::parse($pkg->expiry_date)->toDateString();
            $today = Carbon::now()->toDateString();
            if ($pkg_date == $today ){
                $package = VendorPackage::find($pkg->pkg_id);
                $package->status = 'expire';
                $package->save();

                $active_pkgs = VendorPackage::where('vend_id',$package->vend_id)->where('status','active')->get();
                if (count($active_pkgs) == 0){

                    DB::table('vendor')
                        ->where('vendor_id',$package->vend_id)
                        ->update(['status' => 0]);

                }

            }
        }

    }
}
