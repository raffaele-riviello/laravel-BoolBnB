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

// ------------rotte guests------------
Route::get('/home', function () {
    return view('home');
});

// ------------appartamenti------------
Route::get('/results', 'GuestApartamentController@index')->name('results');
Route::get('/apartaments/{id}', 'GuestApartamentController@show')->name('results.apartament');
// ------------appartamenti------------

// --------------messaggi--------------
Route::resource('messages', 'MessageController');
// --------------messaggi--------------

// ------------rotte guests------------

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::namespace('Admin')
->name('admin.')
->prefix('admin')
->middleware('auth')
->group(function (){
    Route::resource('apartaments', 'ApartamentController');
    // Route::resource('photos', 'PhotoController');
    // Route::resource('features', 'FeatureController');
    // Route::resource('messages', 'MessageController');
    // Route::resource('services', 'ServiceController');
});
