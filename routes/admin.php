<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//note that the prefix is admin for all file route
Route::group( ['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function(){

        Route::group(['namespace' => 'Dashboard', 'middleware'=>'auth:admin','prefix'=>'admin'], function () {

            Route::get('/', 'DashboardController@index')->name('admin.dashboard');

            //logout route
            Route::get('logout', 'LoginController@logout')->name('admin.logout');


            // settings Route group
            Route::group(['prefix' => 'settings'], function () {

                Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shipping.methods');
                Route::get('shipping-methods-update/{id}', 'SettingsController@updateShippingMethods')->name('update.shipping.methods');
            });


            // Profile Route group
            Route::group(['prefix' => 'profile'], function () {
                Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
                Route::put('update', 'ProfileController@updateProfile')->name('update.profile');
            });


            // Category Routes
            Route::resource('category', 'MainCategoriesController');

            // Brand Routes
            Route::resource('brands', 'BrandsController');

            // tags Routes
            Route::resource('tags', 'TagsController');

            // products Routes
            Route::resource('products', 'ProductsController');
            // product price
            Route::get('productPrice/{id}', 'ProductsController@getPrice')->name('products.getPrice');
            Route::post('productPrice', 'ProductsController@saveProductPrice')->name('products.saveProductPrice');

            // product stock
            Route::get('productStock/{id}', 'ProductsController@getStock')->name('products.getStock');
            Route::post('productStock', 'ProductsController@saveProductStock')->name('products.saveProductStock');

            // product images
            Route::get('productImage/{id}', 'ProductsController@getImage')->name('products.getImage');
            Route::post('productImage', 'ProductsController@saveProductImage')->name('products.saveProductImage');
            Route::post('productImageDb', 'ProductsController@saveProductImageDb')->name('products.saveProductImageDb');

            // products attributes
            Route::resource('attributes', 'AttributesController');

            // products options
            Route::resource('options', 'OptionController');


        });

        Route::group(['namespace' => 'Dashboard','middleware'=>'guest:admin','prefix'=>'admin'], function () {

            Route::get('login', 'LoginController@index')->name('admin.login');


            Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

        });

    });

