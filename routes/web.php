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
            ->name('block-user')
            ->middleware(['can:backend.user.block-user']);
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

    /*  Category */
    Route::prefix('category')->name('category.')->group(function() {
        Route::get('/', 'CategoryController@index')
            ->name('index')
            ->middleware(['can:backend.category.index']);
        Route::get('/create', 'CategoryController@create')
            ->name('create')
            ->middleware(['can:backend.category.create']);
        Route::post('/store', 'CategoryController@store')
            ->name('store')
            ->middleware(['can:backend.category.create']);
        Route::get('/edit/{id}', 'CategoryController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.category.edit']);
        Route::post('/update/{id}', 'CategoryController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.category.edit']);
        Route::get('/delete/{id}', 'CategoryController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.category.delete']);
        Route::post('/destroy/{id}', 'CategoryController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.category.delete']);
    });

    /*
     * Post
     */
    Route::prefix('post')->name('post.')->group(function() {
        Route::get('/', 'PostController@index')
            ->name('index')
            ->middleware(['can:backend.post.index']);
        Route::get('/create', 'PostController@create')
            ->name('create')
            ->middleware(['can:backend.post.create']);
        Route::post('/store', 'PostController@store')
            ->name('store')
            ->middleware(['can:backend.post.create']);
        Route::get('/edit/{id}', 'PostController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.post.edit']);
        Route::post('/update/{id}', 'PostController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.post.edit']);
        Route::get('/delete/{id}', 'PostController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.post.delete']);
        Route::post('/destroy/{id}', 'PostController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.post.delete']);

        //api
        Route::patch('/change-status/{id}', 'PostController@changeStatus')
            ->where('id', '[0-9]+')->name('change-status')
            ->middleware(['can:backend.post.change-status']);
    });
    /*  City Province */
    Route::prefix('city-province')->name('city-province.')->group(function() {
        Route::get('/', 'CityProvinceController@index')
            ->name('index')
            ->middleware(['can:backend.city-province.index']);
    });
    /*  District */
    Route::prefix('district')->name('district.')->group(function() {
        Route::get('/', 'DistrictController@index')
            ->name('index')
            ->middleware(['can:backend.district.index']);
    });
    /*  Village */
    Route::prefix('village')->name('village.')->group(function() {
        Route::get('/', 'VillageController@index')
            ->name('index')
            ->middleware(['can:backend.village.index']);
    });

    /*  Product Category */
    Route::prefix('product-category')->name('product-category.')->group(function() {
        Route::get('/', 'ProductCategoryController@index')
            ->name('index')
            ->middleware(['can:backend.product-category.index']);
        Route::get('/create', 'ProductCategoryController@create')
            ->name('create')
            ->middleware(['can:backend.product-category.create']);
        Route::post('/store', 'ProductCategoryController@store')
            ->name('store')
            ->middleware(['can:backend.product-category.create']);
        Route::get('/edit/{id}', 'ProductCategoryController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.product-category.edit']);
        Route::post('/update/{id}', 'ProductCategoryController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.product-category.edit']);
        Route::get('/delete/{id}', 'ProductCategoryController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.product-category.delete']);
        Route::post('/destroy/{id}', 'ProductCategoryController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.product-category.delete']);
    });

    /*  Unit */
    Route::prefix('unit')->name('unit.')->group(function() {
        Route::get('/', 'UnitController@index')
            ->name('index')
            ->middleware(['can:backend.unit.index']);
        Route::get('/create', 'UnitController@create')
            ->name('create')
            ->middleware(['can:backend.unit.create']);
        Route::post('/store', 'UnitController@store')
            ->name('store')
            ->middleware(['can:backend.unit.create']);
        Route::get('/edit/{id}', 'UnitController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.unit.edit']);
        Route::post('/update/{id}', 'UnitController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.unit.edit']);
        Route::get('/delete/{id}', 'UnitController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.unit.delete']);
        Route::post('/destroy/{id}', 'UnitController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.unit.delete']);
    });

    /*
 * Product
 */
    Route::prefix('product')->name('product.')->group(function() {
        Route::get('/', 'ProductController@index')
            ->name('index')
            ->middleware(['can:backend.product.index']);
        Route::get('/create', 'ProductController@create')
            ->name('create')
            ->middleware(['can:backend.product.create']);
        Route::post('/store', 'ProductController@store')
            ->name('store')
            ->middleware(['can:backend.product.create']);
        Route::get('/edit/{id}', 'ProductController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.product.edit']);
        Route::post('/update/{id}', 'ProductController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.product.edit']);
        Route::get('/delete/{id}', 'ProductController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.product.delete']);
        Route::post('/destroy/{id}', 'ProductController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.product.delete']);

        //api
        Route::patch('/change-status/{id}', 'ProductController@changeStatus')
            ->where('id', '[0-9]+')->name('change-status')
            ->middleware(['can:backend.product.change-status']);
        Route::patch('/change-feature/{id}', 'ProductController@changeFeature')
            ->where('id', '[0-9]+')->name('change-feature')
            ->middleware(['can:backend.product.change-feature']);
    });
    Route::prefix('slide')->name('slide.')->group(function() {
        Route::get('/', 'SlideController@index')
            ->name('index')
            ->middleware(['can:backend.slide.index']);
        Route::get('/create', 'SlideController@create')
            ->name('create')
            ->middleware(['can:backend.slide.create']);
        Route::post('/store', 'SlideController@store')
            ->name('store')
            ->middleware(['can:backend.slide.create']);
        Route::get('/edit/{id}', 'SlideController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.slide.edit']);
        Route::post('/update/{id}', 'SlideController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.slide.edit']);
        Route::get('/delete/{id}', 'SlideController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.slide.delete']);
        Route::post('/destroy/{id}', 'SlideController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.slide.delete']);
        Route::patch('/change-status/{id}', 'SlideController@changeStatus')
            ->where('id', '[0-9]+')->name('change-status')
            ->middleware(['can:backend.slide.change-status']);
    });
    /*  Order */
    Route::prefix('order')->name('order.')->group(function() {
        Route::get('/', 'OrderController@index')
            ->name('index')
            ->middleware(['can:backend.order.index']);
        Route::get('/create', 'OrderController@create')
            ->name('create')
            ->middleware(['can:backend.order.create']);
        Route::post('/store', 'OrderController@store')
            ->name('store')
            ->middleware(['can:backend.order.create']);
        Route::get('/edit/{id}', 'OrderController@edit')
            ->where('id', '[0-9]+')
            ->name('edit')
            ->middleware(['can:backend.order.edit']);
        Route::post('/update/{id}', 'OrderController@update')
            ->where('id', '[0-9]+')
            ->name('update')
            ->middleware(['can:backend.order.edit']);
        Route::get('/delete/{id}', 'OrderController@delete')
            ->where('id', '[0-9]+')
            ->name('delete')
            ->middleware(['can:backend.order.delete']);
        Route::post('/destroy/{id}', 'OrderController@destroy')
            ->where('id', '[0-9]+')->name('destroy')
            ->middleware(['can:backend.order.delete']);
        Route::patch('/change-status/{id}', 'OrderController@changeStatus')
            ->where('id', '[0-9]+')->name('change-status')
            ->middleware(['can:backend.order.change-status']);
        Route::get('/order-detail/{id}', 'OrderController@orderDetail')
            ->where('id', '[0-9]+')->name('order-detail')
            ->middleware(['can:backend.order.order-detail']);
    });

});


/****************************************
 ***************Frontends*****************
 ****************************************/
Route::namespace('Frontends')->name('frontend.')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');
    Route::name('post.')->prefix('post')->group(function(){
        Route::get('/detail/{slug}-{id}.html', 'PostController@detail')
            ->where('slug', '[0-9a-zA-Z\-]+')
            ->where('id', '[0-9]+')
            ->name('detail');
    });
    Route::name('product.')->prefix('product')->group(function(){
        Route::get('/detail/{slug}-{id}.html', 'ProductController@detail')
            ->where('slug', '[0-9a-zA-Z\-]+')
            ->where('id', '[0-9]+')
            ->name('detail');
    });
});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/broadcast', 'BroadCastController@index')->name('broadcast');
//Route::get('test', function (){
//    return view('backends.layouts.app');
//});

Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:backend.index']);
