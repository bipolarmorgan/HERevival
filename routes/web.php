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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('internet')->group(function() {
    Route::get('{network:ip_address}', 'InternetController@index')->name('internet');
    Route::post('', 'InternetController@navigate')->name('internet.navigate');
});

Route::prefix('slaves')->group(function() {
    Route::get('', 'SlaveController@index')->name('slaves');
});
