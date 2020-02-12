<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Auth::routes(['register' => false]);

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::get('/sales/analytics', 'DashboardController@salesAnalytics');
	Route::get('/visitors/analytics', 'DashboardController@visitorsAnalytics');

	// Contact messsage routes
	Route::get('/messages/datatables', 'ContactController@messages')->name('messages.datatables');
	Route::delete('/message/destroy', 'ContactController@destroy')->name('message.destroy');
	Route::resource('/messages', 'ContactController')->only('index','show');

	// Subscriber routes
	Route::get('/subscribers/datatables', 'SubscriberController@subscribers')->name('subscribers.datatables');
	Route::delete('/subscriber/destroy', 'SubscriberController@destroy')->name('subscriber.destroy');
	Route::put('/subscriber/{subscriber}/update', 'SubscriberController@update')->name('subscriber.update');
	Route::resource('/subscribers', 'SubscriberController')->only('index','show');

	// Customer routes
	Route::get('/customers/datatables', 'CustomerController@customers')->name('customers.datatables');
	Route::delete('/customer/destroy', 'CustomerController@destroy')->name('customer.destroy');
	Route::resource('/customers', 'CustomerController')->except('destroy');

	// User routes
	Route::get('/user/profile', 'UserController@profile')->name('user.profile');
	Route::put('/user/profile', 'UserController@updateProfile')->name('user.profile');
	Route::get('/users/datatables', 'UserController@users')->name('users.datatables');
	Route::delete('/user/destroy', 'UserController@destroy')->name('user.destroy');
	Route::resource('/users', 'UserController')->except('destroy');

	// Role routes
	Route::get('/roles/datatables', 'RoleController@roles')->name('roles.datatables');
	Route::delete('/role/destroy', 'RoleController@destroy')->name('role.destroy');
	Route::resource('/roles', 'RoleController')->except('destroy');

	// Image routes
	Route::get('/images/datatables', 'ImageController@images')->name('images.datatables');
	Route::delete('/image/destroy', 'ImageController@destroy')->name('image.destroy');
	Route::resource('/images', 'ImageController')->only('index', 'store', 'destroy');

	// Category routes
	Route::get('/getCategories', 'CategoryController@getCategories');
	Route::get('/category', 'CategoryController@categories')->name('category');
	Route::delete('/category/destroy', 'CategoryController@destroy')->name('category.destroy');
	Route::resource('/categories', 'CategoryController')->except('create', 'show', 'destroy');

	// Brand routes
	Route::get('/brand/datatables', 'BrandController@brands')->name('brands.datatables');
	Route::delete('/brand/destroy', 'BrandController@destroy')->name('brand.destroy');
	Route::resource('/brands', 'BrandController')->except('destroy');

	// Attribute set routes
	Route::get('/attribute-sets/datatables', 'AttributeSetController@attributesets')->name('attribute-sets.datatables');
	Route::delete('/attribute-set/destroy', 'AttributeSetController@destroy')->name('attribute-set.destroy');
	Route::resource('/attribute-sets', 'AttributeSetController')->except('show', 'destroy');

	// Attribute routes
	Route::get('/attributes/datatables', 'AttributeController@attributes')->name('attributes.datatables');
	Route::delete('/attribute/destroy', 'AttributeController@destroy')->name('attribute.destroy');
	Route::resource('/attributes', 'AttributeController')->except('show', 'destroy');

	// Option routes
	Route::get('/options/datatables', 'OptionController@options')->name('options.datatables');
	Route::delete('/option/destroy', 'OptionController@destroy')->name('option.destroy');
	Route::resource('/options', 'OptionController')->except('show', 'destroy');

	// Product routes
	Route::get('/attribute/values/{attribute}', 'ProductController@attributeValues');
	Route::get('/option/values/{option}', 'ProductController@optionValues');
	Route::get('/products/datatables', 'ProductController@products')->name('products.datatables');
	Route::get('/getProducts', 'ProductController@getProducts')->name('getProducts');
	Route::delete('/product/destroy', 'ProductController@destroy')->name('product.destroy');
	Route::put('/product/{product}/update', 'ProductController@updateStatus')->name('product.update');
	Route::resource('/products', 'ProductController')->except('destroy');

	// Product review routes
	Route::get('/reviews/datatables', 'ReviewController@reviews')->name('reviews.datatables');
	Route::delete('/review/destroy', 'ReviewController@destroy')->name('review.destroy');
	Route::put('/review/{review}/update', 'ReviewController@updateStatus')->name('review.update');
	Route::resource('/reviews', 'ReviewController')->only('index', 'edit', 'update');

	// coupon routes
	Route::get('/coupons/datatables', 'CouponController@coupons')->name('coupons.datatables');
	Route::delete('/coupon/destroy', 'CouponController@destroy')->name('coupon.destroy');
	Route::resource('/coupons', 'CouponController')->except('show', 'destroy');

	// Pages routes
	Route::get('/pages/datatables', 'PageController@pages')->name('pages.datatables');
	Route::delete('/page/destroy', 'PageController@destroy')->name('page.destroy');
	Route::resource('/pages', 'PageController')->except('show', 'destroy');

	// Slider routes
	Route::get('/sliders/datatables', 'SliderController@sliders')->name('sliders.datatables');
	Route::delete('/slider/destroy', 'SliderController@destroy')->name('slider.destroy');
	Route::resource('/sliders', 'SliderController')->except('show', 'destroy');

	// Order routes
	Route::get('/orders/datatables', 'OrderController@orders')->name('orders.datatables');
	Route::post('/orders/{order}/status', 'OrderController@updateStatus')->name('orders.status');
	Route::get('/orders/{order}/invoice', 'OrderController@sendInvoice')->name('orders.invoice');
	Route::delete('/order/destroy', 'OrderController@destroy')->name('order.destroy');
	Route::resource('/orders', 'OrderController')->only('index', 'show', 'destroy');

	// Transaction routes
	Route::get('/transactions/datatables', 'TransactionController@transactions')->name('transactions.datatables');
	Route::delete('/transaction/destroy', 'TransactionController@destroy')->name('transaction.destroy');
	Route::get('/transactions', 'TransactionController@index')->name('transactions');

	// Report route
	Route::get('/reports', 'ReportController@index')->name('reports');

	// Website visitor routes
	Route::get('/visitors/datatables', 'VisitorController@visitors')->name('visitors.datatables');
	Route::delete('/visitor/destroy', 'VisitorController@destroy')->name('visitor.destroy');
	Route::get('/visitors', 'VisitorController@index')->name('visitors');

	// Setting routes
	Route::get('/settings', 'SettingController@index')->name('settings');
	Route::put('/settings', 'SettingController@update')->name('settings');

	// Strorefront setting routes
	Route::get('/storefront/general', 'StorefrontController@index')->name('storefront.general');
	Route::put('/storefront/general', 'StorefrontController@update')->name('storefront.general');
	Route::get('/storefront/sections', 'StorefrontController@sections')->name('storefront.sections');
	Route::put('/storefront/sections', 'StorefrontController@updateSections')->name('storefront.sections');
	Route::get('/carousel/{id}/products', 'StorefrontController@carouselProducts')->name('carousel.products');
	Route::get('/featuredProducts', 'StorefrontController@featuredProducts')->name('featuredProducts');
	Route::get('/tab/{id}/products', 'StorefrontController@tabProducts')->name('tab.products');

	// Menu routes
	Route::get('/menus/datatables', 'MenuController@menus')->name('menus.datatables');
	Route::delete('/menu/destroy', 'MenuController@destroy')->name('menu.destroy');
	Route::resource('/menus', 'MenuController')->except('destroy');
	// Menu item routes
	Route::get('/menus/{menu}/items/create', 'MenuItemController@create')->name('menus.items.create');
	Route::post('/menus/{menu}/items', 'MenuItemController@store')->name('menus.items');
	Route::get('/menus/{menu}/items/{menuitem}/edit', 'MenuItemController@edit')->name('menus.items.edit');
	Route::put('/menus/items/{menuitem}/update', 'MenuItemController@update')->name('menus.items.update');
	Route::delete('/menus/items/{menuitem}', 'MenuItemController@destroy')->name('menus.items.destroy');
	Route::put('/menus/items/order', 'MenuItemController@updateOrder')->name('menus.items.order.update');
});

Route::get('{page}', 'PageController@index');