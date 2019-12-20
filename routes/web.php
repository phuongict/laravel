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
Route::namespace('Backends')->prefix('admincp')->name('backend.')->middleware(['auth', 'can:backend'])->group(function (){
    Route::get('/', function(){
        return view('backends.admincp.index');
    })->name('index');
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', 'UserController@index')
            ->name('index')
            ->middleware(['can:backend.user.index']);
        Route::get('/create', 'UserController@create')
            ->name('create')
            ->middleware(['can:backend.user.create']);
        Route::post('/store', 'UserController@store')
            ->name('store')
            ->middleware(['can:backend.user.create']);
        Route::get('/profile/{id}', 'UserController@show')
        ->where('id', '[0-9]+')->name('show')
        ->middleware(['can:backend.user.show']);
        Route::get('/edit/{id}', 'UserController@edit')
            ->where('id', '[0-9]+')->name('edit')
            ->middleware(['can:backend.user.edit']);
        Route::post('/update/{id}', 'UserController@update')
            ->where('id', '[0-9]+')->name('update')
            ->middleware(['can:backend.user.edit']);
        Route::get('/edit-permission/{id}', 'UserController@editPermission')
            ->where('id', '[0-9]+')->name('edit-permission')
            ->middleware(['can:backend.user.editPermission']);
        Route::post('/update-permission/{id}', 'UserController@updatePermission')
            ->where('id', '[0-9]+')
            ->name('update-permission')
            ->middleware(['can:backend.user.editPermission']);
        Route::get('/change-password-user/{id}', 'UserController@changePasswordUser')
            ->where('id', '[0-9]+')->name('change-password-user')
            ->middleware(['can:backend.user.change-password-user']);
        Route::post('/save-change-password-user/{id}', 'UserController@saveChangePasswordUser')
            ->where('id', '[0-9]+')->name('save-change-password-user')
            ->middleware(['can:backend.user.change-password-user']);

        Route::get('/change-password', 'UserController@changePassword')
            ->name('change-password')
            ->middleware(['can:backend.user.change-password']);

        Route::post('/save-change-password', 'UserController@saveChangePassword')
            ->name('save-change-password')
            ->middleware(['can:backend.user.change-password']);
        /*
         * response
         */
        Route::patch('/block-user/{id}', 'UserController@blockUser')
            ->where('id', '[0-9]+')
            ->name('blockUser')
            ->middleware(['can:backend.user.blockUser']);
    });

    Route::prefix('permission')->name('permission.')->group(function() {
        Route::get('/', 'PermissionController@index')
            ->name('index')
            ->middleware(['can:backend.permission.index']);
        Route::get('/create', 'PermissionController@create')
            ->name('create')
            ->middleware(['can:backend.permission.create']);
        Route::post('/store', 'PermissionController@store')
            ->name('store')
            ->middleware(['can:backend.permission.create']);
        Route::get('/edit/{id}', 'PermissionController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.permission.edit']);
        Route::post('/update/{id}', 'PermissionController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.permission.edit']);
        Route::get('/delete/{id}', 'PermissionController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.permission.delete']);
        Route::post('/destroy/{id}', 'PermissionController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.permission.delete']);
    });

    Route::prefix('role')->name('role.')->group(function() {
        Route::get('/', 'RoleController@index')
            ->name('index')
            ->middleware(['can:backend.role.index']);
        Route::get('/create', 'RoleController@create')
            ->name('create')
            ->middleware(['can:backend.role.create']);
        Route::post('/store', 'RoleController@store')
            ->name('store')
            ->middleware(['can:backend.role.create']);
        Route::get('/edit/{id}', 'RoleController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.role.edit']);
        Route::post('/update/{id}', 'RoleController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.role.edit']);
        Route::get('/delete/{id}', 'RoleController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.role.delete']);
        Route::post('/destroy/{id}', 'RoleController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.role.delete']);
    });

    Route::prefix('menu')->name('menu.')->group(function() {
        Route::get('/', 'MenuController@index')
            ->name('index')
            ->middleware(['can:backend.menu.index']);
        Route::get('/create', 'MenuController@create')
            ->name('create')
            ->middleware(['can:backend.menu.create']);
        Route::post('/store', 'MenuController@store')
            ->name('store')
            ->middleware(['can:backend.menu.create']);
        Route::get('/edit/{id}', 'MenuController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.menu.edit']);
        Route::post('/update/{id}', 'MenuController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.menu.edit']);
        Route::get('/delete/{id}', 'MenuController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.menu.delete']);
        Route::post('/destroy/{id}', 'MenuController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.menu.delete']);

        Route::get('/sort-menu', 'MenuController@sortMenu')
            ->name('sort-menu')
            ->middleware(['can:backend.menu.sort-menu']);

        //response
        Route::get('/get-all-item-menu', 'MenuController@getAllItemMenu')
            ->name('get-all-item-menu')
            ->middleware(['can:backend.menu.get-all-item-menu']);

        Route::patch('/update-sort-menu', 'MenuController@updateSortMenu')
            ->name('update-sort-menu')
            ->middleware(['can:backend.menu.update-sort-menu']);
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
