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
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', 'UserController@index')->name('index')->middleware(['can:backend.user.index']);
        Route::get('/create', 'UserController@create')->name('create')->middleware(['can:backend.user.create']);
        Route::post('/store', 'UserController@store')->name('store')->middleware(['can:backend.user.store']);
        Route::get('/show/{id}', 'UserController@show')->where('id', '[0-9]+')->name('show')->middleware(['can:backend.user.show']);
        Route::get('/edit/{id}', 'UserController@edit')->where('id', '[0-9]+')->name('edit')->middleware(['can:backend.user.edit']);
        Route::post('/update/{id}', 'UserController@update')->where('id', '[0-9]+')->name('update')->middleware(['can:backend.user.update']);
        Route::get('/delete/{id}', 'UserController@delete')->where('id', '[0-9]+')->name('delete')->middleware(['can:backend.user.delete']);
        Route::post('/destroy/{id}', 'UserController@destroy')->where('id', '[0-9]+')->name('destroy')->middleware(['can:backend.user.destroy']);

        /*
         * response
         */
        Route::patch('/block-user/{id}', 'UserController@blockUser')->where('id', '[0-9]+')->name('blockUser')->middleware(['can:backend.user.blockUser']);
    });

});


/****************************************
 ***************Frontends*****************
 ****************************************/
Route::namespace('Frontends')->name('frontend.')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');

});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/broadcast', 'BroadCastController@index')->name('broadcast');
//Route::get('test', function (){
//    return view('backends.layouts.app');
//});

Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:backend.index']);
