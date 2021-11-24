<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'api','namespace'=>'Api'], function () {



    //================================ Chat ============================================

    Route::get('/dp-send-msg', 'Chat\ChatController@dp_send_msg');
    //================================ End Chat ============================================


    Route::post('/login-check', 'LoginController@index');
      Route::post('/app-login', 'LoginController@Login');
      Route::post('/app-register', 'LoginController@Register');
    //////address///////
    Route::post('add_address', 'AddressController@address');
    Route::post('city', 'AddressController@city');
    Route::post('area', 'AddressController@society');
    Route::post('show_address', 'AddressController@show_address');
    Route::post('select_address', 'AddressController@select_address');
    Route::post('edit_address', 'AddressController@edit_add');
    Route::post('remove_address', 'AddressController@rem_user_address');
    Route::post('area_city_charges', 'AddressController@area_city_charges');
    Route::post('address_selection', 'AddressController@address_selection');
    // feferal code
    Route::post('signUprefer', 'RefralController@signUprefer');
    
    /////admin Banner
    Route::get('adminbanner', 'AdminBannerController@adminbanner');
    //Vendor Banner
    Route::post('vendorbanner', 'bannerController@vendorbanner');
    //for category and subcategory
    Route::post('appcategory', 'categoryController@category');
    Route::post('appsubcategory', 'categoryController@subcat');
    Route::post('appproduct', 'categoryController@product');
    
    Route::post('newhomecategory', 'categoryController@homecat');
    
    ////coupon
    Route::post('coupon_list', 'CouponController@coupon_list');
    Route::post('apply_coupon', 'CouponController@apply_coupon');
    //for Nearby Store
    Route::post('nearbystore', 'NearbystoreController@nearbystore');
    //order
    Route::post('order', 'OrderController@order');
    Route::post('checkout', 'OrderController@checkout');
    // cancel order
    Route::post('cancel_order', 'OrderController@cancel_order');
    // completed order
    Route::post('completed_orders1', 'OrderController@completed_orders1');
    // cancel order history
    Route::post('cancelorderhistory', 'OrderController@cancelorderhistory');
    // ongoing order
    Route::post('ongoingorders', 'OrderController@ongoingorders');
    
    //for timeslot
    Route::post('timeslot', 'TimeslotController@timeslot');
    //for user
    Route::post('user_register', 'UserController@signUp');
    Route::post('verify_phone', 'UserController@verifyPhone');
    Route::post('forgot_password', 'UserController@forgotPassword');
    Route::post('verify_otp', 'UserController@verifyOtp');
    Route::post('change_password', 'UserController@changePassword');
    Route::post('login', 'UserController@login');
    Route::post('checkotp', 'UserController@checkOTP');
    Route::post('checkuser', 'UserController@checkuser');
    //for profile
    Route::post('myprofile', 'UserController@myprofile');
    //for promocode
    Route::post('promocode_regenerate', 'UserController@promocode_regenerate');
    ///vendor category
    Route::get('vendorcategory', 'VendorCategoryController@vendorcategory');
    // complaint list
    Route::get('showcomplain', 'complainController@showcomplain');
    //rewads Points
    Route::post('redeem', 'RewardController@redeem');
    Route::post('rewardvalues', 'RewardController@rewardvalues');
    Route::post('after_order_reward_msg', 'RewardController@after_order_reward_msg');
    Route::post('after_order_reward_msg_new', 'RewardController@after_order_reward_msg_new');
    Route::post('rewardhistory', 'RewardController@rewardhistory');
    Route::post('stock_check', 'RewardController@stock_check');
    //for app currency
    Route::get('currency', 'categoryController@currency');
    //for product search
    Route::post('search_keyword', 'searchController@searchingFor');
    Route::post('resturantsearchingFor', 'searchController@resturantsearchingFor');
    
    //for Nearby Store
    Route::post('nearbystore', 'NearbystoreController@nearbystore');
    // apply coupon
    Route::post('coupon_list', 'CouponController@coupon_list');
    Route::post('apply_coupon', 'CouponController@apply_coupon');
    //wallet
    Route::post('showcredit', 'walletController@showcredit');
    Route::post('credit_history', 'walletController@credit_history');
    //term & condition
    Route::get('termcondition', 'TermConditionController@termcondition');
    Route::post('support', 'TermConditionController@support');
    Route::get('aboutus', 'TermConditionController@aboutus');
    Route::get('reffermessage', 'walletController@reffermessage');
    //for Payment Mode
    Route::post('paymentvia', 'paymentController@payment_mode');
    //deal products
    Route::post('dealproduct', 'OrderController@dealproduct');
    
    
    // store
    Route::post('storelogin', 'StoreLoginController@storelogin');
    Route::post('storeverifyphone', 'StoreLoginController@storeverifyphone');
    Route::post('storeprofile', 'StoreLoginController@storeprofile');
    Route::post('store_timming', 'StoreLoginController@store_timming');
    
    Route::post('storeprofile_edit', 'StoreLoginController@storeprofile_edit');
    Route::post('store_status', 'StoreLoginController@store_status');
    Route::post('store_current_status', 'StoreLoginController@store_current_status');

    Route::post('store_today_order', 'StoreOrderController@store_today_order');
    Route::post('store_next_day_order', 'StoreOrderController@store_next_day_order');
    Route::post('store_complete_order', 'StoreOrderController@store_complete_order');
    
    Route::post('store_delivery_boy', 'StoreOrderController@store_delivery_boy');
    Route::post('assigned_store_order', 'StoreOrderController@assigned_store_order');
    
    Route::post('store_category', 'StoreProductController@store_category');
    Route::post('store_subcategory', 'StoreProductController@store_subcategory');
    
    Route::post('store_subcategoryshow', 'StoreProductController@store_subcategoryshow');
    Route::post('store_subcategoryproduct', 'StoreProductController@store_subcategoryproduct');
    Route::post('store_addproductvariant', 'StoreProductController@store_addproductvariant');
    Route::post('store_updateproductvariant', 'StoreProductController@store_updateproductvariant');
    
    Route::post('store_products', 'StoreProductController@store_products');
    Route::post('store_addproduct', 'StoreProductController@store_addproduct');
    Route::post('store_addnewproduct', 'StoreProductController@store_addnewproduct');
    Route::get('store_editnewproduct/{product_id}', 'StoreProductController@store_editnewproduct');
    Route::post('store_updatenewproduct', 'StoreProductController@store_updatenewproduct');
    Route::delete('store_deleteproduct/{product_id}', 'StoreProductController@store_deleteproduct');
    Route::get('store_varient/{product_id}', 'StoreProductvarientController@store_varient');
    Route::get('store_addvariant/{product_id}', 'StoreProductvarientController@store_addvariant');
    Route::post('store_addnewvariant', 'StoreProductvarientController@store_addnewvariant');
    Route::get('store_editvariant/{varient_id}', 'StoreProductvarientController@store_editvariant');
    Route::post('store_updatevariant', 'StoreProductvarientController@store_updatevariant');
    Route::delete('store_deletevariant/{varient_id}', 'StoreProductvarientController@store_deletevariant');
    
    Route::post('store_dealproduct', 'StoreDealproductController@store_dealproduct');
    Route::post('store_adddealproduct', 'StoreDealproductController@store_adddealproduct');
    Route::post('store_addnewdealproduct', 'StoreDealproductController@store_addnewdealproduct');
    Route::get('store_editdealproduct/{deal_id}', 'StoreDealproductController@store_editdealproduct');
    Route::post('store_updatedealproduct', 'StoreDealproductController@store_updatedealproduct');
    Route::delete('store_deletedealproduct/{deal_id}', 'StoreDealproductController@store_deletedealproduct');
   
    Route::post('store_deliveryboy', 'StoreDeliveryboyController@store_deliveryboy');
    Route::post('store_adddeliveryboy', 'StoreDeliveryboyController@store_adddeliveryboy');
    Route::post('store_addnewdeliveryboy', 'StoreDeliveryboyController@store_addnewdeliveryboy');
    Route::get('store_editdeliveryboy/{deliveryboy_id}', 'StoreDeliveryboyController@store_editdeliveryboy');
    Route::post('store_updatedeliveryboy', 'StoreDeliveryboyController@store_updatedeliveryboy');
    Route::delete('store_deletedeliveryboy/{deliveryboy_id}', 'StoreDeliveryboyController@store_deletedeliveryboy');
    Route::post('store_confirmdeliveryboy', 'StoreDeliveryboyController@store_confirmdeliveryboy');
   
    //for banner
    Route::post('homebanner', 'bannerController@homebanner');
    Route::post('home2banner', 'bannerController@home2banner');
    Route::post('catbanner', 'bannerController@catbanner');
    
    //for subscription plan
    Route::post('planlist', 'planController@planlist');
    
    //For city list
    Route::post('showcity', 'cityController@showcity');
    // Route::post('city', 'cityController@city');
    
    //order
    
    // Route::post('order', 'OrderController@order');
    
    //for showing area list
    Route::post('showarea', 'cityController@showarea');
    //for showing vendors list
    Route::post('showvendors', 'cityController@showvendors');
     
    // Notification for users
    Route::post('notificationlist', 'notificationController@notificationlist');
    Route::post('read_by_user', 'notificationController@read_by_user');
    Route::post('mark_all_as_read', 'notificationController@mark_all_as_read');
    
    
    //insert data at the time of subscribe
    Route::post('subscribe', 'subController@subscription');
    Route::post('buyonce', 'subController@buyonce');
    
    //for my subscription
    Route::post('modifysubs', 'subController@modifysubs');
    Route::post('pauseorders', 'subController@pause_order');
    Route::post('resumeorders', 'subController@resume_order');
    Route::post('showsubscription', 'subController@showsubscription');
    Route::post('showcart', 'subController@showcart');
    
    //for App Logo
    Route::post('logo', 'logoController@logo');
    
    
    //subscription of the day
    Route::post('subscriptionoftheday', 'subController@subscriptionoftheday');
    
    //delete order
    Route::get('cancelreasons', 'subController@reasonofcancellist');
    Route::post('delete_order', 'subController@delete_order');
    
   
    Route::post('show_recharge_history', 'walletController@show_recharge_history');
    //cash recharge request
    Route::post('cash_recharge', 'collectcashController@cashrequest');
    
    
    
    //complain
    
    Route::post('report_issue', 'complainController@report_issue');
    Route::post('showcompleted', 'complainController@showcompleted');
   
    //for FAQ
    Route::post('faq', 'faqController@faq');
    
    //notificationby
    Route::post('notificationby', 'notificationbyController@notificationby');
    
    //for delivery timing
    Route::post('subsdelivery_timing', 'delivery_timingController@delivery_timing');
    
    //for schedule
    Route::post('schedule', 'subController@scheduled');
    
    
    
    //total bill ,last recharge, current balance
    Route::post('total_bill', 'walletController@totalbill');
    
    //billing history
    Route::post('credit_history', 'walletController@credit_history');
    Route::post('billing_history', 'walletController@billing_history');
    
     
    //delivery boy
    Route::post('dboylogin', 'deliveryboyController@dboylogin');
    Route::post('dboyprofile', 'deliveryboyController@dboyprofile');
    Route::post('dboytoday_orders', 'deliveryboyController@today_orders');
    Route::post('dboynextday_orders', 'deliveryboyController@nextday_orders');
     
    Route::post('marked', 'deliveryboyController@marked');
    Route::post('update_loc', 'deliveryboyController@update_loc');
    Route::post('dboyincentive', 'deliveryboyController@dboyincentive');
    Route::post('dboycompleted', 'deliveryboyController@dboycompleted');
    Route::post('not_accepted', 'deliveryboyController@not_accepted');
    Route::post('cityadmin_address', 'deliveryboyController@cityadmin_address');
    Route::post('generateDeliveredOtp', 'deliveryboyController@generateDeliveredOtp');
    Route::get('delievery_boy_city', 'deliveryboyController@delieveryboycity');
    Route::post('delievery_boy_sign_up', 'deliveryboyController@delieveryboysignup');
     
    Route::post('sendotpformarked', 'deliveryboyController@sendotpformarked');
    Route::post('verifyotpformarked', 'deliveryboyController@verifyotpformarked');
    Route::post('dboyforgetpassword', 'deliveryboyController@dboyforgetpassword');
    Route::post('dboyverifyotp', 'deliveryboyController@dboyverifyotp');
    Route::post('dboychangepassword', 'deliveryboyController@dboychangepassword');
     
    //Manager
    Route::post('managerlogin', 'managerController@managerlogin');
    Route::post('managerprofile', 'managerController@managerprofile');
    Route::post('managertoday_orders', 'managerController@managertoday_orders');
    Route::post('managernextday_orders', 'managerController@managernextday_orders');
    Route::post('showdelivery_boys', 'managerController@showdelivery_boys');
     
    Route::post('cancelOrder', 'managerController@cancelOrder');
     
    Route::post('appassign', 'managerController@appassign');
    Route::post('show_product', 'managerController@show_product');
    Route::post('incstock', 'managerController@incstock');
     
     
    //cash recharge
    Route::post('today_cashcollection', 'deliveryboyController@today_cashcollection');
    Route::post('mark_collected', 'deliveryboyController@mark_collected');
    
    //MemberPlanController
    Route::post('memberplanlist', 'MemberController@MemberPlanList');
    Route::post('memberplanpurchase', 'MemberController@MemberPlanPurchase');
    
    
    Route::post('timesloteproduct', 'TimeslotProductController@TimeslotProductController');
    
    Route::post('vendor_orderlist', 'Vendor_OrderController@vendor_orderlist');
    
    Route::post('product_vendor', 'TestController@product_vendor');
    
    Route::post('Today_order', 'TestController@Today_order');
    
    Route::post('Next_order', 'TestController@Next_order');
    
    Route::post('complete_order', 'TestController@complete_order');
    Route::post('cate', 'Restaurant_productController@cate');
    
    Route::post('financial', 'financial_reportController@financial');
    // for request send
    Route::post('vendor_order_list', 'PaymentRequestController@vendor_order_list');
    Route::post('send_request', 'PaymentRequestController@send_request');
     
     
    /////Delivery Boy//////
    Route::post('driverlogin', 'DriverloginController@driver_login');
    Route::post('driver_profile', 'DriverloginController@driverprofile');
    Route::post('completed_orders', 'DriverOrderController@completed_orders');
    Route::post('ordersfortoday', 'DriverOrderController@ordersfortoday');
    Route::post('ordersfornextday', 'DriverOrderController@ordersfornextday');
    Route::post('delivery_accepted', 'DriverOrderController@delivery_accepted');
    Route::post('delivery_out', 'DriverOrderController@delivery_out');
    Route::post('delivery_completed', 'DriverOrderController@delivery_completed');
    Route::post('dboy_status', 'DriverstatusController@dboy_status');
    Route::post('delievery_boy_phone_verify', 'DriverloginController@delieveryboyphoneverify');
    Route::post('cashcollect', 'DriverOrderController@cashcollect');
    Route::post('driverstatus', 'DriverloginController@driverstatus');
    ////Restaurant/////
    Route::post('homecategory', 'Restaurant_productController@allproduct');
    Route::post('popular_item', 'Restaurant_productController@popular_item');
    Route::post('resturant_banner', 'AdminBannerController@resturant_banner');
    Route::post('returant_order', 'ResturantOrderController@returant_order');
    Route::post('orderplaced', 'ResturantOrderController@orderplaced');
    Route::post('order_cancel', 'ResturantOrderController@order_cancel');
    Route::post('user_completed_orders', 'ResturantOrderController@user_completed_orders');
    Route::post('user_cancel_order_history', 'ResturantOrderController@user_cancel_order_history');
    Route::post('user_ongoing_order', 'ResturantOrderController@user_ongoing_order');
    
    //Restaurant Vendor/////
    Route::post('vendor_today_order', 'RestaurantVendorOrderController@vendor_today_order');
    Route::post('resturant_complete_order', 'RestaurantVendorOrderController@resturant_complete_order');
    Route::post('resturant_products', 'Restaurant_VendorProductController@resturant_products');
    Route::post('resturant_addnewproduct', 'Restaurant_VendorProductController@resturant_addnewproduct');
    Route::post('resturant_updatenewproduct', 'Restaurant_VendorProductController@resturant_updatenewproduct');
    Route::post('resturant_deleteproduct', 'Restaurant_VendorProductController@resturant_deleteproduct');
    Route::post('resturant_category', 'Restaurant_VendorProductController@resturant_category');
    Route::post('resturant_product', 'Restaurant_VendorProductController@resturant_product');
    Route::post('resturant_addproductvariant', 'Restaurant_VendorProductController@resturant_addproductvariant');
    Route::post('resturant_updateproductvariant', 'Restaurant_VendorProductController@resturant_updateproductvariant');
    Route::post('resturant_addnewvariant', 'Restaurant_VendorProductController@resturant_addnewvariant');
    Route::post('resturant_updatevariant', 'Restaurant_VendorProductController@resturant_updatevariant');
    Route::post('resturant_deletevariant', 'Restaurant_VendorProductController@resturant_deletevariant');
    Route::post('resturant_addaddons', 'Restaurant_VendorProductController@resturant_addaddons');
    Route::post('resturant_addaddons_update', 'Restaurant_VendorProductController@resturant_addaddons_update');
    Route::post('resturant_deleteaddon', 'Restaurant_VendorProductController@resturant_deleteaddon');
    
    //Restaurant Delivery Boy
    Route::post('dboy_completed_order', 'RestaurantDriverOrderController@dboy_completed_order');
    Route::post('dboy_today_order', 'RestaurantDriverOrderController@dboy_today_order');
    Route::post('dboy_nextday_order', 'RestaurantDriverOrderController@dboy_nextday_order');
    Route::post('delivery_accepted_by_dboy', 'RestaurantDriverOrderController@delivery_accepted_by_dboy');
    Route::post('resturant_delivery_completed', 'RestaurantDriverOrderController@resturant_delivery_completed');
    Route::post('resturant_delivery_out', 'RestaurantDriverOrderController@resturant_delivery_out');
    Route::post('today_order_count', 'RestaurantDriverOrderController@today_order_count');
    
    ////Pharmacy/////
    Route::post('pharmacy_homecategory', 'Pharmacy_productController@allproduct');
    Route::post('pharmacy_popular_item', 'Pharmacy_productController@popular_item');
    Route::post('pharmacy_banner', 'AdminBannerController@pharmacy_banner');
    Route::post('pharmacy_order', 'PharmacyOrderController@pharmacy_order');
    Route::post('pharmacy_orderplaced', 'PharmacyOrderController@pharmacy_orderplaced');
    Route::post('pharmacy_order_cancel', 'PharmacyOrderController@pharmacy_order_cancel');
    Route::post('pharmacy_user_completed_orders', 'PharmacyOrderController@pharmacy_user_completed_orders');
    Route::post('pharmacy_user_cancel_order_history', 'PharmacyOrderController@pharmacy_user_cancel_order_history');
    Route::post('pharmacy_user_ongoing_order', 'PharmacyOrderController@pharmacy_user_ongoing_order');
        
    //Pharmacy Vendor/////
    Route::post('pharmacy_today_order', 'PharmacyVendorOrderController@pharmacy_today_order');
    Route::post('pharmacy_next_day_order', 'PharmacyVendorOrderController@pharmacy_next_day_order');
    Route::post('pharmacy_complete_order', 'PharmacyVendorOrderController@pharmacy_complete_order');
    Route::post('pharmacy_products', 'Pharmacy_VendorProductController@pharmacy_products');
    Route::post('pharmacy_addnewproduct', 'Pharmacy_VendorProductController@pharmacy_addnewproduct');
    Route::post('pharmacy_updatenewproduct', 'Pharmacy_VendorProductController@pharmacy_updatenewproduct');
    Route::post('pharmacy_deleteproduct', 'Pharmacy_VendorProductController@pharmacy_deleteproduct');
    Route::post('pharmacy_category', 'Pharmacy_VendorProductController@pharmacy_category');
    Route::post('pharmacy_product', 'Pharmacy_VendorProductController@pharmacy_product');
    Route::post('pharmacy_addproductvariant', 'Pharmacy_VendorProductController@pharmacy_addproductvariant');
    Route::post('pharmacy_updateproductvariant', 'Pharmacy_VendorProductController@pharmacy_updateproductvariant');
    Route::post('pharmacy_addnewvariant', 'Pharmacy_VendorProductController@pharmacy_addnewvariant');
    Route::post('pharmacy_updatevariant', 'Pharmacy_VendorProductController@pharmacy_updatevariant');
    Route::post('pharmacy_deletevariant', 'Pharmacy_VendorProductController@pharmacy_deletevariant');
    Route::post('pharmacy_addaddons', 'Pharmacy_VendorProductController@pharmacy_addaddons');
    Route::post('pharmacy_addaddons_update', 'Pharmacy_VendorProductController@pharmacy_addaddons_update');
    Route::post('pharmacy_deleteaddon', 'Pharmacy_VendorProductController@pharmacy_deleteaddon');
    
    //Pharmacy Delivery Boy
    Route::post('pharmacy_dboy_completed_order', 'PharmacyDriverOrderController@pharmacy_dboy_completed_order');
    Route::post('pharmacy_dboy_today_order', 'PharmacyDriverOrderController@pharmacy_dboy_today_order');
    Route::post('pharmacy_dboy_nextday_order', 'PharmacyDriverOrderController@pharmacy_dboy_nextday_order');
    Route::post('pharmacy_delivery_accepted_by_dboy', 'PharmacyDriverOrderController@pharmacy_delivery_accepted_by_dboy');
    Route::post('pharmacy_delivery_completed', 'PharmacyDriverOrderController@pharmacy_delivery_completed');
    Route::post('pharmacy_delivery_out', 'PharmacyDriverOrderController@pharmacy_delivery_out');
    Route::post('pharmacy_today_order_count', 'PharmacyDriverOrderController@pharmacy_today_order_count');
       
    ////Parcel user/////

    Route::post('parcel_banner', 'AdminBannerController@parcel_banner');
    Route::post('parcel_detail', 'ParcelDetailController@parcel_detail');

    Route::post('parcel_charges', 'ParcelDetailController@parcel_charges');
    Route::post('parcel_orderplaced', 'ParcelDetailController@parcel_orderplaced');
    Route::post('parcel_after_order_reward_msg', 'ParcelDetailController@parcel_after_order_reward_msg');
    Route::post('parcel_user_ongoing_order', 'ParcelDetailController@parcel_user_ongoing_order');
    Route::post('parcel_user_cancel_order', 'ParcelDetailController@parcel_user_cancel_order');
    Route::post('parcel_user_completed_order', 'ParcelDetailController@parcel_user_completed_order');


    //Parcel Vendor/////
    Route::post('parcel_city', 'ParcelVendorController@parcel_city');
    Route::post('parcel_addcharges', 'ParcelVendorController@parcel_addcharges');

    Route::post('parcel_listcharges', 'ParcelVendorController@parcel_listcharges');
    Route::post('parcel_updatecharges', 'ParcelVendorController@parcel_updatecharges');
    Route::post('parcel_deletecharges', 'ParcelVendorController@parcel_deletecharges');
        
        
    //Parcel Delivery Boy
    Route::post('parcel_dboy_completed_order', 'ParcelDriverOrderController@parcel_dboy_completed_order');
    Route::post('parcel_dboy_today_order', 'ParcelDriverOrderController@parcel_dboy_today_order');
    Route::post('parcel_dboy_nextday_order', 'ParcelDriverOrderController@parcel_dboy_nextday_order');
    Route::post('parcel_delivery_accepted_by_dboy', 'ParcelDriverOrderController@parcel_delivery_accepted_by_dboy');
    Route::post('parcel_delivery_completed', 'ParcelDriverOrderController@parcel_delivery_completed');
    Route::post('parcel_delivery_out', 'ParcelDriverOrderController@parcel_delivery_out');
    Route::post('parcel_today_order_count', 'ParcelDriverOrderController@parcel_today_order_count');
});