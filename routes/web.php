<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes(['verify' => true]);
Route::group(['prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'verified']], function(){

	Route::get('/', 'CustomerController@index');
	
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:Super Admin|Admin|Editor']], function(){
	
	Route::get('/', 'AdminController@index');
	Route::resource('/products', 'ProductController')->middleware('permission:CRUD PRODUCT');
	Route::get('/user', 'UserController@getUsers')->name('user');
	Route::resource('/users', 'UserController')->middleware('permission:CRUD USER');
	Route::get('/role', 'RoleController@getRoles')->name('role');
	Route::resource('/roles', 'RoleController')->middleware('permission:CRUD ROLE');

});