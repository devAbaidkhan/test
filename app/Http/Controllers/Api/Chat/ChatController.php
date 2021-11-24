<?php

namespace App\Http\Controllers\Api\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function dp_send_msg($FCMToken, $FCMMessage, $FCMTitle){


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
        'registration_ids' => array ($FCMToken),
        'data' => array ( "message" => $FCMMessage, "title" => $FCMTitle )
    );


    $fields = json_encode ( $fields );

    $headers = array (
        'Authorization: key=' . "AAAAnHjtlFI:APA91bEBJz-M1CPGRNJFJAI5BiUQh--XwfLJAlkMd-hVG9BdFyXABIMlUORpCUSZHnReojmKWnmE1L5x3JNMoaBFnVqz5t4yRz-NXkmeLRg7LpSZKM51S9-BeFd80rocNhcOok5XsCHQ",
        'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    echo $result;
    curl_close ( $ch );

    }
}
