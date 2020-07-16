<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// This is how to use routes without controller
Route::get("/hello", function(){
    return "Hello world";
});
// This is how do we use route with controller
Route::get('/rooms','ShowRoomsController');

// Bookings here is the url actually
Route::resource('bookings','BookingController');
