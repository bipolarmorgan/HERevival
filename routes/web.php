<?php

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

Route::middleware([ 'auth' ])->group(function () {

    Route::get('home', 'HomeController@index')->name('home');

    Route::prefix('internet/{ip?}')->group(function () {

        /* GET */
        Route::get('/', 'BrowserController@index')->name('get.browser.index');
        Route::get('/login', 'BrowserController@showLogin')->name('get.browser.login');
        Route::get('/exploits', 'BrowserController@exploits')->name('get.browser.exploits');


        /* POST */
        Route::post('', 'BrowserController@browse')->name('post.browser.browse');
        Route::post('/login', 'BrowserController@login')->name('post.browser.login');
        Route::post('/exploit', 'BrowserController@exploit')->name('post.browser.exploit');
    });
});
