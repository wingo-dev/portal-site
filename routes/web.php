<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

//admin part
Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/add-customer', 'AdminController@viewAddForm')->name('admin.view_add_form');
    Route::post('/add-customer', 'AdminController@storeCustomer')->name('admin.store_customer');
    //    org part
    Route::get('/add-organization', 'AdminController@viewOrg')->name('admin.view_org_form');
    Route::post('/add-organization', 'AdminController@storeOrg')->name('admin.store_org');
    Route::get('/delete-org/{id}', 'AdminController@deleteOrg')->name('admin.delete_org');
    //    product part
    Route::get('/add-product', 'AdminController@viewProduct')->name('admin.view_product');
    Route::post('/add-product', 'AdminController@storeProduct')->name('admin.store_product');
    Route::get('/delete-product/{id}', 'AdminController@deleteProduct')->name('admin.delete_product');

});
//user part
Route::group(['prefix' => 'user'], function(){
    Route::get('dashboard', 'UserController@index')->name('user.dashboard');
    Route::get('/password-change', 'UserController@showPassword')->name('user.change_password');
    Route::post('/password-change', 'UserController@storeChange')->name('user.change_store');
});

// cache
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
