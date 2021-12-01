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
});
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
