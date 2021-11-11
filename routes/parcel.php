<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Parcel', 'prefix'=>'parcel'], function () {
    Route::get('/', 'RestaurantLoginController@resturantlogin')->name('parcellogin');
    Route::post('/checkresturantLogin', 'RestaurantLoginController@checkresturantLogin')->name('checkparcelLogin');
    Route::get('index', 'HomeController@vendorIndex')->name('parcel-index');
    Route::get('complete_order_index', 'HomeController@complete_order')->name('complete_order_index');
    //Vendor logout
    Route::get('resturantEditvendor/{id}', 'ProfileController@resturantEditvendor')->name('parcelEditvendor');
    Route::post('resturantvendorUpdateProfile/{id}', 'ProfileController@resturantvendorUpdateProfile')->name('parcelvendorUpdateProfile');
    Route::get('resturantvendorLogout', 'ProfileController@resturantvendorLogout')->name('parcelvendorLogout');


    //Charges
    Route::get('charges', 'ChargeController@chargeslist');
    Route::get('editcharge', 'ChargeController@editcharge')->name('editcharge');
    Route::get('deletecharge/{id}', 'ChargeController@deletecharge');
    Route::get('add-charge', 'ChargeController@addcharge')->name('addcharge');
    Route::post('add-charge', 'ChargeController@addchargesave');
    Route::get('editcharge/{id}', 'ChargeController@editcharge');
    Route::post('editcharge/{id}', 'ChargeController@updatecharge');

    //City
    Route::get('city', 'CityController@city');
    Route::get('add', 'CityController@Addcity');
    Route::post('insert-city', 'CityController@AddInsertcity');
    Route::get('edit-city/{id}', 'CityController@Editcity');
    Route::post('update-city/{id}', 'CityController@Updatecity');
    Route::get('delete-city/{id}', 'CityController@Deletecity');

    // Order////

    Route::get('today_order_parcel', 'Today_OrderController@today_order_parcel')->name('today_order_parcel');
    Route::get('parcel_next_day', 'Today_OrderController@parcel_next_day')->name('parcel_next_day');
    Route::get('parcel_complete_order', 'Today_OrderController@parcel_complete_order')->name('parcel_complete_order');
    Route::post('parcel_assigned_order', 'Today_OrderController@parcel_assigned_order')->name('parcel_assigned_order');
    Route::post('parcel_order_details', 'Today_OrderController@parcel_order_details')->name('parcel_order_details');
           
    // Route::get('incentive_order', 'Incentive_orderController@incentive_order')->name('incentive_order');
    // Route::post('pay_incentive', 'Incentive_orderController@pay_incentive')->name('pay_incentive');
    // Route::get('edit_incentive_order', 'Incentive_orderController@edit_incentive_order')->name('edit_incentive_order');
    // Route::post('update_incentive_order', 'Incentive_orderController@update_incentive_order')->name('update_incentive_order');
        
     
    // for banner
    Route::get('resturantbannervendor', 'BannervendorController@resturantbannervendor')->name('parcelbannervendor');
    Route::get('resturantAddbannervendor', 'BannervendorController@resturantAddbannervendor')->name('parcelAddbannervendor');
    Route::post('resturantAddNewbannervendor', 'BannervendorController@resturantAddNewbannervendor')->name('parcelAddNewbannervendor');
    Route::get('resturantEditbannervendor/{id}', 'BannervendorController@resturantEditbannervendor')->name('parcelEditbannervendor');
    Route::post('resturantUpdatebannervendor/{id}', 'BannervendorController@resturantUpdatebannervendor')->name('parcelUpdatebannervendor');
    Route::get('resturantdeletebannervendor/{id}', 'BannervendorController@resturantdeletebannervendor')->name('parceldeletebannervendor');
         

         
    // for sub-category
         
    //  Route::post('searchsubcat','subcatController@searchsubcat')->name('searchsubcat');
    //  Route::get('resturantsubcat','subcatController@parcelsubcat')->name('resturantsubcat');
    //  Route::get('parceladdsubcat','subcatController@resturantaddsubcat')->name('parceladdsubcat');
    //  Route::post('resturantAddNewsubcat','subcatController@parcelAddNewsubcat')->name('resturantAddNewsubcat');
    //  Route::get('parcelEditsubcat/{subcat_id}','subcatController@resturantEditsubcat')->name('parcelEditsubcat');
    //  Route::post('resturantUpdatesubcat/{subcat_id}','subcatController@parcelUpdatesubcat')->name('resturantUpdatesubcat');
    //  Route::get('parceldeletesubcat/{subcat_id}','subcatController@resturantdeletesubcat')->name('parceldeletesubcat');

    // for Products
         
    Route::get('resturantproduct', 'ProductController@product')->name('parcelproduct');
    Route::get('resturantaddproduct', 'ProductController@Addproduct')->name('parceladdproduct');
    Route::post('resturantaddnewproduct', 'ProductController@AddNewproduct')->name('parceladdnewproduct');
    Route::get('resturanteditproduct/{product_id}', 'ProductController@Editproduct')->name('parceleditproduct');
    Route::post('resturantupdateproduct/{product_id}', 'ProductController@Updateproduct')->name('parcelupdateproduct');
    Route::get('resturantdeleteproduct/{product_id}', 'ProductController@deleteproduct')->name('parceldeleteproduct');
    Route::post('searchproduct', 'ProductController@searchproduct')->name('searchproduct');

         
    // for Products variant
         
    Route::get('resturantvarient/{id}', 'VarientController@varient')->name('parcelvarient');
    Route::get('resturantAddproductvariant/{id}', 'VarientController@Addproductvariant')->name('parcelAddproductvariant');
    Route::post('resturantAddNewproductvariant', 'VarientController@AddNewproductvariant')->name('parcelAddNewproductvariant');
    Route::get('resturantEditproductvariant/{id}', 'VarientController@Editproductvariant')->name('parcelEditproductvariant');
    Route::post('resturantUpdateproductvariant/{id}', 'VarientController@Updateproductvariant')->name('parcelUpdateproductvariant');
    Route::get('deleteproductvariant/{id}', 'VarientController@deleteproductvariant')->name('deleteproductvariant');
         



     
         
    //   for area
    Route::get('parcelarea', 'areaController@parcelarea')->name('parcelarea');
    Route::get('parcelAddarea', 'areaController@parcelAddarea')->name('parcelAddarea');
    Route::post('parcelAddInsertarea', 'areaController@parcelAddInsertarea')->name('parcelAddInsertarea');
    Route::get('parcelEditarea/{id}', 'areaController@parcelEditarea')->name('parcelEditarea');
    Route::post('parcelUpdatearea/{id}', 'areaController@parcelUpdatearea')->name('parcelUpdatearea');
    Route::get('parcelDeletearea/{id}', 'areaController@parcelDeletearea')->name('parcelDeletearea');
         
    // for coupon
     
    Route::get('parcelcouponlist', 'CouponController@parcelcouponlist')->name('parcelcouponlist');
    Route::get('parcelcoupon', 'CouponController@parcelcoupon')->name('parcelcoupon');
    Route::post('parceladdcoupon', 'CouponController@parceladdcoupon')->name('parceladdcoupon');
    Route::get('parceleditcoupon/{coupon_id}', 'CouponController@parceleditcoupon')->name('parceleditcoupon');
    Route::post('parcelupdatecoupon', 'CouponController@parcelupdatecoupon')->name('parcelupdatecoupon');
    Route::get('parceldeletecoupon/{coupon_id}', 'CouponController@parceldeletecoupon')->name('parceldeletecoupon');
     
    // for delivery time
    Route::get('resturanttimeslot', 'TimeSlotController@resturanttimeslot')->name('parceltimeslot');
    Route::post('resturanttimeslotupdate', 'TimeSlotController@resturanttimeslotupdate')->name('parceltimeslotupdate');
     
     
    // for delivery_boy
    Route::get('parceldelivery_boy', 'delivery_boyController@parceldelivery_boy')->name('parceldelivery_boy');
    Route::get('parcelAdddelivery_boy', 'delivery_boyController@parcelAdddelivery_boy')->name('parcelAdddelivery_boy');
    Route::post('parcelAddNewdelivery_boy', 'delivery_boyController@parcelAddNewdelivery_boy')->name('parcelAddNewdelivery_boy');
    Route::get('parcelEditdelivery_boy/{id}', 'delivery_boyController@parcelEditdelivery_boy')->name('parcelEditdelivery_boy');
    Route::post('parcelUpdatedelivery_boy/{id}', 'delivery_boyController@parcelUpdatedelivery_boy')->name('parcelUpdatedelivery_boy');
    Route::get('parceldeletedelivery_boy/{id}', 'delivery_boyController@parceldeletedelivery_boy')->name('parceldeletedelivery_boy');
    Route::get('parcelconfirmdeliverystatus/{id}/{status}', 'delivery_boyController@parcelconfirmdeliverystatus')->name('parcelconfirmdeliverystatus');
         
    // for order details
     
    Route::get('details', 'Today_OrderController@details')->name('details');
         
    Route::get('inventoryvendor', 'inventoryController@inventoryvendor')->name('inventoryvendor');
    Route::post('paycustomervendor/{order_complain_id}', 'inventoryController@paycustomervendor')->name('paycustomervendor');
          
    Route::get('dispatch_panelvendor', 'DispatchvendorController@dispatch_panelvendor')->name('dispatch_panelvendor');
    Route::post('assignedcashrequestvendor', 'DispatchvendorController@assignedcashrequestvendor')->name('assignedcashrequestvendor');
         
    Route::get('resturantcomission', 'ComissionController@resturantcomission')->name('parcelcomission');
    Route::get('resturantsendrequest/{com_id}', 'ComissionController@resturantsendrequest')->name('parcelsendrequest');
    Route::post('resturantsearchcomission', 'ComissionController@resturantsearchcomission')->name('parcelsearchcomission');
    Route::get('resturantallexcelgenerator', 'ComissionController@resturantallexcelgenerator')->name('parcelallexcelgenerator');
    Route::get('resturantexcelgenerator/{startdate}/{enddate}', 'ComissionController@resturantexcelgenerator')->name('parcelexcelgenerator');
    Route::get('parceldelivery_boy_comission', 'delivery_boy_comissionController@parceldelivery_boy_comission')->name('parceldelivery_boy_comission');
    Route::post('resturantsearchdeliveryboy', 'delivery_boy_comissionController@resturantsearchdeliveryboy')->name('parcelsearchdeliveryboy');
    Route::get('resturantallexceldownload', 'delivery_boy_comissionController@resturantallexceldownload')->name('parcelallexceldownload');
    Route::get('resturantexceldownload/{startdate}/{enddate}', 'delivery_boy_comissionController@resturantexceldownload')->name('parcelexceldownload');
                
    //  Route::post('searchstock','Today_OrderController@searchstock')->name('searchstock');
    //  Route::get('low_stock','Today_OrderController@low_stock')->name('low_stock');
    //  Route::post('update_stock','Today_OrderController@update_stock')->name('update_stock');
         
    //for notification
    Route::get('vendor_notification', 'NotificationController@vendor_notification')->name('vendor-notification');
    Route::get('parcelcityadmindelivery_boy', 'delivery_boyController@parcelcityadmindelivery_boy')->name('parcelcityadmindelivery_boy');
});
