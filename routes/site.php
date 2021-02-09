<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group( ['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function(){


        Route::group(['namespace' => 'Site', 'middleware'=>'auth'], function () {

      


        });

        Route::group(['namespace' => 'Dashboard','middleware'=>'guest'], function () {



        });

    });

