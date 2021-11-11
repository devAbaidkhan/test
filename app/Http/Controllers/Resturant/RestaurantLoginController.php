<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RestaurantLoginController extends Controller
{
    public function resturantlogin(Request $request)
    {
        
        return view('resturant.login');
    }
    public function checkresturantLogin(Request $request)
    {
        $vendor_email=$request->vendor_email;
        $vendor_pass=$request->vendor_pass;

        $this->validate(
            $request,
            [
                 'vendor_email'=>'required',
                 'vendor_pass'=>'required',
         ],
            [

             'vendor_email.required'=>'Enter E-Mail',
             'vendor_pass.required'=>'Enter the password',
         ]
        );
        $checkvendorLogin = DB::table('vendor')
                           ->where('vendor_email', $vendor_email)
                           ->first();
                         
        if ($checkvendorLogin) {
            $ui_type = $checkvendorLogin->ui_type;
            if ($ui_type==2) {
                if (Hash::check($vendor_pass, $checkvendorLogin->vendor_pass)) {
                    Session::put('vendor', $checkvendorLogin->vendor_email);
                    $roles=  DB::table('roles')->where('name','Partner')->select('id','name')->first();
                    DB::table('vendor')->where('vendor_id',$checkvendorLogin->vendor_id)
                    ->update([
                        'fcm_token'=>$request->fcm_token
                    ]);
                    session::put('role',$roles);
                    return redirect()->route('resturant-index');
                } else {
                    return redirect()->route('resturantlogin')->withErrors('wrong password');
                }
            } else {
                return redirect()->route('resturantlogin')->withErrors('You are Not Registered as Restaurant Partner');
            }
        } else {
            return redirect()->route('resturantlogin')->withErrors('invalid email and password');
        }
    }
}
