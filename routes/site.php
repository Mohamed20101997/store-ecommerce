<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', 'HomeController@index')->name('home');

Route::group( ['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'] ], function(){


        Route::group(['namespace' => 'Site', 'middleware'=>'auth' , 'VerifiedUser'], function () {

            Route::get('profile', function (){
               return 'User Verified';
            });


        });

        Route::group(['namespace' => 'Site','middleware'=>'guest'], function () {

                //guest user

        });

    });


Route::get('verify', function (){
   return view('auth.verification');
});

