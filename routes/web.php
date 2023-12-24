<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'RevenueController@index')->name('home');

Route::get('login', 'UserController@getLogin')->name('get.login');
Route::post('Login', 'UserController@postLogin')->name('post.login');

Route::middleware(['auth'])->group(function () {
    Route::get('Register', 'UserController@getRegister')->name('get.register');
    Route::post('Register', 'UserController@postRegister')->name('post.register');

    Route::get('index_product', 'productController@index')->name('products.index');
    Route::get('search_product', 'productController@search')->name('products.search');
    Route::get('index2_product', 'productController@index2')->name('products.index2');
    Route::get('search_product2', 'productController@search2')->name('products.search2');
    Route::get('create_product', 'productController@create')->name('products.create');
    Route::post('store_product', 'productController@store')->name('products.store');
    Route::put('update_product/{product}', 'productController@update')->name('products.update');
    Route::delete('delete_product/{product}', 'productController@destroy')->name('products.delete');
    Route::get('edit_product/{product}', 'productController@edit')->name('products.edit');

    Route::get('brand_index', 'brandController@index')->name('brands.index');
    Route::get('brand_create', 'brandController@create')->name('brands.create');
    Route::post('brand_store', 'brandController@store')->name('brands.store');
    Route::get('brand_edit/{brand}','brandController@edit')->name('brands.edit');
    Route::put('brand_update/{brand}', 'brandController@update')->name('brands.update');
    Route::delete('brand_delete/{brand}', 'brandController@destroy')->name('brands.delete');

    Route::get('index_order', 'OrderController@index')->name('orders.index');
    Route::get('create_order', 'OrderController@create')->name('orders.create');
    Route::post('delete_order/dd', 'OrderController@deleteCart');
    Route::get('check_out_order', 'OrderController@checkOut')->name('orders.checkout');
    Route::get('addCart', 'UserController@addCart')->name('addCart');
    Route::post('add_cart/aa', 'UserController@add');
    Route::post('complete', 'OrderController@complete')->name('complete');
    Route::get('search_product_order', 'OrderController@search');

    Route::get('revenue_create', 'RevenueController@create')->name('revenue.create');
    Route::post('revenue_store', 'RevenueController@store')->name('revenue.store');

    Route::post('logout', 'UserController@logout')->name('logout');
});




