<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Auth::routes();

Route::group( [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){


    Route::group(['namespace' => 'Site'], function () {
        //guest  user
        Route::get('/', 'HomeController@index')->name('home')->middleware('VerifiedUser');

    });

    Route::group(['namespace' => 'Site', 'middleware' => ['auth', 'VerifiedUser']], function () {
        // must be authenticated user and verified
        Route::get('profile', function () {
            return 'You Are Authenticated ';
        });
    });



    Route::group(['namespace' => 'Site', 'middleware'=>'auth'], function () {
        // must be authenticated user
        Route::get('verify', 'VerificationCodeController@getVerifyPage')->name('get.verification.form');
        Route::post('verify-user/', 'VerificationCodeController@verify')->name('verify-user');

    });

});

