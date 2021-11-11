<?php

namespace App\Http\Controllers\Ordertaker;

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
        return view('ordertaker.login');
    }
    public function checkLogin(Request $request)
    {
        
        $email=$request->email;
        $password=$request->password;
        $this->validate(
            $request,
            [
                 'email'=>'required',
                 'password'=>'required',
         ],
            [
             'email.required'=>'Enter E-Mail',
             'password.required'=>'Enter the password',
         ]
        );
        $ordertaker =Ordertaker::where('email',$email)->first();
        
                         
        if ($ordertaker) {
                if (Hash::check($password, $ordertaker->password)) {
                    Session::put('ordertaker', $ordertaker);
                    $roles=  DB::table('roles')->where('name','OrderTaker')->select('id','name')->first();
                    session::put('role',$roles);
                    Ordertaker::where('id',$ordertaker->id)
                    ->update([
                        'fcm_token'=>$request->fcm_token
                    ]);
                    return redirect()->route('ordertaker.index');
                } else {
                    return redirect()->route('ordertaker.login')->withErrors('wrong password');
                }
           
        } else {
            return redirect()->route('ordertaker.login')->withErrors('invalid email and password');
        }
    }
}
