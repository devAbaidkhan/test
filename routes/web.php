<?php

Route::get('test-code','TestController@test');

/*
//* Admin Routes
*/
Route::get('test-code','TestController@test');
Route::get('fcm', 'Chat\RestaurantChatController@create');
Route::get('restaurant/chat/{order_id}', 'Chat\RestaurantChatController@index')->name('restaurant-chat');
require __DIR__.'/admin.php';


/////////////////////////////////////////////////
/////////////for Vendor//////////////////////
////////////////////////////////////////////////

require __DIR__.'/grocery.php';
/////////////////////////////////////////////////
/////////////for resturant//////////////////////
////////////////////////////////////////////////

require __DIR__.'/restaurant.php';

    /////////////////////////////////////////////////
/////////////for Pharmacy//////////////////////
////////////////////////////////////////////////
require __DIR__.'/pharmacy.php';
    
/* franchise-route */

require __DIR__.'/franchise_admin.php';
    
    
    
    
/////////////////////////////////////////////////
/////////////for API//////////////////////
////////////////////////////////////////////////


require __DIR__.'/webapi.php';


/////////////////////////////////////////////////
/////////////for Parcel//////////////////////
////////////////////////////////////////////////
require __DIR__.'/parcel.php';


/*
//* Order Taker Routes
*/
require __DIR__.'/ordertaker.php';


/*
//* Order Taker Routes
*/
require __DIR__.'/delivery_boy.php';
/*
//* Offers and Packages
*/
require __DIR__.'/packages/packages.php';
