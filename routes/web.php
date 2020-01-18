<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/customer/login', 'Customer\LoginController@showLoginForm')->name('customer.login');
Route::post('/customer/login', 'Customer\LoginController@login')->name('customer.login');
Route::post('/customer/logout', 'Customer\LoginController@logout')->name('customer.logout');
Route::get('/customer/register', 'Customer\RegisterController@showRegistrationForm')->name('customer.register');
Route::post('/customer/register', 'Customer\RegisterController@register')->name('customer.register');

Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth:customer', 'verified']], function(){

	Route::get('/', 'CustomerController@index')->name('dashboard');
	
});

Route::get('{page}/{subs?}', 'PageController@index')
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function(){
	
	Route::get('/', 'DashboardController@index')->name('dashboard');

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

	Route::get('/getCategories', 'CategoryController@getCategories');
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
	Route::get('/getProducts/', 'ProductController@getProducts')->name('getProducts');
	Route::delete('/product/destroy', 'ProductController@destroy')->name('product.destroy');
	Route::resource('/products', 'ProductController');

	Route::get('/settings', 'SettingController@index')->name('settings');
	Route::put('/settings', 'SettingController@update')->name('settings');

	Route::get('/reviews/datatables', 'ReviewController@reviews')->name('reviews.datatables');
	Route::delete('/review/destroy', 'ReviewController@destroy')->name('review.destroy');
	Route::resource('/reviews', 'ReviewController')->only('index', 'edit', 'update');

	Route::get('/coupons/datatables', 'CouponController@coupons')->name('coupons.datatables');
	Route::delete('/coupon/destroy', 'CouponController@destroy')->name('coupon.destroy');
	Route::resource('/coupons', 'CouponController')->except('show');

	Route::get('/pages/datatables', 'PageController@pages')->name('pages.datatables');
	Route::delete('/page/destroy', 'PageController@destroy')->name('page.destroy');
	Route::resource('/pages', 'PageController')->except('show');
});