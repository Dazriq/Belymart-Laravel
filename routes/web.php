<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Product;
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
    return view();
});


Route::get('/', 'App\Http\Controllers\BelyMartController@index');
Route::resource('belymart', 'App\Http\Controllers\BelyMartController');

Route::get('/homeLoggedIn', 'App\Http\Controllers\BelyMartController@homeLoggedIn');
Route::get('/login', 'App\Http\Controllers\BelyMartController@login');
Route::get('/logout', 'App\Http\Controllers\BelyMartController@logout');
Route::get('/signup', 'App\Http\Controllers\BelyMartController@signup');
Route::get('/allproducts/{category}', 'App\Http\Controllers\BelyMartController@allproducts');
Route::get('/productView/{productId}', 'App\Http\Controllers\BelyMartController@productView');
Route::get('/cart', 'App\Http\Controllers\BelyMartController@cart');
Route::get('/removeFromCart/{cartId}', 'App\Http\Controllers\BelyMartController@removeFromCart');
Route::get('/receipt', 'App\Http\Controllers\BelyMartController@receipt');
Route::get('/pay', 'App\Http\Controllers\BelyMartController@pay');
Route::get('/cancelPay', 'App\Http\Controllers\BelyMartController@cancelPay');


Route::post('/addToCart', 'App\Http\Controllers\BelyMartController@addToCart');
Route::post('/searchProducts', 'App\Http\Controllers\BelyMartController@searchProducts');
Route::post('/authenticate', 'App\Http\Controllers\BelyMartController@authenticate');
Route::post('/createaccount', 'App\Http\Controllers\BelyMartController@createAccount');






