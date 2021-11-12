<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Packages', 'prefix'=>'franchise-admin'], function () {

    Route::resource('packages', 'CountryPackagesController');

});