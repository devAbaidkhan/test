<?php

use Illuminate\Support\Facades\Route;

// for login
Route::group(['namespace'=>'Ordertaker','prefix'=>'ordertaker','as'=>'ordertaker.'], function () {
    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/check-ordertaker-login', 'LoginController@checkLogin')->name('check.login');
});


Route::group(['namespace'=>'Ordertaker','prefix'=>'ordertaker','as'=>'ordertaker.'], function () {
    Route::get('index', 'HomeController@vendorIndex')->name('index');
    Route::get('logout', 'HomeController@logout')->name('logout');


    Route::get('today_order_restaurant', 'OrderController@today_order_restaurant')->name('today_order_restaurant');
    Route::post('today_order_restaurant_list', 'OrderController@today_order_restaurant_list')->name('today_order_restaurant_list');
    Route::get('order_restaurant_detail/{ordrid}', 'OrderController@order_restaurant_detail')->name('order.detail');
    Route::post('change_order_restaurant_status', 'OrderController@change_order_restaurant_status')->name('change_order_restaurant_status');

    Route::post('assign-rider', 'OrderController@assign_rider')->name('order.assign.rider');
});
