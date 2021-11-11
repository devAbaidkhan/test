<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Cityadmin', 'prefix'=>'franchise-admin'], function () {
    Route::get('/', 'LoginController@cityadminlogin')->name('cityadminlogin');
    Route::post('/checklogin', 'LoginController@checkcityadminLogin')->name('checkcityadmin-login');
});
      Route::group(['namespace'=>'Cityadmin', 'prefix'=>'franchise-admin'], function () {
          /// for cityadmin home
          Route::get('index', 'HomeController@cityadminIndex')->name('cityadmin-index');
          Route::resource('city-franchise', 'CityFranchiseController');
          
          // for area`
          Route::get('area', 'areaController@area')->name('area');
          Route::get('area/add', 'areaController@Addarea')->name('add-area');
          Route::post('area/add/new', 'areaController@AddInsertarea')->name('AddNewarea');
          Route::get('area/edit/{id}', 'areaController@Editarea')->name('edit-area');
          Route::post('area/update/{id}', 'areaController@Updatearea')->name('update-area');
          Route::get('area/delete/{id}', 'areaController@deletearea')->name('delete-area');
          
          //for manage category
          Route::get('category', 'CategoryController@category')->name('cityadmincategory');
          Route::get('category/add', 'CategoryController@cityadminAddCategory')->name('cityadminAddCategory');
          Route::post('category/add/new', 'CategoryController@cityadminAddNewCategory')->name('cityadminAddNewCategory');
          Route::get('category/edit/{category_id}', 'CategoryController@cityadminEditCategory')->name('cityadminEditCategory');
          Route::post('category/update/{category_id}', 'CategoryController@cityadminUpdateCategory')->name('cityadminUpdateCategory');
          Route::get('category/delete/{category_id}', 'CategoryController@cityadminDeleteCategory')->name('cityadminDeleteCategory');
      
          
          // for subcat
          Route::get('subcat', 'subcatController@subcat')->name('cityadminsubcat');
          Route::get('subcat/add', 'subcatController@Addsubcat')->name('cityadminaddsubcat');
          Route::post('subcat/add/new', 'subcatController@AddNewsubcat')->name('cityadminAddNewsubcat');
          Route::get('subcat/edit/{id}', 'subcatController@Editsubcat')->name('cityadminedit-subcat');
          Route::post('subcat/update/{id}', 'subcatController@Updatesubcat')->name('cityadminupdate-subcat');
          Route::get('subcat/delete/{id}', 'subcatController@deletesubcat')->name('cityadmindelete-subcat');
          
          // 	// for product
          Route::get('product', 'productController@product')->name('cityadminproduct');
          Route::get('product/add', 'productController@Addproduct')->name('cityadminadd-product');
          Route::post('product/add/new', 'productController@AddNewproduct')->name('cityadminAddNewproduct');
          Route::get('product/edit/{id}', 'productController@Editproduct')->name('cityadminedit-product');
          Route::post('product/update/{id}', 'productController@Updateproduct')->name('cityadminupdate-product');
          Route::get('product/delete/{id}', 'productController@deleteproduct')->name('cityadmindelete-product');
          
          // for product varient
          Route::get('varient/{id}', 'varientController@varient')->name('cityadminvarient');
          Route::get('varient/add/{id}', 'varientController@Addproduct')->name('cityadminadd-varient');
          Route::post('varient/add/new', 'varientController@AddNewproduct')->name('cityadminAddNewvarient');
          Route::get('varient/edit/{id}', 'varientController@Editproduct')->name('cityadminedit-varient');
          Route::post('varient/update/{id}', 'varientController@Updateproduct')->name('cityadminupdate-varient');
          Route::get('varient/delete/{id}', 'varientController@deleteproduct')->name('cityadmindelete-varient');
          // homecategory
          Route::get('homecategory', 'HomeCategoryController@allcategory')->name('allcategory');
          Route::get('addhomecategory', 'HomeCategoryController@addhomecategory')->name('addhomecategory');
          Route::post('inserthomecategory1', 'HomeCategoryController@inserthomecategory1')->name('inserthomecategory1');
          Route::get('edithomecategory/{id}', 'HomeCategoryController@edithomecategory')->name('edithomecategory');
          Route::post('updatehomecategory/{id}', 'HomeCategoryController@updatehomecategory')->name('updatehomecategory');
          Route::get('deletehomecategory/{id}', 'HomeCategoryController@deletehomecategory')->name('deletehomecategory');
        
          // Assign Home Category
      
          Route::get('assignhomecategory/{id}', 'AssignHomeCategoryController@assignhomecategory')->name('assignhomecategory');
          Route::post('inserthomecategory', 'AssignHomeCategoryController@inserthomecategory')->name('inserthomecategory');
          Route::get('deletehomecatgrpcat/{id}', 'AssignHomeCategoryController@deletehomecategory')->name('deletehomecatgrpcat');
        
          //cityadmin logout
          Route::get('logout', 'ProfileController@cityadminLogout')->name('cityadmin-logout');
      
          //for notification
          Route::get('cityadminNotification', 'notificationController@cityadminNotification')->name('cityadminNotification');
          Route::post('cityadminNotificationSend', 'notificationController@cityadminNotificationSend')->name('cityadminNotificationSend');
    
          //for vendor notification
          Route::get('CNotification_to_store', 'notificationController@CNotification_to_store')->name('CNotification_to_store');
          Route::post('CNotification_to_store_Send', 'notificationController@CNotification_to_store_Send')->name('CNotification_to_store_Send');
     

          // for banner
          Route::get('banner', 'BannerImagesController@banner')->name('banner');
          Route::get('Addbanner', 'BannerImagesController@Addbanner')->name('Addbanner');
          Route::post('AddNewbanner', 'BannerImagesController@AddNewbanner')->name('AddNewbanner');
          Route::get('banner/edit/{id}', 'bannerController@Editbanner')->name('edit-banner');
          Route::post('banner/update/{id}', 'bannerController@Updatebanner')->name('update-banner');
          Route::get('banner/delete/{id}', 'bannerController@deletebanner')->name('delete-banner');
         
          // for delivery_boy
          
          Route::post('searchdelivery_boy', 'delivery_boyController@searchdelivery_boy')->name('searchdelivery_boy');

          Route::get('delivery_boy', 'delivery_boyController@delivery_boy')->name('delivery_boy');
          Route::get('delivery_boy/add', 'delivery_boyController@Adddelivery_boy')->name('add-delivery_boy');
          Route::post('delivery_boy/add/new', 'delivery_boyController@AddNewdelivery_boy')->name('AddNewdelivery_boy');
          Route::get('delivery_boy/edit/{id}', 'delivery_boyController@Editdelivery_boy')->name('edit-delivery_boy');
          Route::post('delivery_boy/update/{id}', 'delivery_boyController@Updatedelivery_boy')->name('update-delivery_boy');
          Route::get('delivery_boy/delete/{id}', 'delivery_boyController@deletedelivery_boy')->name('delete-delivery_boy');
          Route::get('confirm_delivery_status/{id}/{status}', 'delivery_boyController@confirmdeliverystatus')->name('confirm.delivery.status');
        
          Route::get('cdelivery_boy_comission', 'delivery_boy_comissionController@cdelivery_boy_comission')->name('cdelivery_boy_comission');
          Route::post('cityadminsearchcomission', 'delivery_boy_comissionController@cityadminsearchcomission')->name('cityadminsearchcomission');
          Route::get('cityadminallexcelgenerator', 'delivery_boy_comissionController@cityadminallexcelgenerator')->name('cityadminallexcelgenerator');
          Route::get('cityadminexcelgenerator/{startdate}/{enddate}/{delivery_boy_id}', 'delivery_boy_comissionController@cityadminexcelgenerator')->name('cityadminexcelgenerator');
        
          Route::get('partner', 'vendorController@vendor')->name('vendor');
          Route::get('partner/add', 'vendorController@Addvendor')->name('add-vendor');
          Route::post('partner/add/new', 'vendorController@AddNewvendor')->name('AddNewvendor');
          Route::get('partner/edit/{id}', 'vendorController@Editvendor')->name('edit-vendor');
          Route::post('partner/update/{id}', 'vendorController@Updatevendor')->name('update-vendor');
          Route::get('partner/delete/{id}', 'vendorController@deletevendor')->name('delete-vendor');
          Route::post('search-partner', 'vendorController@searchvendor')->name('searchvendor');


         
          /// for bulk upload
          // Route::post('bulk_upload', 'ImportExcelController@import')->name('bulk_upload');
        
        
          //order management
          Route::get('today_orders', 'OrderController@today_orders')->name('today_orders');
          Route::get('next_day_orders', 'OrderController@next_day_orders')->name('next_day_orders');
          Route::get('completed', 'OrderController@completed')->name('completed');
          Route::get('incentive', 'incentiveController@incentive')->name('incentive');
          //Route::post('today_orders', 'OrderController@today_orders')->name('incentive');
          Route::post('assigned', 'OrderController@assigned')->name('assigned');
          Route::post('paid', 'incentiveController@pay')->name('paid');
          Route::get('edit_incentive_amount', 'incentiveController@edit_incentive_amount')->name('edit_incentive_amount');
          Route::post('update_incentive_amount', 'incentiveController@update_incentive_amount')->name('update_incentive_amount');
        
        
       
          //for notification
          Route::get('send_notification', 'notiController@notification1')->name('notificationCA1');
          Route::post('send_notificationstep2', 'notiController@notification2')->name('notificationCA2');
       
          // for coupon
          Route::get('coupon', 'CouponController@allcoupons')->name('coupon');
       
          //vendor_order
          Route::get('vendor_list', 'Vendor_orderController@vendor_list')->name('vendor_list');
          Route::get('today_order1/{id}', 'Vendor_orderController@today_order1')->name('today_order1');
          Route::get('next_order1/{id}', 'Vendor_orderController@next_order1')->name('next_order1');
          Route::get('completed_order1/{id}', 'Vendor_orderController@completed_order1')->name('completed_order1');
          Route::get('vendorsecretlogin/{id}', 'vendorController@vendorsecretlogin')->name('vendorsecretlogin');


          Route::resource('campaign', 'CampaignController');
      });