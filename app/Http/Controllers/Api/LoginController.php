<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ordertaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $user_type=$request->user_type;
        $fcm_token=$request->fcm_token;
        $api_key=$request->api_key;

        
        $rules= [
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
            'api_key' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['status'] = 'empty';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        if($api_key!='api.dedo.club.105118.com'){
            return response()->json(['status'=>'error','message'=>'Invalid Api Key']);
        }
        if ($user_type=='Partner') {
            return    $this->PartnerLoginCheck($email, $password, $user_type);
        } elseif ($user_type=='OrderTaker') {
            return   $this->OrderTakerLoginCheck($email, $password, $user_type);
        } elseif ($user_type=='Rider') {
            return   $this->RiderLoginCheck($email, $password, $user_type);
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid User Type']);
        }
    }
    

    protected function PartnerLoginCheck($vendor_email, $vendor_pass, $fcm_token=null)
    {
        $checkvendorLogin = DB::table('vendor')
                           ->where('vendor_email', $vendor_email)
                           ->first();
        
        if ($checkvendorLogin) {
            $ui_type = $checkvendorLogin->ui_type;
            //  restrurent Login check
            if ($ui_type==2) {
                if (Hash::check($vendor_pass, $checkvendorLogin->vendor_pass)) {
                    Session::put('vendor', $checkvendorLogin->vendor_email);
                    $roles=  DB::table('roles')->where('name', 'Partner')->select('id', 'name')->first();
                    DB::table('vendor')->where('vendor_id', $checkvendorLogin->vendor_id)
                    ->update([
                        'fcm_token'=>$fcm_token
                    ]);
                    session::put('role', $roles);
                    return redirect()->route('resturant-index');
                } else {
                    return response()->json(['status'=>'error','message'=>'Incorrect Password']);
                }
            } else {
                return response()->json(['status'=>'error','message'=>'You are Not Registered as Restaurant Partner']);
            }
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid Email And Password']);
        }
    }

    protected function OrderTakerLoginCheck($email, $password, $fcm_token=null)
    {
        $ordertaker =Ordertaker::where('email', $email)->first();
        
                         
        if ($ordertaker) {
            if (Hash::check($password, $ordertaker->password)) {
                Session::put('ordertaker', $ordertaker);
                $roles=  DB::table('roles')->where('name', 'OrderTaker')->select('id', 'name')->first();
                session::put('role', $roles);
                Ordertaker::where('id', $ordertaker->id)
                    ->update([
                        'fcm_token'=>$fcm_token
                    ]);
                return redirect()->route('ordertaker.index');
            } else {
                return response()->json(['status'=>'error','message'=>'Incorrect Password']);
            }
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid Email And Password']);
        }
    }
    protected function RiderLoginCheck($phone, $password, $fcm_token=null)
    {
        $delivery_boy =DB::table('delivery_boy')
        ->where('delivery_boy_phone', $phone)->first();
                
        if ($delivery_boy) {
            if (Hash::check($password, $delivery_boy->delivery_boy_pass)) {
                Session::put('delivery_boy', $delivery_boy);
                $roles=  DB::table('roles')->where('name', 'Rider')->select('id', 'name')->first();
                session::put('role', $roles);
                DB::table('delivery_boy')
                    ->where('delivery_boy_id', $delivery_boy->delivery_boy_id)
                    ->update([
                        'fcm_token'=>$fcm_token
                    ]);
                return redirect()->route('delivery_boy.index');
            } else {
                return response()->json(['status'=>'error','message'=>'Incorrect Password']);
            }
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid Email And Password']);
        }
    }

    public function Login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $user_type=$request->user_type;
        $fcm_token=$request->fcm_token;
        $api_key=$request->api_key;
        
        $rules= [
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['status'] = 'empty';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        if($api_key!='api.dedo.club.105118.com'){
            return response()->json(['status'=>'error','message'=>'Invalid Api Key']);
        }
        if ($user_type=='Partner') {
            return    $this->PartnerLogin($email, $password, $user_type);
        } elseif ($user_type=='OrderTaker') {
            return   $this->OrderTakerLogin($email, $password, $user_type);
        } elseif ($user_type=='Rider') {
            return   $this->RiderLogin($email, $password, $user_type);
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid User Type']);
        }
    }
    
    public function Register(Request $request)
    {
        
        $Name=$request->Name;
        $B_Name=$request->BusinessName;
        $B_Type=$request->BusinessType;
        $Email=$request->Email;
        $Phone=$request->PhoneNo;
        $Address=$request->Address;
        $City=$request->City;
        $Password=$request->Password;
        $api_key=$request->api_key;
        
        $rules= [
            'Name' => 'required',
            'City' => 'required',
            'Password' => 'required',
            'Address' => 'required',
            'Email' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['status'] = 'empty';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        if($api_key!='api.dedo.club.105118.com'){
            return response()->json(['status'=>'error','message'=>'Invalid Api Key']);
        }
        else {
            
            $values = array('Name' =>$Name,'B_Name' =>$B_Name,'B_Type' =>$B_Type,'Email' =>$Email,'Phone' =>$Phone,'Address' =>$Address,'City' =>$City,'Password' =>$Password,);
            DB::table('compaign_register')->insert($values);
            
            
            return response()->json(['status'=>'Success','message'=>'Success']);
        }
    }

    protected function PartnerLogin($vendor_email, $vendor_pass, $fcm_token=null)
    {
        $checkvendorLogin = DB::table('vendor')
                           ->where('vendor_email', $vendor_email)
                           ->first();
        
        if ($checkvendorLogin) {
            $ui_type = $checkvendorLogin->ui_type;
            //  restrurent Login check
            if ($ui_type==2) {
                if (Hash::check($vendor_pass, $checkvendorLogin->vendor_pass)) {
                    return response()->json(['status'=>'success','message'=>'Login Successfully']);
                } else {
                    return response()->json(['status'=>'error','message'=>'Incorrect Password']);
                }
            } else {
                return response()->json(['status'=>'error','message'=>'You are Not Registered as Restaurant Partner']);
            }
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid Email And Password']);
        }
    }

    protected function OrderTakerLogin($email, $password, $fcm_token=null)
    {
        $ordertaker =Ordertaker::where('email', $email)->first();
        
                         
        if ($ordertaker) {
            if (Hash::check($password, $ordertaker->password)) {
                return response()->json(['status'=>'success','message'=>'Login Successfully']);
            } else {
                return response()->json(['status'=>'error','message'=>'Incorrect Password']);
            }
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid Email And Password']);
        }
    }
    protected function RiderLogin($phone, $password, $fcm_token=null)
    {
        $delivery_boy =DB::table('delivery_boy')
        ->where('delivery_boy_phone', $phone)->first();
                
        if ($delivery_boy) {
            if (Hash::check($password, $delivery_boy->delivery_boy_pass)) {
                return response()->json(['status'=>'success','message'=>'Login Successfully']);
            } else {
                return response()->json(['status'=>'error','message'=>'Incorrect Password']);
            }
        } else {
            return response()->json(['status'=>'error','message'=>'Invalid Email And Password']);
        }
    }
}
