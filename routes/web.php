<?php

use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

// Route::get('storage/{any}', 'StorageController@index')->where('any', '.*');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    $user = Auth::user()->status ?? null;
    if ($user === 'admin') {
        return redirect('/admin/index');
    } else {
        return view('404');
    }
});
Route::get('/test', function () {
    return view('test');
});
Route::get('storage/{any}', 'StorageController@index')->where('any', '.*');
Auth::routes();
// User
Route::get('/home', 'ProductController@all');
Route::get('/supply', 'ProductController@supply');
Route::get('/supply/detail/{id}', 'ProductController@supplydetail')->name('user.supply_detail');
Route::get('/service', 'HomeController@service')->name('user.service');
Route::get('/product/{id}', 'ProductController@show')->name('product.detail');
Route::get('/product', 'ProductController@index');
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart/index', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{id}/{value}', 'CartController@update')->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::resource('orders', 'OrderController')->middleware('auth');
Route::post('/order/thaipostapi', 'OrderController@thaipostapi');
Route::resource('admins', 'AdminController')->middleware('auth');
Route::get('/edit/{id}', 'AdminController@show')->name('admin.edit')->middleware('auth');
Route::get('/edit/profile/{id}', 'HomeController@edit')->name('user.edit')->middleware('auth');
Route::get('/admin/add', 'AdminController@add')->name('admin.add')->middleware('auth');
Route::put('/product/update/{id}', 'AdminController@update')->name('admin.update')->middleware('auth');
Route::put('/user/update/{id}', 'HomeController@update')->name('user.update')->middleware('auth');
Route::get('/admin/delete/{id}', 'AdminController@delete')->name('admin.delete')->middleware('auth');


// admin
Route::get('/admin/order', 'AdminController@order')->middleware('auth');
Route::get('/admin/manage', 'AdminController@all')->middleware('auth');
Route::get('/admin/index', 'AdminController@home')->middleware('auth');
Route::get('/admin/return', 'AdminController@return')->name('admin.return')->middleware('auth');
Route::get('/admin/order/detail/{id}', 'AdminController@detail')->name('admin.order_detail')->middleware('auth');


Route::get('/order/update/{id}', 'OrderController@update')->name('order.update')->middleware('auth');
Route::get('/order/note/{id}', 'OrderController@note')->name('order.note')->middleware('auth');
Route::get('/order/supply/{id}', 'OrderController@supply')->name('order.supply')->middleware('auth');
Route::get('/order/print', 'OrderController@print')->name('order.print')->middleware('auth');

Route::get('/search', 'ProductController@search')->name('search');

// Return
Route::get('/return', 'ReturnController@return')->name('return');
Route::post('/return/store', 'ReturnController@store')->name('return.store');
Route::post('/testApi', 'TestController@test');
Route::get('/return/update/{id}', 'ReturnController@update')->name('return.update')->middleware('auth');
Route::get('/admin/return/{id}', 'ReturnController@detail')->name('return.detail')->middleware('auth');


Auth::routes();
