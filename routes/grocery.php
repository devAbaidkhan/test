<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Vendor', 'prefix'=>'grocery'], function () {
    Route::get('/', 'LoginController@vendorlogin')->name('vendorlogin');
    Route::post('/checklogin', 'LoginController@checkvendorLogin')->name('checkvendor-login');
    Route::get('index', 'HomeController@vendorIndex')->name('vendor-index');
    Route::get('complete_order_index', 'HomeController@complete_order')->name('complete_order_index');
    //Vendor logout
    Route::get('/vendor/edit/{id}', 'ProfileController@Editvendor')->name('vendor-edit');
    Route::post('update/profile/{id}', 'ProfileController@vendorUpdateProfile')->name('vendor-update');
    Route::get('logout', 'ProfileController@vendorLogout')->name('vendor-logout');

    Route::get('today_order_vendor', 'Today_OrderController@today_order_vendor')->name('today_order_vendor');
    Route::get('next_day', 'Today_OrderController@next_day')->name('next_day_order_vendor');
    Route::get('complete_order', 'Today_OrderController@complete_order')->name('complete_order');
    Route::post('assigned_order', 'Today_OrderController@assigned_order')->name('assigned_order');
    Route::post('assigned_vendor_order', 'DispatchvendorController@assignedvendor')->name('assigned_vendor_order');
           
    Route::get('incentive_order', 'Incentive_orderController@incentive_order')->name('incentive_order');
    Route::post('pay_incentive', 'Incentive_orderController@pay_incentive')->name('pay_incentive');
    Route::get('edit_incentive_order', 'Incentive_orderController@edit_incentive_order')->name('edit_incentive_order');
    Route::post('update_incentive_order', 'Incentive_orderController@update_incentive_order')->name('update_incentive_order');
        
     
    // for banner
    Route::get('bannervendor', 'BannervendorController@bannervendor')->name('bannervendor');
    Route::get('Addbannervendor', 'BannervendorController@Addbannervendor')->name('Addbannervendor');
    Route::post('AddNewbannervendor', 'BannervendorController@AddNewbannervendor')->name('AddNewbannervendor');
    Route::get('Editbannervendor/{id}', 'BannervendorController@Editbannervendor')->name('Editbannervendor');
    Route::post('Updatebannervendor/{id}', 'BannervendorController@Updatebannervendor')->name('Updatebannervendor');
    Route::get('deletebannervendor/{id}', 'BannervendorController@deletebannervendor')->name('deletebannervendor');
         
    // for category
         
    Route::get('vendorcategory', 'CategoryController@category')->name('vendorcategory');
    Route::get('vendorAddCategory', 'CategoryController@vendorAddCategory')->name('vendorAddCategory');
    Route::post('vendorAddNewCategory', 'CategoryController@vendorAddNewCategory')->name('vendorAddNewCategory');
    Route::get('vendorEditCategory/{category_id}', 'CategoryController@vendorEditCategory')->name('vendorEditCategory');
    Route::post('vendorUpdateCategory/{category_id}', 'CategoryController@vendorUpdateCategory')->name('vendorUpdateCategory');
    Route::get('vendorDeleteCategory/{category_id}', 'CategoryController@vendorDeleteCategory')->name('vendorDeleteCategory');
         
    // for sub-category
         
    Route::post('searchsubcat', 'subcatController@searchsubcat')->name('searchsubcat');
    Route::get('vendorsubcat', 'subcatController@vendorsubcat')->name('vendorsubcat');
    Route::get('vendorAddsubcat', 'subcatController@vendorAddsubcat')->name('vendorAddsubcat');
    Route::post('vendorAddNewsubcat', 'subcatController@vendorAddNewsubcat')->name('vendorAddNewsubcat');
    Route::get('vendorEditsubcat/{subcat_id}', 'subcatController@vendorEditsubcat')->name('vendorEditsubcat');
    Route::post('vendorUpdatesubcat/{subcat_id}', 'subcatController@vendorUpdatesubcat')->name('vendorUpdatesubcat');
    Route::get('vendordeletesubcat/{subcat_id}', 'subcatController@vendordeletesubcat')->name('vendordeletesubcat');

    // for Products
         
    Route::get('vendorproduct', 'ProductController@product')->name('vendorproduct');
    Route::get('vendoraddproduct', 'ProductController@Addproduct')->name('vendoraddproduct');
    Route::post('vendoraddnewproduct', 'ProductController@AddNewproduct')->name('vendoraddnewproduct');
    Route::get('vendoreditproduct/{product_id}', 'ProductController@Editproduct')->name('vendoreditproduct');
    Route::post('vendorupdateproduct/{product_id}', 'ProductController@Updateproduct')->name('vendorupdateproduct');
    Route::get('vendordeleteproduct/{product_id}', 'ProductController@vendordeleteproduct')->name('vendordeleteproduct');
    Route::post('searchproduct', 'ProductController@searchproduct')->name('searchproduct');

         
    // for Products variant
         
    Route::get('varient/{id}', 'VarientController@varient')->name('varient');
    Route::get('Addproductvariant/{id}', 'VarientController@Addproductvariant')->name('Addproductvariant');
    Route::post('AddNewproductvariant', 'VarientController@AddNewproductvariant')->name('AddNewproductvariant');
    Route::get('Editproductvariant/{id}', 'VarientController@Editproductvariant')->name('Editproductvariant');
    Route::post('Updateproductvariant/{id}', 'VarientController@Updateproductvariant')->name('Updateproductvariant');
    Route::get('deleteproductvariant/{id}', 'VarientController@deleteproductvariant')->name('deleteproductvariant');
         
    Route::get('dealroduct', 'DealProductController@dealroduct')->name('dealroduct');
    Route::get('AddDealproduct', 'DealProductController@AddDealproduct')->name('AddDealproduct');
    Route::post('AddNewDealproduct', 'DealProductController@AddNewDealproduct')->name('AddNewDealproduct');
    Route::get('EditDealproduct/{id}', 'DealProductController@EditDealproduct')->name('EditDealproduct');
    Route::post('UpdateDealproduct/{id}', 'DealProductController@UpdateDealproduct')->name('UpdateDealproduct');
    Route::get('DeleteDealproduct/{id}', 'DealProductController@DeleteDealproduct')->name('DeleteDealproduct');
         
    // for bulk upload
    Route::get('bulkup', 'BulkuploadController@bulkup')->name('bulkup');
    Route::post('bulk_upload', 'BulkuploadController@import')->name('bulk_upload');
    Route::post('bulk_v_upload', 'BulkuploadController@import_varients')->name('bulk_v_upload');
    Route::get('productdownload', 'BulkuploadController@productdownload');
    Route::get('variantdownload', 'BulkuploadController@variantdownload');

    // for reward
    // 	 Route::get('RewardList','RewardController@RewardList')->name('RewardList');
    // 	 Route::get('reward','RewardController@reward')->name('reward');
    // 	 Route::post('rewardadd','RewardController@rewardadd')->name('rewardadd');
    // 	 Route::get('rewardedit/{reward_id}','RewardController@rewardedit')->name('rewardedit');
    // 	 Route::post('rewardupate','RewardController@rewardupate')->name('rewardupate');
    // 	 Route::get('rewarddelete/{reward_id}','RewardController@rewarddelete')->name('rewarddelete');

    //for manage paymentvia
    //   Route::get('paymentvia','PaymentController@paymentvia')->name('paymentvia');
//       Route::get('vendorpayment','PaymentController@vendorpayment')->name('vendorpayment');
    // 	  Route::post('vendorpaymentadd','PaymentController@vendorpaymentadd')->name('vendorpaymentadd');
    // 	  Route::get('vendorpaymentedit/{payment_id}','PaymentController@vendorpaymentedit')->name('vendorpaymentedit');
    //  	  Route::post('paymentvia/update/{paymentvia_id}','PaymentController@adminUpdatepaymentvia')->name('adminUpdatepaymentvia');
     
         
    // for area
    Route::get('vendorarea', 'areaController@vendorarea')->name('vendorarea');
    Route::get('vendorAddarea', 'areaController@vendorAddarea')->name('vendorAddarea');
    Route::post('vendorAddInsertarea', 'areaController@vendorAddInsertarea')->name('vendorAddInsertarea');
    Route::get('vendorEditarea/{id}', 'areaController@vendorEditarea')->name('vendorEditarea');
    Route::post('vendorUpdatearea/{id}', 'areaController@vendorUpdatearea')->name('vendorUpdatearea');
    Route::get('vendorDeletearea/{id}', 'areaController@vendorDeletearea')->name('vendorDeletearea');
         
    // for coupon
     
    Route::get('couponlist', 'CouponController@couponlist')->name('couponlist');
    Route::get('vendorcoupon', 'CouponController@vendorcoupon')->name('vendorcoupon');
    Route::post('addcoupon', 'CouponController@addcoupon')->name('addcoupon');
    Route::get('editcoupon/{coupon_id}', 'CouponController@editcoupon')->name('editcoupon');
    Route::post('updatecoupon', 'CouponController@updatecoupon')->name('updatecoupon');
    Route::get('deletecoupon/{coupon_id}', 'CouponController@deletecoupon')->name('deletecoupon');
     
    // for delivery time
    Route::get('timeslot', 'TimeSlotController@timeslot')->name('timeslot');
    Route::post('timeslotupdate', 'TimeSlotController@timeslotupdate')->name('timeslotupdate');
     
     
    // for delivery_boy
    Route::get('vendordelivery_boy', 'delivery_boyController@vendordelivery_boy')->name('vendordelivery_boy');
    Route::get('vendorAdddelivery_boy', 'delivery_boyController@vendorAdddelivery_boy')->name('vendorAdddelivery_boy');
    Route::post('vendorAddNewdelivery_boy', 'delivery_boyController@vendorAddNewdelivery_boy')->name('vendorAddNewdelivery_boy');
    Route::get('vendorEditdelivery_boy/{id}', 'delivery_boyController@vendorEditdelivery_boy')->name('vendorEditdelivery_boy');
    Route::post('vendorUpdatedelivery_boy/{id}', 'delivery_boyController@vendorUpdatedelivery_boy')->name('vendorUpdatedelivery_boy');
    Route::get('vendordeletedelivery_boy/{id}', 'delivery_boyController@vendordeletedelivery_boy')->name('vendordeletedelivery_boy');
    Route::get('vendorconfirmdeliverystatus/{id}/{status}', 'delivery_boyController@vendorconfirmdeliverystatus')->name('vendorconfirmdeliverystatus');
         
    // for order details
     
    Route::get('details', 'Today_OrderController@details')->name('details');
         
    Route::get('inventoryvendor', 'inventoryController@inventoryvendor')->name('inventoryvendor');
    Route::post('paycustomervendor/{order_complain_id}', 'inventoryController@paycustomervendor')->name('paycustomervendor');
          
    Route::get('dispatch_panelvendor', 'DispatchvendorController@dispatch_panelvendor')->name('dispatch_panelvendor');
    Route::post('assignedcashrequestvendor', 'DispatchvendorController@assignedcashrequestvendor')->name('assignedcashrequestvendor');
         
    Route::get('comission', 'ComissionController@comission')->name('comission');
    Route::post('sendrequest/{com_id}', 'ComissionController@sendrequest')->name('sendrequest');
    Route::post('searchcomission', 'ComissionController@searchcomission')->name('searchcomission');
    Route::get('allexcelgenerator', 'ComissionController@allexcelgenerator')->name('allexcelgenerator');
    Route::get('excelgenerator/{startdate}/{enddate}', 'ComissionController@excelgenerator')->name('excelgenerator');
    Route::get('delivery_boy_comission', 'delivery_boy_comissionController@delivery_boy_comission')->name('delivery_boy_comission');
    Route::post('searchdeliveryboy', 'delivery_boy_comissionController@searchdeliveryboy')->name('searchdeliveryboy');
    Route::get('allexceldownload', 'delivery_boy_comissionController@allexceldownload')->name('allexceldownload');
    Route::get('exceldownload/{startdate}/{enddate}', 'delivery_boy_comissionController@exceldownload')->name('exceldownload');
                
    Route::post('searchstock', 'Today_OrderController@searchstock')->name('searchstock');
    Route::get('low_stock', 'Today_OrderController@low_stock')->name('low_stock');
    Route::post('update_stock', 'Today_OrderController@update_stock')->name('update_stock');
         
    //for notification
    Route::get('vendor_notification', 'NotificationController@vendor_notification')->name('vendor-notification');
    Route::get('cityadmindelivery_boy', 'delivery_boyController@cityadmindelivery_boy')->name('cityadmindelivery_boy');
    
    Route::get('vendorsendrequest/{com_id}', 'ComissionController@vendorsendrequest')->name('vendorsendrequest');
});
    