<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'WebsiteController@index')->name('home');

// search routes
Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@search')->name('search');

// product routes
Route::get('/product/category/{slug}', 'ProductController@productByCategory')->name('product.category');
Route::get('/product/brand/{slug}', 'ProductController@productByBrand')->name('product.brand');
Route::get('/product/{slug}', 'ProductController@show')->name('product');

// contact routes
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact');
Route::post('/product/review/{product}', 'ReviewController@store')->name('product.review');

// cart routes
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/add/{product}', 'CartController@store')->name('cart.add');
Route::get('/cart/item', 'CartController@itemCount')->name('cart.item');
Route::get('/cart/minicart', 'CartController@miniCart')->name('cart.minicart');
Route::get('/cart/content', 'CartController@cartContent')->name('cart.content');
Route::put('/cart/update/{rowId}', 'CartController@update')->name('cart.update');
Route::post('/cart/remove/{rowId}', 'CartController@destroy')->name('cart.remove');
Route::post('/coupon', 'CartController@coupon')->name('coupon');

// checkout routes
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@store')->name('checkout');
Route::get('/payment', 'PaymentController@index')->name('payment');
Route::post('/payment', 'PaymentController@store')->name('payment');
Route::post('/payment/canceled', 'PaymentController@canceled')->name('payment.canceled');
Route::post('/payment/failed', 'PaymentController@failed')->name('payment.failed');
Route::get('/order/confirm', 'PaymentController@confirm')->name('order.confirm');
Route::post('/order/confirm', 'PaymentController@confirm')->name('order.confirm');
Route::get('/order/success', 'PaymentController@success')->name('payment.success');

// subscriber routes
Route::get('/subscribe', 'SubscriberController@index')->name('subscribe');
Route::post('/subscribe', 'SubscriberController@store')->name('subscribe');

// social login routes
Route::get('login/{provider}', 'Customer\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Customer\LoginController@handleProviderCallback');

// customer sadhboard route
Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer'], function(){

	Route::get('/login', 'LoginController@showLoginForm')->name('login');
	Route::post('/login', 'LoginController@login')->name('login');
	Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'RegisterController@register')->name('register');
	Route::post('/logout', 'LoginController@logout')->name('logout');

	Route::middleware(['auth:customer'])->group(function(){

		Route::get('/', 'DashboardController@index')->name('dashboard');
		Route::get('/orders', 'OrderController@index')->name('orders');
		Route::get('/order/{order}', 'OrderController@show')->name('order');
		Route::get('/account', 'AccountController@index')->name('account');
		Route::put('/account', 'AccountController@update')->name('account');
		Route::get('/favorites', 'FavoriteController@index')->name('favorites');
		Route::post('/favorite/{id}', 'FavoriteController@store')->name('favorite');
		Route::delete('/favorite/{id}', 'FavoriteController@destroy')->name('favorite');

	});
	
});