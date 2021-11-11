<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

      function permission($permission, $role='')
      {
          if (Session::get('admin')) {
              return true;
          }
          $role= Session::get('role');
          $rolename="";
          if ($role=='CountryFranchise' || $role=='CityFranchise') {
              $role_id= Session::get('franchise_admin')->role_id;
              $rolename=$role;
          } else {
              if (Session::has('role')) {
                  $role_id=Session::get('role')->id;
                  $rolename=Session::get('role')->name;
              } else {
                  return false;
              }
          }



          Cache::remember($rolename."_has_permissions", 24*60*60, function () use ($role_id) {
              return DB::table('role_has_permissions')
          ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
          ->where('role_has_permissions.role_id', $role_id)->pluck('name')->toArray();
          });

          $role_has_permissions= Cache::get($rolename.'_has_permissions');
          if (in_array($permission, $role_has_permissions)) {
              return true;
          }
          return false;
      }
      function auth_partner()
      {
          $vendor_email=Session::get('vendor');
          $vendor=DB::table('vendor')
               ->where('vendor_email', $vendor_email)
               ->first();
          return $vendor;
      }

      function check_vendor()
      {
          if (!Session::has('vendor')) {
              return redirect()->route('vendorlogin')->withErrors('please login first');
          }
      }

     function FCM_Notification($firebaseToken, $title, $body)
     {
         $SERVER_API_KEY ='AAAANN1p9wA:APA91bGOsXLbtwPTUspY0J1uo4AzcuWLgQNRrOR3Zk8wnGA1kQsKiJBmRnS9zyHy1Q5M_0uMosp4mFivEYPW5rxn7sg2YCyIXIpOGI3o0YCZygOApY8_N_HXqWMm6er0nssFbLY-Pnyd';
         $data = [
            "registration_ids" => $firebaseToken,
            "data" => [
                "title" => $title,
                "message" => $body,
                "icon"=>"https://dedodelivery.com/testdm/img/logo/dedo-logo.png",

                /* "sound"=>"", */
            ],
            /* "data" =>[
                "click_action"=> "Rider_Order_List",
                "openURL" => "https://dedo.test/rider/"
            ] */
        ];
         $dataString = json_encode($data);
         $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
         $response = curl_exec($ch);
         return $response;
     }

    function base64_url_encode($input)
    {
        return strtr(base64_encode($input), '+/=', '._-');
    }

       function base64_url_decode($input)
       {
           return base64_decode(strtr($input, '._-', '+/='));
       }
