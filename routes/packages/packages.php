<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Packages', 'prefix'=>'franchise-admin/packages'], function () {

    Route::resource('/', 'CountryPackagesController');

});