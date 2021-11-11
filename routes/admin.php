<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Admin', 'prefix'=>'admin'], function () {
    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/checklogin', 'LoginController@checkAdminLogin')->name('check-admin-login');
});
 
      Route::group(['namespace'=>'Admin','middleware'=>'per', 'prefix'=>'admin'], function () {
          //Meenu
          Route::resource('role', 'RoleController');
          /// for home
          Route::get('index', 'HomeController@adminIndex')->name('admin-index');
      
     
          //for admin profile
          Route::get('profile', 'ProfileController@adminProfile')->name('admin-profile');
          // Route::post('update/profile/{id}', 'ProfileController@adminUpdateProfile')->name('update-admin-profile');
          Route::get('admin/edit/{id}', 'ProfileController@Editadmin')->name('edit-admin');
          Route::post('update/profile/{id}', 'ProfileController@adminUpdateProfile')->name('update-admin');
          Route::get('password', 'ProfileController@adminChangePass')->name('change_pass');
          Route::post('password/change/{id}', 'ProfileController@adminChangePassword')->name('admin-change-pass');
          Route::get('logout', 'ProfileController@adminLogout')->name('admin-logout');
          //city
          Route::get('city', 'CityController@city')->name('city');
          Route::get('city/add', 'CityController@Addcity')->name('addcity');
          Route::post('city/add/insert', 'CityController@AddInsertcity')->name('insert-city');
          Route::get('city/edit/{id}', 'CityController@Editcity')->name('edit-city');
          Route::post('city/update/{id}', 'CityController@Updatecity')->name('update-city');
          Route::get('city/delete/{id}', 'CityController@Deletecity')->name('delete-city');
      
          //vendor category
          Route::get('partner-list', 'VendorCategoryController@vendorlist')->name('vendorlist');
          Route::get('add-partner', 'VendorCategoryController@addvendor')->name('addvendor');
          Route::post('addnew-partner', 'VendorCategoryController@addnewvendor')->name('addnewvendor');
          Route::get('edit-partner/{vendor_category_id}', 'VendorCategoryController@editvendor')->name('editvendor');
          Route::post('update-partner/{vendor_category_id}', 'VendorCategoryController@updatevendor')->name('updatevendor');
          Route::get('delete-partner/{vendor_category_id}', 'VendorCategoryController@deletevendor')->name('deletevendor');
      
          //logo
          Route::get('logo/edit', 'logoController@Editlogo')->name('edit-logo');
          Route::post('logo/update', 'logoController@Updatelogo')->name('update-logo');
      
          // admin banner
          Route::get('adminbanner', 'BannerController@banner')->name('adminbanner');
          Route::get('addbanner', 'BannerController@addbanner')->name('addbanner');
          Route::post('addnewbanner', 'BannerController@addnewbanner')->name('addnewbanner');
          Route::get('editbanner/{banner_id}', 'BannerController@editbanner')->name('editbanner');
          Route::post('updatebanner/{banner_id}', 'BannerController@updatebanner')->name('updatebanner');
          Route::get('deletebanner/delete/{id}', 'BannerController@deletebanner')->name('deletebanner');

  
          // for cityadmin
          Route::get('franchise', 'cityadminController@cityadmin')->name('cityadmin');
          Route::get('franchise/add', 'cityadminController@Addcityadmin')->name('add-cityadmin');
          Route::post('franchise/add/new', 'cityadminController@AddNewcityadmin')->name('AddNewcityadmin');
          Route::get('franchise/edit/{id}', 'cityadminController@Editcityadmin')->name('edit-cityadmin');
          Route::post('franchise/update/{id}', 'cityadminController@Updatecityadmin')->name('update-cityadmin');
          Route::get('franchise/delete/{id}', 'cityadminController@deletecityadmin')->name('delete-cityadmin');
          Route::get('secretlogin/{id}', 'cityadminController@secretlogin')->name('secret-login');
          Route::get('franchise-partner-list/{id}', 'cityadminController@vendorlist')->name('cityadminvendorlist');
          Route::get('secretlogin-partner/{id}', 'cityadminController@secretloginvendor')->name('secretloginvendor');
          Route::get('admincommission/{id}', 'cityadminController@admincommission')->name('admincommission');
     
     
          // for Member Plan
          Route::get('all_plan', 'Membership_plan@all_plan')->name('all_plan');
          Route::get('add_plan', 'Membership_plan@AddPlan')->name('add_plan');
          Route::post('insert_plan', 'Membership_plan@InsertPlan')->name('InsertPlan');
          Route::get('edit_plan/{id}', 'Membership_plan@EditPlan')->name('EditPlan');
          Route::post('update_plan/{plan_id}', 'Membership_plan@UpdatePlan')->name('UpdatePlan');
          Route::get('delete_paln/{id}', 'Membership_plan@DeletePaln')->name('DeletePaln');
     
     
          // for User Management
          Route::get('users', 'UsermanageContoller@allusers')->name('alluser');
          Route::get('users/edit/{id}', 'UsermanageContoller@edituser')->name('edit-users');
          Route::post('users/update/{id}', 'UsermanageContoller@Updateuser')->name('update-users');
          Route::get('users/delete/{id}', 'cityadminController@deletecityadmin')->name('delete-cityadmin');

          // for wallet_credits
          Route::get('wallet_credits', 'WalletController@wallet_credits')->name('wallet_credits');
          Route::get('wallet_credits/edit/{id}', 'WalletController@Editwallet_credits')->name('edit-wallet_credits');
          Route::post('wallet_credits/update/{id}', 'WalletController@Updatewallet_credits')->name('update-wallet_credits');
          //currency
          Route::get('currency', 'currencyController@currency')->name('currency');
          Route::get('currency/edit/{id}', 'currencyController@Editcurrency')->name('edit-currency');
          Route::post('currency/update/{id}', 'currencyController@Updatecurrency')->name('update-currency');
      
   
          //delivery_timing
          Route::get('delivery_timing', 'delivery_timingController@delivery_timing')->name('delivery_timing');
          Route::get('delivery_timing/edit/{id}', 'delivery_timingController@Editdelivery_timing')->name('edit-delivery_timing');
          Route::post('delivery_timing/update/{id}', 'delivery_timingController@Updatedelivery_timing')->name('update-delivery_timing');
   
      
          //for manage spldays
          Route::get('spldays', 'spldaysController@spldays')->name('spldays');
          Route::get('spldays/add', 'spldaysController@adminAddspldays')->name('adminAddspldays');
          Route::post('spldays/add/new', 'spldaysController@adminAddNewspldays')->name('adminAddNewspldays');
          Route::get('spldays/edit/{spldays_id}', 'spldaysController@adminEditspldays')->name('adminEditspldays');
          Route::post('spldays/update/{spldays_id}', 'spldaysController@adminUpdatespldays')->name('adminUpdatespldays');
          Route::get('spldays/delete/{spldays_id}', 'spldaysController@adminDeletespldays')->name('adminDeletespldays');
 
          //for manage plans
          Route::get('plan', 'PlanController@plan')->name('plan');
          Route::get('plan/add', 'PlanController@adminAddplan')->name('adminAddplan');
          Route::post('plan/add/new', 'PlanController@adminAddNewplan')->name('adminAddNewplan');
          Route::get('plan/edit/{plan_id}', 'PlanController@adminEditplan')->name('adminEditplan');
          Route::post('plan/update/{plan_id}', 'PlanController@adminUpdateplan')->name('adminUpdateplan');
          Route::get('plan/delete/{plan_id}', 'PlanController@adminDeleteplan')->name('adminDeleteplan');
       
       
          // for reward
          Route::get('RewardList', 'RewardController@RewardList')->name('RewardList');
          Route::get('reward', 'RewardController@reward')->name('reward');
          Route::post('rewardadd', 'RewardController@rewardadd')->name('rewardadd');
          Route::get('rewardedit/{reward_id}', 'RewardController@rewardedit')->name('rewardedit');
          Route::post('rewardupate', 'RewardController@rewardupate')->name('rewardupate');
          Route::get('rewarddelete/{reward_id}', 'RewardController@rewarddelete')->name('rewarddelete');
     
          // for reedem
          Route::get('reedem', 'RedeemController@reedem')->name('reedem');
          Route::post('reedemupdate', 'RedeemController@reedemupdate')->name('reedemupdate');
      
          // App Reffer
          Route::get('reffer', 'AppRefferController@reffer')->name('reffer');
          Route::post('refferupdate', 'AppRefferController@refferupdate')->name('refferupdate');
       
       
          //for manage Complain
          Route::get('complain', 'complainController@complain')->name('complain');
          Route::get('complain/add', 'complainController@adminAddcomplain')->name('adminAddcomplain');
          Route::post('complain/add/new', 'complainController@adminAddNewcomplain')->name('adminAddNewcomplain');
          Route::get('complain/edit/{complain_id}', 'complainController@adminEditcomplain')->name('adminEditcomplain');
          Route::post('complain/update/{complain_id}', 'complainController@adminUpdatecomplain')->name('adminUpdatecomplain');
          Route::get('complain/delete/{complain_id}', 'complainController@adminDeletecomplain')->name('adminDeletecomplain');
          //for manage faq
          Route::get('faq', 'faqController@faq')->name('faq');
          Route::get('faq/add', 'faqController@adminAddfaq')->name('adminAddfaq');
          Route::post('faq/add/new', 'faqController@adminAddNewfaq')->name('adminAddNewfaq');
          Route::get('faq/edit/{faq_id}', 'faqController@adminEditfaq')->name('adminEditfaq');
          Route::post('faq/update/{faq_id}', 'faqController@adminUpdatefaq')->name('adminUpdatefaq');
          Route::get('faq/delete/{faq_id}', 'faqController@adminDeletefaq')->name('adminDeletefaq');
       
          //Term & Condition
          Route::get('termcondition', 'TermConditionController@termcondition')->name('termcondition');
          Route::post('termconditionupdate/{id}', 'TermConditionController@termconditionupdate')->name('termconditionupdate');
       
          //About Us
          Route::get('aboutus', 'TermConditionController@aboutus')->name('aboutus');
          Route::post('aboutusupdate/{id}', 'TermConditionController@aboutusupdate')->name('aboutusupdate');
          //Feedback
          Route::get('Feedback', 'TermConditionController@Feedback')->name('Feedback');
          //App Share
          Route::get('termcondition', 'TermConditionController@termcondition')->name('termcondition');
          Route::post('termconditionupdate/{id}', 'TermConditionController@termconditionupdate')->name('termconditionupdate');
    
          //for manage cancel_reason
          Route::get('cancel_reason', 'cancel_reasonController@cancel_reason')->name('cancel_reason');
          Route::get('cancel_reason/add', 'cancel_reasonController@adminAddcancel_reason')->name('adminAddcancel_reason');
          Route::post('cancel_reason/add/new', 'cancel_reasonController@adminAddNewcancel_reason')->name('adminAddNewcancel_reason');
          Route::get('cancel_reason/edit/{res_id}', 'cancel_reasonController@adminEditcancel_reason')->name('adminEditcancel_reason');
          Route::post('cancel_reason/update/{res_id}', 'cancel_reasonController@adminUpdatecancel_reason')->name('adminUpdatecancel_reason');
          Route::get('cancel_reason/delete/{res_id}', 'cancel_reasonController@adminDeletecancel_reason')->name('adminDeletecancel_reason');
    
    
    
          //for notification
          Route::post('spldaynotification', 'spldaynotificationController@splnotification');
         
          //for admob

          // Route::get('admob','AdmobController@admob')->name('admob');
          // Route::get('admob/add','AdmobController@Addadmob')->name('addadmob');
          // Route::post('admob/add/insert','AdmobController@AddInsertadmob')->name('insert-admob');
          // Route::get('admob/edit/{id}','AdmobController@Editadmob')->name('edit-admob');
          // Route::post('admob/update/{id}','AdmobController@Updateadmob')->name('update-admob');
          // Route::get('admob/delete/{id}','AdmobController@Deleteadmob')->name('delete-admob');
 
 

          Route::post('store/add/insert', 'StoreController@AddInsertStore')->name('adminAddNewStore');
          Route::get('store/edit/{store_id}', 'StoreController@EditStore')->name('edit-store');
          Route::post('store/update/{store_id}', 'StoreController@Updatestore')->name('update-store');
          Route::get('store/delete/{store_id}', 'StoreController@Deletestore')->name('delete-store');
     
          //for user
          Route::get('user', 'UserController@adminUser')->name('user');
          Route::get('user/add', 'UserController@adminAddUser')->name('addUser');
          Route::post('user/add/insert', 'UserController@adminAddUserNew')->name('AddUserNew');
          Route::get('user/edit/{user_id}', 'UserController@EditUser')->name('edit-user');
          Route::post('user/update/{user_id}', 'UserController@UpdateEdit')->name('update-user');
          Route::get('user/delete/{user_id}', 'UserController@adminDeleteUser')->name('delete-banner');
    
    
          // for first wallet recharge deal
          Route::get('deal', 'dealController@deal')->name('deal');
          Route::get('deal/add', 'dealController@Adddeal')->name('add-deal');
          Route::post('deal/add/new', 'dealController@AddNewdeal')->name('AddNewdeal');
          Route::get('deal/edit/{id}', 'dealController@Editdeal')->name('edit-deal');
          Route::post('deal/update/{id}', 'dealController@Updatedeal')->name('update-deal');
          Route::get('deal/delete/{id}', 'dealController@deletedeal')->name('delete-deal');
         
         
         
          //for manage paymentvia
          Route::get('paymentvia', 'paymentviaController@paymentvia')->name('paymentvia');
          Route::get('paymentvia/add', 'paymentviaController@adminAddpaymentvia')->name('adminAddpaymentvia');
          Route::post('paymentvia/add/new', 'paymentviaController@adminAddNewpaymentvia')->name('adminAddNewpaymentvia');
          Route::get('paymentvia/edit/{paymentvia_id}', 'paymentviaController@adminEditpaymentvia')->name('adminEditpaymentvia');
          Route::post('paymentvia/update/{paymentvia_id}', 'paymentviaController@adminUpdatepaymentvia')->name('adminUpdatepaymentvia');
          Route::get('paymentvia/delete/{paymentvia_id}', 'paymentviaController@adminDeletepaymentvia')->name('adminDeletepaymentvia');
          //sms api
          Route::get('edit_sms_api', 'sms_apiController@edit_sms_api')->name('edit_sms_api');
          Route::post('update_sms_api', 'sms_apiController@update_sms_api')->name('update_sms_api');
          Route::post('twilio/update', 'sms_apiController@updatetwilio')->name('updatetwilio');
          Route::post('msgoff', 'sms_apiController@msgoff')->name('msgoff');
     
          //FCM key
          Route::get('edit_fcm_api', 'Fcm_Controller@edit_fcm_api')->name('edit_fcm_api');
          Route::post('update_fcm_api', 'Fcm_Controller@update_fcm_api')->name('update_fcm');
     
          // country code
          Route::get('edit_countrycode', 'Fcm_Controller@edit_countrycode')->name('edit_countrycode');
          Route::post('update_countrycode', 'Fcm_Controller@update_countrycode')->name('update_countrycode');
    
          //for notification
          Route::get('adminNotification', 'notificationController@adminNotification')->name('adminNotification');
          Route::post('adminNotificationSend', 'notificationController@adminNotificationSend')->name('adminNotificationSend');
    
          //for vendor notification
          Route::get('Notification_to_store', 'notificationController@Notification_to_store')->name('Notification_to_store');
          Route::post('Notification_to_store_Send', 'notificationController@Notification_to_store_Send')->name('Notification_to_store_Send');
    
          Route::get('map_api', 'SettingController@mapsettings')->name('mapapi');
          Route::post('map_api/update', 'SettingController@updategooglemap')->name('updatemap');
          Route::post('mapbox/update', 'SettingController@updatemapbox')->name('updatemapbox');
      
          Route::get('admincomission', 'ComissionController@admincomission')->name('admincomission');
          Route::post('adminsearchcomission', 'ComissionController@adminsearchcomission')->name('adminsearchcomission');
          Route::get('adminallexcelgenerator', 'ComissionController@adminallexcelgenerator')->name('adminallexcelgenerator');
          Route::get('adminexcelgenerator/{startdate}/{enddate}/{vendor_id}', 'ComissionController@adminexcelgenerator')->name('adminexcelgenerator');
          Route::get('adminsendrequest/{com_id}', 'ComissionController@adminsendrequest')->name('adminsendrequest');
          Route::get('admin_notification', 'notificationController@admin_notification')->name('admin-notification');

          Route::get('vendorallexcelgenerator/{id}', 'cityadminController@vendorallexcelgenerator')->name('vendorallexcelgenerator');
          Route::post('vendorsearchcomission', 'cityadminController@vendorsearchcomission')->name('vendorsearchcomission');
          Route::get('vendorexcelgenerator/{startdate}/{enddate}/{vendor_id}', 'cityadminController@vendorexcelgenerator')->name('vendorexcelgenerator');
  
          Route::post('/country-city', 'cityadminController@cities')->name('country.city');
          Route::post('/country-currency', 'cityadminController@currency')->name('country.currency');
      });