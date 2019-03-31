<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //Dashboard
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('products', 'ProductsController');

    //Settings Module
    Route::resource('warehouses', 'WarehouseController');
    Route::resource('categories', 'CategoryController');

    //Registry Module
    Route::get('suppliers/suggestions', 'SupplierController@suggestions');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('customers', 'CustomerController');
    Route::resource('salesRep', 'SalesRepController');

});
