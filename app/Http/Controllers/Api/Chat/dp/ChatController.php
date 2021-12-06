<?php

namespace App\Http\Controllers\Api\Chat\dp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function dp_send_msg(Request $request){




        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'user_type' => 'required',
            'api_key' => 'required',
            'dm_id' => 'required',
            'msg' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            $response['status'] = 'failed';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        if( $request->api_key!='api.dedo.club.105118.com'){
            return response()->json(['status'=>'failed','message'=>'Invalid Api Key']);
        }




            try {
                $dp = DB::table('vendor')
                    ->where('vendor_email',$request->email)
                    ->first();

                $dm = DB::table('vendor')
                    ->where('vendor_id',$request->dm_id)
                    ->first();


                 ;

                $url = 'https://fcm.googleapis.com/fcm/send';

                $fields = array(
                    'registration_ids' => array($dm->fcm_tocken),
                    'data' => array("message" => $request->msg, "title" => $request->title)
                );


                $fields = json_encode($fields);

                $headers = array(
                    'Authorization: key=' . "AAAAnHjtlFI:APA91bEBJz-M1CPGRNJFJAI5BiUQh--XwfLJAlkMd-hVG9BdFyXABIMlUORpCUSZHnReojmKWnmE1L5x3JNMoaBFnVqz5t4yRz-NXkmeLRg7LpSZKM51S9-BeFd80rocNhcOok5XsCHQ",
                    'Content-Type: application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

                $result = curl_exec($ch);

                curl_close($ch);



                //print_r($result);

                return response()->json(['status'=>'success','message'=>$result]);

            }catch (\Exception $e){
                return response()->json(['status'=>'failed','message'=>$e->getMessage()]);
            }
        

    }
}
