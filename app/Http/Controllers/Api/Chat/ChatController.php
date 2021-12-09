<?php

namespace App\Http\Controllers\Api\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function send_msg_to_dm(Request $request){


        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'sender_type' => 'required',
            'msg' => 'required',
            'api_key' => 'required',
        ]);

        if ($validator->fails()) {
            $response['status'] = 'failed';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        if( $request->api_key!='api.dedo.club.105118.com'){
            return response()->json(['status'=>'failed','message'=>'Invalid Api Key']);
        }

        $dp = DB::table('vendor')
            ->where('vendor_id',$request->sender_id)
            ->first();




        if( !$dp){
            return response()->json(['status'=>'failed','message'=>'DP dose not Exist']);
        }
        $dm = DB::table('tbl_user')
            ->where('id',$request->receiver_id)
            ->first();
        if( !$dm){
            return response()->json(['status'=>'failed','message'=>'DM dose not Exist']);
        }


        $dm = json_decode(json_encode($dm),true);
//        $dp = json_decode(json_encode($dp),true);

            try {

                $url = 'https://fcm.googleapis.com/fcm/send';
                $fields = array(
                    'registration_ids' => array($dm['fcm_token']),
                    'data' => array("message" => json_encode(['sender_id'=> $request->sender_id,'sender_type'=> 'dp','receiver_id'=>$request->receiver_id,'msg'=>$request->msg]), "title" => '@chat')
                );


                $fields = json_encode($fields);

                $headers = array(
                    'Authorization: key=' . "AAAAdRgzpFE:APA91bHP6jzHKWwOGbSZRDAk3ENZUG6LYahZ6pGkAgJZTArm3a5jBgITeWdLenjGTU9rK1n2tkulcSJddi5N4q8_b6DfrjTcvX9MotjafBWWdBXarnyWY0xP1es_0Mq67zGStUBmSJ-w",
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

                return response()->json(['status'=>'success','title'=>'@chat','message'=>$result]);

            }catch (\Exception $e){
                return response()->json(['status'=>'failed','message'=>$e->getMessage()]);
            }


    }

    public function send_msg_to_dp(Request $request){


        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'sender_type' => 'required',
            'msg' => 'required',
            'api_key' => 'required',
        ]);

        if ($validator->fails()) {
            $response['status'] = 'failed';
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        if( $request->api_key!='api.dedo.club.105118.com'){
            return response()->json(['status'=>'failed','message'=>'Invalid Api Key']);
        }

        $dp = DB::table('vendor')
            ->where('vendor_id',$request->sender_id)
            ->first();




        if( !$dp){
            return response()->json(['status'=>'failed','message'=>'DP dose not Exist']);
        }
        $dm = DB::table('tbl_user')
            ->where('id',$request->receiver_id)
            ->first();
        if( !$dm){
            return response()->json(['status'=>'failed','message'=>'DM dose not Exist']);
        }


        $dp = json_decode(json_encode($dp),true);
//        $dp = json_decode(json_encode($dp),true);

            try {

                $url = 'https://fcm.googleapis.com/fcm/send';
                $fields = array(
                    'registration_ids' => array($dp['fcm_token']),
                    'data' => array("message" => json_encode(['sender_id'=> $request->sender_id,'sender_type'=> 'dm','receiver_id'=>$request->receiver_id,'msg'=>$request->msg]), "title" => '@chat')
                );


                $fields = json_encode($fields);

                $headers = array(
                    'Authorization: key=' . "AAAAdRgzpFE:APA91bHP6jzHKWwOGbSZRDAk3ENZUG6LYahZ6pGkAgJZTArm3a5jBgITeWdLenjGTU9rK1n2tkulcSJddi5N4q8_b6DfrjTcvX9MotjafBWWdBXarnyWY0xP1es_0Mq67zGStUBmSJ-w",
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

                return response()->json(['status'=>'success','title'=>'@chat','message'=>$result]);

            }catch (\Exception $e){
                return response()->json(['status'=>'failed','message'=>$e->getMessage()]);
            }


    }
}
