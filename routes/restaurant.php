<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Resturant', 'prefix'=>'restaurant',], function () {
    Route::get('/', 'RestaurantLoginController@resturantlogin')->name('resturantlogin');
    Route::post('/checkresturantLogin', 'RestaurantLoginController@checkresturantLogin')->name('checkresturantLogin');
});
    Route::group(['namespace'=>'Resturant', 'prefix'=>'restaurant','middleware'=>'session.check'], function () {
        
        
        Route::get('index', 'HomeController@vendorIndex')->name('resturant-index');
        Route::get('complete_order_index', 'HomeController@complete_order')->name('complete_order_index');
        //Vendor logout
        Route::get('resturantEditvendor/{id}', 'ProfileController@resturantEditvendor')->name('resturantEditvendor');
        Route::post('resturantvendorUpdateProfile/{id}', 'ProfileController@resturantvendorUpdateProfile')->name('resturantvendorUpdateProfile');
        Route::get('logout', 'ProfileController@resturantvendorLogout')->name('resturantvendorLogout');
    
        Route::get('today_order_restaurant', 'Today_OrderController@today_order_restaurant')->name('today_order_restaurant');
        Route::post('today_order_restaurant_list', 'Today_OrderController@today_order_restaurant_list')->name('today_order_restaurant_list');
        Route::get('order_restaurant_detail/{ordrid}', 'Today_OrderController@order_restaurant_detail')->name('order_restaurant_detail');
        Route::post('change_order_restaurant_status', 'Today_OrderController@change_order_restaurant_status')->name('change_order_restaurant_status');
        Route::post('assign-rider', 'Today_OrderController@assign_rider')->name('restrurent.order.assign.rider');
        Route::get('resturant_complete_order', 'Today_OrderController@resturant_complete_order')->name('resturant_complete_order');
        Route::post('resturant_assigned_order', 'Today_OrderController@resturant_assigned_order')->name('resturant_assigned_order');
        Route::post('assigned_vendor_order', 'DispatchvendorController@assignedvendor')->name('assigned_vendor_order');
               
        Route::get('incentive_order', 'Incentive_orderController@incentive_order')->name('incentive_order');
        Route::post('pay_incentive', 'Incentive_orderController@pay_incentive')->name('pay_incentive');
        // Route::get('edit_incentive_order', 'Incentive_orderController@edit_incentive_order')->name('edit_incentive_order');
        // Route::post('update_incentive_order', 'Incentive_orderController@update_incentive_order')->name('update_incentive_order');
            
         
        // for banner
        Route::get('resturantbannervendor', 'BannervendorController@resturantbannervendor')->name('resturantbannervendor');
        Route::get('resturantAddbannervendor', 'BannervendorController@resturantAddbannervendor')->name('resturantAddbannervendor');
        Route::post('resturantAddNewbannervendor', 'BannervendorController@resturantAddNewbannervendor')->name('resturantAddNewbannervendor');
        Route::get('resturantEditbannervendor/{id}', 'BannervendorController@resturantEditbannervendor')->name('resturantEditbannervendor');
        Route::post('resturantUpdatebannervendor/{id}', 'BannervendorController@resturantUpdatebannervendor')->name('resturantUpdatebannervendor');
        Route::get('resturantdeletebannervendor/{id}', 'BannervendorController@resturantdeletebannervendor')->name('resturantdeletebannervendor');
             
        // for category
             
        Route::get('resturantcategory', 'CategoryController@category')->name('resturantcategory');
        Route::get('resturantcategory-sorting', 'CategoryController@categorySortingList')->name('product.category.sortinglist');
        Route::post('resturantcategory-sorting-save', 'CategoryController@categorySortingSave')->name('product.category.sortingsave');
    
    
        Route::get('resturantAddCategory', 'CategoryController@resturantAddCategory')->name('resturantAddCategory');
        Route::post('resturantAddNewCategory', 'CategoryController@resturantAddNewCategory')->name('resturantAddNewCategory');
        Route::get('resturantEditCategory/{category_id}', 'CategoryController@resturantEditCategory')->name('resturantEditCategory');
        Route::post('resturantUpdateCategory/{category_id}', 'CategoryController@resturantUpdateCategory')->name('resturantUpdateCategory');
        Route::get('resturantDeleteCategory/{category_id}', 'CategoryController@resturantDeleteCategory')->name('resturantDeleteCategory');
             
        // for sub-category
             
        Route::post('searchsubcat', 'subcatController@searchsubcat')->name('searchsubcat');
        Route::get('resturantsubcat', 'subcatController@resturantsubcat')->name('resturantsubcat');
        Route::get('resturantaddsubcat', 'subcatController@resturantaddsubcat')->name('resturantaddsubcat');
        Route::post('resturantAddNewsubcat', 'subcatController@resturantAddNewsubcat')->name('resturantAddNewsubcat');
        Route::get('resturantEditsubcat/{subcat_id}', 'subcatController@resturantEditsubcat')->name('resturantEditsubcat');
        Route::post('resturantUpdatesubcat/{subcat_id}', 'subcatController@resturantUpdatesubcat')->name('resturantUpdatesubcat');
        Route::get('resturantdeletesubcat/{subcat_id}', 'subcatController@resturantdeletesubcat')->name('resturantdeletesubcat');
    
        // for Products
             
        Route::get('resturantproduct', 'ProductController@product')->name('resturantproduct');
        Route::post('resturantproduct', 'ProductController@productCategorySearch')->name('resturantproductcategorysearch');
        Route::get('resturantproduct-sorting', 'ProductController@productsortinglist')->name('productsortinglist');
        Route::post('resturantproduct-sorting', 'ProductController@productSortingListCategorySearch')->name('resturantproductsortinglistcategorysearch');
        Route::post('resturantproduct-sorting-save', 'ProductController@productSortingSave')->name('resturantproductsortingsave');
    
    
        Route::get('resturantaddproduct', 'ProductController@Addproduct')->name('resturantaddproduct');
        Route::post('resturantaddnewproduct', 'ProductController@AddNewproduct')->name('resturantaddnewproduct');
        Route::get('resturanteditproduct/{product_id}', 'ProductController@Editproduct')->name('resturanteditproduct');
        Route::post('resturantupdateproduct/{product_id}', 'ProductController@Updateproduct')->name('resturantupdateproduct');
        Route::get('resturantdeleteproduct/{product_id}', 'ProductController@deleteproduct')->name('resturantdeleteproduct');
        Route::post('searchproduct', 'ProductController@searchproduct')->name('searchproduct');
    
        // add ons h7n
        Route::resource('restaurant_addons','AddonsController');
        Route::get('restaurant_addons-sorting-list', 'AddonsController@sortinglist')->name('restaurant_addons.sortinglist');
        Route::post('restaurant_addons-sorting-save', 'AddonsController@sortingsave')->name('restaurant_addons.sortingsave');
        // for Products variant
             
        Route::get('resturantvarient/{id}', 'VarientController@varient')->name('resturantvarient');
        Route::get('resturantAddproductvariant/{id}', 'VarientController@Addproductvariant')->name('resturantAddproductvariant');
        Route::post('resturantAddNewproductvariant', 'VarientController@AddNewproductvariant')->name('resturantAddNewproductvariant');
        Route::get('resturantEditproductvariant/{id}', 'VarientController@Editproductvariant')->name('resturantEditproductvariant');
        Route::post('resturantUpdateproductvariant/{id}', 'VarientController@Updateproductvariant')->name('resturantUpdateproductvariant');
        Route::get('deleteproductvariant/{id}', 'VarientController@deleteproductvariant')->name('deleteproductvariant');
             
        // for Products addons
             
        Route::get('resturantaddon/{id}', 'AddonController@addon')->name('resturantaddon');
        Route::get('resturantAddproductaddon/{id}', 'AddonController@Addproductaddon')->name('resturantAddproductaddon');
        Route::post('resturantAddNewproductaddon', 'AddonController@AddNewproductaddon')->name('resturantAddNewproductaddon');
        Route::get('resturantEditproductaddon/{id}', 'AddonController@Editproductaddon')->name('resturantEditproductaddon');
        Route::post('resturantUpdateproductaddon/{id}', 'AddonController@Updateproductaddon')->name('resturantUpdateproductaddon');
        Route::get('deleteproductaddon/{id}', 'AddonController@deleteproductaddon')->name('deleteproductaddon');
        // deal Product///
        Route::get('resturantdealroduct', 'DealProductController@resturantdealroduct')->name('resturantdealroduct');
        Route::get('resturantAddDealproduct', 'DealProductController@resturantAddDealproduct')->name('resturantAddDealproduct');
        Route::post('resturantAddNewDealproduct', 'DealProductController@resturantAddNewDealproduct')->name('resturantAddNewDealproduct');
        Route::get('resturantEditDealproduct/{id}', 'DealProductController@resturantEditDealproduct')->name('resturantEditDealproduct');
        Route::post('resturantUpdateDealproduct/{id}', 'DealProductController@resturantUpdateDealproduct')->name('resturantUpdateDealproduct');
        Route::get('resturantDeleteDealproduct/{id}', 'DealProductController@resturantDeleteDealproduct')->name('resturantDeleteDealproduct');
             
        // for bulk upload
        Route::get('restaurantbulkup', 'BulkuploadController@restaurantbulkup')->name('restaurantbulkup');
        Route::post('restaurantimport', 'BulkuploadController@restaurantimport')->name('restaurantimport');
        Route::post('restaurant-import-preview', 'BulkuploadController@restaurant_import_preview')->name('restaurantimport.preview');
        Route::post('restaurant-import-save', 'BulkuploadController@restaurant_import_save')->name('restaurantimport.save');
        Route::post('restaurantimport_varients', 'BulkuploadController@restaurantimport_varients')->name('restaurantimport_varients');
        Route::get('productdownload', 'BulkuploadController@productdownload');
        Route::get('variantdownload', 'BulkuploadController@variantdownload');
    
    
         
             
        // for area
        Route::get('restaurantarea', 'areaController@restaurantarea')->name('restaurantarea');
        Route::get('restaurantAddarea', 'areaController@restaurantAddarea')->name('restaurantAddarea');
        Route::post('restaurantAddInsertarea', 'areaController@restaurantAddInsertarea')->name('restaurantAddInsertarea');
        Route::get('restaurantEditarea/{id}', 'areaController@restaurantEditarea')->name('restaurantEditarea');
        Route::post('restaurantUpdatearea/{id}', 'areaController@restaurantUpdatearea')->name('restaurantUpdatearea');
        Route::get('restaurantDeletearea/{id}', 'areaController@restaurantDeletearea')->name('restaurantDeletearea');
             
        // for coupon
         
        Route::get('resturantcouponlist', 'CouponController@resturantcouponlist')->name('resturantcouponlist');
        Route::get('resturantcoupon', 'CouponController@resturantcoupon')->name('resturantcoupon');
        Route::post('resturantaddcoupon', 'CouponController@resturantaddcoupon')->name('resturantaddcoupon');
        Route::get('resturanteditcoupon/{coupon_id}', 'CouponController@resturanteditcoupon')->name('resturanteditcoupon');
        Route::post('resturantupdatecoupon', 'CouponController@resturantupdatecoupon')->name('resturantupdatecoupon');
        Route::get('resturantdeletecoupon/{coupon_id}', 'CouponController@resturantdeletecoupon')->name('resturantdeletecoupon');
         
        // for delivery time
        Route::get('resturanttimeslot', 'TimeSlotController@resturanttimeslot')->name('resturanttimeslot');
        Route::post('resturanttimeslotupdate', 'TimeSlotController@resturanttimeslotupdate')->name('resturanttimeslotupdate');
         
         
        // for delivery_boy
        Route::get('resturantdelivery_boy', 'delivery_boyController@resturantdelivery_boy')->name('resturantdelivery_boy');
        Route::get('resturantAdddelivery_boy', 'delivery_boyController@resturantAdddelivery_boy')->name('resturantAdddelivery_boy');
        Route::post('resturantAddNewdelivery_boy', 'delivery_boyController@resturantAddNewdelivery_boy')->name('resturantAddNewdelivery_boy');
        Route::get('resturantEditdelivery_boy/{id}', 'delivery_boyController@resturantEditdelivery_boy')->name('resturantEditdelivery_boy');
        Route::post('resturantUpdatedelivery_boy/{id}', 'delivery_boyController@resturantUpdatedelivery_boy')->name('resturantUpdatedelivery_boy');
        Route::get('resturantdeletedelivery_boy/{id}', 'delivery_boyController@resturantdeletedelivery_boy')->name('resturantdeletedelivery_boy');
        Route::get('resturantconfirmdeliverystatus/{id}/{status}', 'delivery_boyController@resturantconfirmdeliverystatus')->name('resturantconfirmdeliverystatus');
             
        // for order details
         
        Route::get('details', 'Today_OrderController@details')->name('details');
             
        Route::get('inventoryvendor', 'inventoryController@inventoryvendor')->name('inventoryvendor');
        Route::post('paycustomervendor/{order_complain_id}', 'inventoryController@paycustomervendor')->name('paycustomervendor');
              
        Route::get('dispatch_panelvendor', 'DispatchvendorController@dispatch_panelvendor')->name('dispatch_panelvendor');
        Route::post('assignedcashrequestvendor', 'DispatchvendorController@assignedcashrequestvendor')->name('assignedcashrequestvendor');
             
        Route::get('resturantcomission', 'ComissionController@resturantcomission')->name('resturantcomission');
        Route::get('resturantsendrequest/{com_id}', 'ComissionController@resturantsendrequest')->name('resturantsendrequest');
        Route::post('resturantsearchcomission', 'ComissionController@resturantsearchcomission')->name('resturantsearchcomission');
        Route::get('resturantallexcelgenerator', 'ComissionController@resturantallexcelgenerator')->name('resturantallexcelgenerator');
        Route::get('resturantexcelgenerator/{startdate}/{enddate}', 'ComissionController@resturantexcelgenerator')->name('resturantexcelgenerator');
        Route::get('resturantdelivery_boy_comission', 'delivery_boy_comissionController@resturantdelivery_boy_comission')->name('resturantdelivery_boy_comission');
        Route::post('resturantsearchdeliveryboy', 'delivery_boy_comissionController@resturantsearchdeliveryboy')->name('resturantsearchdeliveryboy');
        Route::get('resturantallexceldownload', 'delivery_boy_comissionController@resturantallexceldownload')->name('resturantallexceldownload');
        Route::get('resturantexceldownload/{startdate}/{enddate}', 'delivery_boy_comissionController@resturantexceldownload')->name('resturantexceldownload');
                    
        //  Route::post('searchstock','Today_OrderController@searchstock')->name('searchstock');
        //  Route::get('low_stock','Today_OrderController@low_stock')->name('low_stock');
        //  Route::post('update_stock','Today_OrderController@update_stock')->name('update_stock');
             
        //for notification
        Route::get('vendor_notification', 'NotificationController@vendor_notification')->name('vendor-notification');
        Route::get('resturantcityadmindelivery_boy', 'delivery_boyController@resturantcityadmindelivery_boy')->name('resturantcityadmindelivery_boy');

        Route::resource('restautrant_ordertaker', 'OrdertakerController');

        // ? campaign routes start
        Route::get('campaign-list', 'CampaignController@index')->name('restaurant.campaign.index');
        Route::get('campaign-join/{campaign}', 'CampaignController@joinCampaign')->name('restaurant.campaign.join');
        Route::post('get-category-products', 'CampaignController@getCategoryProducts')->name('restaurant.get_category_products');
        Route::post('get-product-varients', 'CampaignController@getProductVarients')->name('restaurant.get_product_varients');
        Route::post('campaign-join-store', 'CampaignController@storeJoinCampaign')->name('restaurant.campaign.join.store');
        Route::get('campaign-joined-edit/{campaign_id}', 'CampaignController@joinedCampaignIndex')->name('restaurant.campaign.joined.edit');
        Route::post('campaign-joined-update', 'CampaignController@updateJoinedCampaign')->name('restaurant.campaign.join.update');

    });