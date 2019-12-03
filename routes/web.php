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
/****************************************
 ***************Backends*****************
 ****************************************/
Route::namespace('Backends')->prefix('admincp')->name('backend.')->middleware(['auth'])->group(function (){
    Route::resource('/users', 'UserController');
});






/****************************************
 ***************Frontends*****************
 ****************************************/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/broadcast', 'BroadCastController@index')->name('broadcast');
//Route::get('test', function (){
//    return view('backends.layouts.app');
//});

Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:backend.index']);
