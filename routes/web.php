<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use App\Booking;
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
    Route::get('concert', 'ConcertsController@index')->name('admin.concert.index');
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
    
    Route::get('booking/index','BookingsController@index')->name('user.booking.index');
    Route::get('booking/{id}', 'BookingsController@show')->name('user.booking.show');
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

Route::get('test', function() {
    $now = Carbon::now()->format('Y-m-d H:i:s');
    $expired = Carbon::now()->addDays(2);
    dd($expired->format('Y-m-d H:i:s'));
    // Booking::where('expired', '<', $now)->update(['status' => 0]);
    // $booking = Booking::where('booking_time', '<', $now)->get();
    // dd($booking);
})->name('test');