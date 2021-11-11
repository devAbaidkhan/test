<?php

namespace App\Http\Controllers\DeliveryBoy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ordertaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('delivery_boy.login');
    }
    public function checkLogin(Request $request)
    {
        
        $phone=$request->delivery_boy_phone;
        $password=$request->delivery_boy_pass;
        $fcm_token=$request->fcm_token;
        $this->validate(
            $request,
            [
                 'delivery_boy_phone'=>'required',
                 'delivery_boy_pass'=>'required',
         ],
            [
             'delivery_boy_phone.required'=>'Enter Phone Number',
             'delivery_boy_pass.required'=>'Enter the password',
         ]
        );
        $delivery_boy =DB::table('delivery_boy')
        ->where('delivery_boy_phone',$phone)->first();
                
        if ($delivery_boy) {
                if (Hash::check($password, $delivery_boy->delivery_boy_pass)) {
                    Session::put('delivery_boy', $delivery_boy);
                    $roles=  DB::table('roles')->where('name','Rider')->select('id','name')->first();
                    session::put('role',$roles);
                    DB::table('delivery_boy')
                    ->where('delivery_boy_id',$delivery_boy->delivery_boy_id)
                    ->update([
                        'fcm_token'=>$fcm_token
                    ]);
                    return redirect()->route('delivery_boy.index');
                } else {
                    return redirect()->route('delivery_boy.login')->withErrors('wrong password');
                }
           
        } else {
            return redirect()->route('delivery_boy.login')->withErrors('invalid email and password');
        }
    }
}
