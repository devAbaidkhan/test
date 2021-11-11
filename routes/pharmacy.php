<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Pharmacy', 'prefix'=>'pharmacy'], function () {
    Route::get('/', 'PharmacyLoginController@pharmacylogin')->name('pharmacylogin');
    Route::post('/checkresturantLogin', 'PharmacyLoginController@checkpharmacyLogin')->name('checkpharmacyLogin');
    Route::get('index', 'HomeController@vendorIndex')->name('pharmacy-index');
    Route::get('complete_order_index', 'HomeController@complete_order')->name('complete_order_index');
    //Vendor logout
    Route::get('pharmacyEditvendor/{id}', 'ProfileController@pharmacyEditvendor')->name('pharmacyEditvendor');
    Route::post('pharmacyvendorUpdateProfile/{id}', 'ProfileController@pharmacyvendorUpdateProfile')->name('pharmacyvendorUpdateProfile');
    Route::get('pharmacyvendorLogout', 'ProfileController@pharmacyvendorLogout')->name('pharmacyvendorLogout');

    Route::get('today_order_pharmacy', 'Today_OrderController@today_order_pharmacy')->name('today_order_pharmacy');
    Route::get('pharmacynext_day', 'Today_OrderController@pharmacynext_day')->name('pharmacynext_day');
    Route::get('pharmacy_complete_order', 'Today_OrderController@pharmacy_complete_order')->name('pharmacy_complete_order');
    Route::post('pharmacy_assigned_order', 'Today_OrderController@pharmacy_assigned_order')->name('pharmacy_assigned_order');
    Route::post('assigned_vendor_order', 'DispatchvendorController@assignedvendor')->name('assigned_vendor_order');
           
    Route::get('incentive_order', 'Incentive_orderController@incentive_order')->name('incentive_order');
    Route::post('pay_incentive', 'Incentive_orderController@pay_incentive')->name('pay_incentive');
    // Route::get('edit_incentive_order', 'Incentive_orderController@edit_incentive_order')->name('edit_incentive_order');
    // Route::post('update_incentive_order', 'Incentive_orderController@update_incentive_order')->name('update_incentive_order');
        
     
    // for banner
    Route::get('pharmacybannervendor', 'BannervendorController@pharmacybannervendor')->name('pharmacybannervendor');
    Route::get('pharmacyAddbannervendor', 'BannervendorController@pharmacyAddbannervendor')->name('pharmacyAddbannervendor');
    Route::post('pharmacyAddNewbannervendor', 'BannervendorController@pharmacyAddNewbannervendor')->name('pharmacyAddNewbannervendor');
    Route::get('pharmacyEditbannervendor/{id}', 'BannervendorController@pharmacyEditbannervendor')->name('pharmacyEditbannervendor');
    Route::post('pharmacyUpdatebannervendor/{id}', 'BannervendorController@pharmacyUpdatebannervendor')->name('pharmacyUpdatebannervendor');
    Route::get('pharmacydeletebannervendor/{id}', 'BannervendorController@pharmacydeletebannervendor')->name('pharmacydeletebannervendor');
         
    // for category
         
    Route::get('pharmacycategory', 'CategoryController@category')->name('pharmacycategory');
    Route::get('pharmacyAddCategory', 'CategoryController@pharmacyAddCategory')->name('pharmacyAddCategory');
    Route::post('pharmacyAddNewCategory', 'CategoryController@pharmacyAddNewCategory')->name('pharmacyAddNewCategory');
    Route::get('pharmacyEditCategory/{category_id}', 'CategoryController@pharmacyEditCategory')->name('pharmacyEditCategory');
    Route::post('pharmacyUpdateCategory/{category_id}', 'CategoryController@pharmacyUpdateCategory')->name('pharmacyUpdateCategory');
    Route::get('pharmacyDeleteCategory/{category_id}', 'CategoryController@pharmacyDeleteCategory')->name('pharmacyDeleteCategory');
         
    // for sub-category
         
    Route::post('searchsubcat', 'subcatController@searchsubcat')->name('searchsubcat');
    Route::get('pharmacysubcat', 'subcatController@pharmacysubcat')->name('pharmacysubcat');
    Route::get('pharmacyaddsubcat', 'subcatController@pharmacyaddsubcat')->name('pharmacyaddsubcat');
    Route::post('pharmacyAddNewsubcat', 'subcatController@pharmacyAddNewsubcat')->name('pharmacyAddNewsubcat');
    Route::get('pharmacyEditsubcat/{subcat_id}', 'subcatController@pharmacyEditsubcat')->name('pharmacyEditsubcat');
    Route::post('pharmacyUpdatesubcat/{subcat_id}', 'subcatController@pharmacyUpdatesubcat')->name('pharmacyUpdatesubcat');
    Route::get('pharmacydeletesubcat/{subcat_id}', 'subcatController@pharmacydeletesubcat')->name('pharmacydeletesubcat');

    // for Products
         
    Route::get('pharmacyproduct', 'ProductController@product')->name('pharmacyproduct');
    Route::get('pharmacyaddproduct', 'ProductController@Addproduct')->name('pharmacyaddproduct');
    Route::post('pharmacyaddnewproduct', 'ProductController@AddNewproduct')->name('pharmacyaddnewproduct');
    Route::get('pharmacyeditproduct/{product_id}', 'ProductController@Editproduct')->name('pharmacyeditproduct');
    Route::post('pharmacyupdateproduct/{product_id}', 'ProductController@Updateproduct')->name('pharmacyupdateproduct');
    Route::get('pharmacydeleteproduct/{product_id}', 'ProductController@deleteproduct')->name('pharmacydeleteproduct');
    Route::post('searchproduct', 'ProductController@searchproduct')->name('searchproduct');

         
    // for Products variant
         
    Route::get('pharmacyvarient/{id}', 'VarientController@varient')->name('pharmacyvarient');
    Route::get('pharmacyAddproductvariant/{id}', 'VarientController@Addproductvariant')->name('pharmacyAddproductvariant');
    Route::post('pharmacyAddNewproductvariant', 'VarientController@AddNewproductvariant')->name('pharmacyAddNewproductvariant');
    Route::get('pharmacyEditproductvariant/{id}', 'VarientController@Editproductvariant')->name('pharmacyEditproductvariant');
    Route::post('pharmacyUpdateproductvariant/{id}', 'VarientController@Updateproductvariant')->name('pharmacyUpdateproductvariant');
    Route::get('deleteproductvariant/{id}', 'VarientController@deleteproductvariant')->name('deleteproductvariant');
         
    // for Products addons
         
    Route::get('pharmacyaddon/{id}', 'AddonController@addon')->name('pharmacyaddon');
    Route::get('pharmacyAddproductaddon/{id}', 'AddonController@Addproductaddon')->name('pharmacyAddproductaddon');
    Route::post('pharmacyAddNewproductaddon', 'AddonController@AddNewproductaddon')->name('pharmacyAddNewproductaddon');
    Route::get('pharmacyEditproductaddon/{id}', 'AddonController@Editproductaddon')->name('pharmacyEditproductaddon');
    Route::post('pharmacyUpdateproductaddon/{id}', 'AddonController@Updateproductaddon')->name('pharmacyUpdateproductaddon');
    Route::get('deleteproductaddon/{id}', 'AddonController@deleteproductaddon')->name('deleteproductaddon');
    // for deal products//
    Route::get('pharmacydealroduct', 'DealProductController@pharmacydealroduct')->name('pharmacydealroduct');
    Route::get('pharmacyAddDealproduct', 'DealProductController@pharmacyAddDealproduct')->name('pharmacyAddDealproduct');
    Route::post('pharmacyAddNewDealproduct', 'DealProductController@pharmacyAddNewDealproduct')->name('pharmacyAddNewDealproduct');
    Route::get('pharmacyEditDealproduct/{id}', 'DealProductController@pharmacyEditDealproduct')->name('pharmacyEditDealproduct');
    Route::post('pharmacyUpdateDealproduct/{id}', 'DealProductController@pharmacyUpdateDealproduct')->name('pharmacyUpdateDealproduct');
    Route::get('pharmacyDeleteDealproduct/{id}', 'DealProductController@pharmacyDeleteDealproduct')->name('pharmacyDeleteDealproduct');
         
    // for bulk upload
    Route::get('pharmacybulkup', 'BulkuploadController@pharmacybulkup')->name('pharmacybulkup');
    Route::post('pharmacyimport', 'BulkuploadController@pharmacyimport')->name('pharmacyimport');
    Route::post('pharmacyimport_varients', 'BulkuploadController@pharmacyimport_varients')->name('pharmacyimport_varients');
    Route::get('productdownload', 'BulkuploadController@productdownload');
    Route::get('variantdownload', 'BulkuploadController@variantdownload');


     
         
    // for area
    Route::get('pharmacyarea', 'areaController@pharmacyarea')->name('pharmacyarea');
    Route::get('pharmacyAddarea', 'areaController@pharmacyAddarea')->name('pharmacyAddarea');
    Route::post('pharmacyAddInsertarea', 'areaController@pharmacyAddInsertarea')->name('pharmacyAddInsertarea');
    Route::get('pharmacyEditarea/{id}', 'areaController@pharmacyEditarea')->name('pharmacyEditarea');
    Route::post('pharmacyUpdatearea/{id}', 'areaController@pharmacyUpdatearea')->name('pharmacyUpdatearea');
    Route::get('pharmacyDeletearea/{id}', 'areaController@pharmacyDeletearea')->name('pharmacyDeletearea');
         
    // for coupon
     
    Route::get('pharmacycouponlist', 'CouponController@pharmacycouponlist')->name('pharmacycouponlist');
    Route::get('pharmacycoupon', 'CouponController@pharmacycoupon')->name('pharmacycoupon');
    Route::post('pharmacyaddcoupon', 'CouponController@pharmacyaddcoupon')->name('pharmacyaddcoupon');
    Route::get('pharmacyeditcoupon/{coupon_id}', 'CouponController@pharmacyeditcoupon')->name('pharmacyeditcoupon');
    Route::post('pharmacyupdatecoupon', 'CouponController@pharmacyupdatecoupon')->name('pharmacyupdatecoupon');
    Route::get('pharmacydeletecoupon/{coupon_id}', 'CouponController@pharmacydeletecoupon')->name('pharmacydeletecoupon');
     
    // for delivery time
    Route::get('pharmacytimeslot', 'TimeSlotController@pharmacytimeslot')->name('pharmacytimeslot');
    Route::post('pharmacytimeslotupdate', 'TimeSlotController@pharmacytimeslotupdate')->name('pharmacytimeslotupdate');
     
     
    // for delivery_boy
    Route::get('pharmacydelivery_boy', 'delivery_boyController@pharmacydelivery_boy')->name('pharmacydelivery_boy');
    Route::get('pharmacyAdddelivery_boy', 'delivery_boyController@pharmacyAdddelivery_boy')->name('pharmacyAdddelivery_boy');
    Route::post('pharmacyAddNewdelivery_boy', 'delivery_boyController@pharmacyAddNewdelivery_boy')->name('pharmacyAddNewdelivery_boy');
    Route::get('pharmacyEditdelivery_boy/{id}', 'delivery_boyController@pharmacyEditdelivery_boy')->name('pharmacyEditdelivery_boy');
    Route::post('pharmacyUpdatedelivery_boy/{id}', 'delivery_boyController@pharmacyUpdatedelivery_boy')->name('pharmacyUpdatedelivery_boy');
    Route::get('pharmacydeletedelivery_boy/{id}', 'delivery_boyController@pharmacydeletedelivery_boy')->name('pharmacydeletedelivery_boy');
    Route::get('pharmacyconfirmdeliverystatus/{id}/{status}', 'delivery_boyController@pharmacyconfirmdeliverystatus')->name('pharmacyconfirmdeliverystatus');
         
    // for order details
     
    Route::get('details', 'Today_OrderController@details')->name('details');
         
    Route::get('inventoryvendor', 'inventoryController@inventoryvendor')->name('inventoryvendor');
    Route::post('paycustomervendor/{order_complain_id}', 'inventoryController@paycustomervendor')->name('paycustomervendor');
          
    Route::get('dispatch_panelvendor', 'DispatchvendorController@dispatch_panelvendor')->name('dispatch_panelvendor');
    Route::post('assignedcashrequestvendor', 'DispatchvendorController@assignedcashrequestvendor')->name('assignedcashrequestvendor');
         
    Route::get('pharmacycomission', 'ComissionController@pharmacycomission')->name('pharmacycomission');
    Route::get('pharmacysendrequest/{com_id}', 'ComissionController@pharmacysendrequest')->name('pharmacysendrequest');
    Route::post('pharmacysearchcomission', 'ComissionController@pharmacysearchcomission')->name('pharmacysearchcomission');
    Route::get('pharmacyallexcelgenerator', 'ComissionController@pharmacyallexcelgenerator')->name('pharmacyallexcelgenerator');
    Route::get('pharmacyexcelgenerator/{startdate}/{enddate}', 'ComissionController@pharmacyexcelgenerator')->name('pharmacyexcelgenerator');
    Route::get('pharmacydelivery_boy_comission', 'delivery_boy_comissionController@pharmacydelivery_boy_comission')->name('pharmacydelivery_boy_comission');
    Route::post('pharmacysearchdeliveryboy', 'delivery_boy_comissionController@pharmacysearchdeliveryboy')->name('pharmacysearchdeliveryboy');
    Route::get('pharmacyallexceldownload', 'delivery_boy_comissionController@pharmacyallexceldownload')->name('pharmacyallexceldownload');
    Route::get('pharmacyexceldownload/{startdate}/{enddate}', 'delivery_boy_comissionController@pharmacyexceldownload')->name('pharmacyexceldownload');
                
    //  Route::post('searchstock','Today_OrderController@searchstock')->name('searchstock');
    //  Route::get('low_stock','Today_OrderController@low_stock')->name('low_stock');
    //  Route::post('update_stock','Today_OrderController@update_stock')->name('update_stock');
         
    //for notification
    Route::get('vendor_notification', 'NotificationController@vendor_notification')->name('vendor-notification');
    Route::get('pharmacycityadmindelivery_boy', 'delivery_boyController@pharmacycityadmindelivery_boy')->name('pharmacycityadmindelivery_boy');
});