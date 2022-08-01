<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/detail/{slug}', 'CategoryController@detail')->name('categories-detail');
Route::get('/detail/{slug}', 'DetailController@index')->name('detail');
Route::get('/detail/add/{id}', 'DetailController@add')->name('detail-add');

Route::get('/success', 'CartController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');


Route::middleware('auth')->group(function(){
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-remove');
    
    Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

    Route::get('/dashboard/product', 'Dashboard\ProductController@index')->name('dashboard-product');
    Route::get('/dashboard/product/create', 'Dashboard\ProductController@create')->name('dashboard-product-create');
    Route::post('/dashboard/product/store', 'Dashboard\ProductController@store')->name('dashboard-product-store');
    Route::get('/dashboard/product/{id}', 'Dashboard\ProductController@detail')->name('dashboard-product-detail');
    Route::post('/dashboard/product/update', 'Dashboard\ProductController@update')->name('dashboard-product-update');
    Route::post('/dashboard/product/gallery/upload', 'Dashboard\ProductController@upload')->name('dashboard-product-upload-gallery');
    Route::get('/dashboard/product/gallery/delete/{id}', 'Dashboard\ProductController@delete')->name('dashboard-product-delete-gallery');

    Route::get('/dashboard/transaction', 'Dashboard\TransactionController@index')->name('dashboard-transaction');
    Route::get('/dashboard/transaction/{id}', 'Dashboard\TransactionController@detail')->name('dashboard-transaction-detail');
    Route::post('/dashboard/transaction/{id}', 'Dashboard\TransactionController@update')->name('dashboard-transaction-update');

    Route::get('/dashboard/account-setting', 'Dashboard\SettingController@account')->name('dashboard-account-setting');
    Route::get('/dashboard/store-setting', 'Dashboard\SettingController@store')->name('dashboard-store-setting');

    Route::post('/dashboard/update-setting/{redirect}', 'Dashboard\SettingController@update')->name('dashboard-update-setting');
});


Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'admin'])->group(function (){
    Route::get('/', 'AdminController@index')->name('admin-dashboard');

    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('product-gallery', 'ProductGalleryController');
});

Auth::routes();



