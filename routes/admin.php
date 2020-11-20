<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//note that the prefix is admin for all file route
Route::group( ['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function(){

        Route::group(['namespace' => 'Dashboard', 'middleware'=>'auth:admin','prefix'=>'admin'], function () {

            Route::get('/', 'DashboardController@index')->name('admin.dashboard');

            // settings Route group
            Route::group(['prefix' => 'settings'], function () {

                Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shipping.methods');
                Route::get('shipping-methods-update/{id}', 'SettingsController@updateShippingMethods')->name('update.shipping.methods');

            });



        });

        Route::group(['namespace' => 'Dashboard','middleware'=>'guest:admin','prefix'=>'admin'], function () {

            Route::get('login', 'LoginController@index')->name('admin.login');
            Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

        });

    });

