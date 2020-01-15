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

Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'verified']], function(){

	Route::get('/', 'CustomerController@index');
	
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:Super Admin|Admin|Editor']], function(){
	
	Route::get('/', 'AdminController@index')->name('dashboard');

	Route::get('/user/profile', 'UserController@profile')->name('user.profile');
	Route::put('/user/profile', 'UserController@updateProfile')->name('user.profile');
	Route::get('/users/datatables', 'UserController@users')->name('users.datatables');
	Route::delete('/user/destroy', 'UserController@destroy')->name('user.destroy');
	Route::resource('/users', 'UserController');

	Route::get('/roles/datatables', 'RoleController@roles')->name('roles.datatables');
	Route::delete('/role/destroy', 'RoleController@destroy')->name('role.destroy');
	Route::resource('/roles', 'RoleController');

	Route::get('/images/datatables', 'ImageController@images')->name('images.datatables');
	Route::delete('/image/destroy', 'ImageController@destroy')->name('image.destroy');
	Route::resource('/images', 'ImageController')->only('index', 'store', 'destroy');

	Route::get('/category', 'CategoryController@categories')->name('category');
	Route::delete('/category/destroy', 'CategoryController@destroy')->name('category.destroy');
	Route::resource('/categories', 'CategoryController')->except('create', 'show');

	Route::get('/brand/datatables', 'BrandController@brands')->name('brands.datatables');
	Route::delete('/brand/destroy', 'BrandController@destroy')->name('brand.destroy');
	Route::resource('/brands', 'BrandController');

	Route::get('/attribute-sets/datatables', 'AttributeSetController@attributesets')->name('attribute-sets.datatables');
	Route::delete('/attribute-set/destroy', 'AttributeSetController@destroy')->name('attribute-set.destroy');
	Route::resource('/attribute-sets', 'AttributeSetController')->except('show');

	Route::get('/attributes/datatables', 'AttributeController@attributes')->name('attributes.datatables');
	Route::delete('/attribute/destroy', 'AttributeController@destroy')->name('attribute.destroy');
	Route::resource('/attributes', 'AttributeController')->except('show');

	Route::get('/options/datatables', 'OptionController@options')->name('options.datatables');
	Route::delete('/option/destroy', 'OptionController@destroy')->name('option.destroy');
	Route::resource('/options', 'OptionController')->except('show');

	Route::get('/attribute/values/{attribute}', 'ProductController@attributeValues');
	Route::get('/option/values/{option}', 'ProductController@optionValues');
	Route::get('/products/datatables', 'ProductController@products')->name('products.datatables');
	Route::delete('/product/destroy', 'ProductController@destroy')->name('product.destroy');
	Route::resource('/products', 'ProductController');
});