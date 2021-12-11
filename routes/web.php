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

Route::get('/', function() { return view('site');})->name('root');

Route::group(
    ['prefix' => 'admin', 
    'namespace' => 'Admin',
    'middleware' => 'admin'
    ], function()
    {
    // Route::resource('user', 'ConcertsController');
    Route::get('concert', 'ConcertsController@index');
    }
);
Route::group(
    ['prefix' => 'user', 
    'namespace' => 'User',
    'middleware' => 'auth'
    ], function()
    {
    // Route::resource('user', 'ConcertsController');
    Route::get('concert', 'ConcertsController@index')->name('user.concert.index');
    Route::get('concert/{id}', 'ConcertsController@show')->name('user.concert.show');
    Route::post('concert/add-to-cart', 'ConcertsController@addToCart')->name('add.to.cart');
    Route::get('cart','CartsController@index')->name('user.cart.index');
    Route::patch('cart/update', 'CartsController@update')->name('user.cart.update');
    Route::delete('cart/delete', 'CartsController@delete')->name('user.cart.delete');
    Route::post('booking/place-order', 'BookingsController@placeOrder')->name('place.order');   
});
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cart', function() {
    $cart = session()->get('cart');
    dd($cart);
})->name('cart');

Route::get('clear-cart', function() {    
    session()->forget('cart');
})->name('clear.cart');
