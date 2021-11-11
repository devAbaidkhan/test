<?php

use Illuminate\Support\Facades\Route;

// for login
Route::group(['namespace'=>'DeliveryBoy','prefix'=>'rider','as'=>'delivery_boy.'], function () {
    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/check-ordertaker-login', 'LoginController@checkLogin')->name('check.login');
});


Route::group(['namespace'=>'DeliveryBoy','prefix'=>'rider','as'=>'delivery_boy.'], function () {
    Route::get('index', 'HomeController@vendorIndex')->name('index');
    Route::get('logout', 'HomeController@logout')->name('logout');


    Route::get('orders', 'OrderController@today_order_restaurant')->name('today_order_restaurant');
    Route::post('orders-list', 'OrderController@today_order_restaurant_list')->name('today_order_restaurant_list');
    Route::get('order-detail/{ordrid}', 'OrderController@order_restaurant_detail')->name('order.detail');
    Route::post('change_order_status', 'OrderController@change_order_restaurant_status')->name('change_order_restaurant_status');
    Route::post('order_arrived', 'OrderController@order_arrived')->name('order_arrived');
});
