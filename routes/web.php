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

// MAIN
Route::get('/', 'MainController@index')->name('home');
Route::get('/categories', 'CategoryController@index');
Route::get('/products/{category}', 'CategoryController@show');
Route::get('/products/single/{product}', 'ProductController@show');
Route::get('/contact', 'MainController@contactIndex');
Route::get('/search/{search}', 'ProductController@search');

// CART
Route::get('/cart', 'CartController@index');
Route::post('/addToCart/{product}/{quantity}', 'CartController@addToCart');
Route::post('/removeFromCart/{product}', 'CartController@removeFromCart');
Route::get('/order', 'OrderController@index');
Route::post('/order', 'OrderController@store');

// ADMIN
Route::get('/admin', 'MainController@indexAdmin')->name('admin');
Route::get('/admin/categories', 'CategoryController@indexAdmin');
Route::get('/admin/createCategory', 'CategoryController@create');
Route::post('/admin/storeCategory', 'CategoryController@store');
Route::post('/admin/editCategory', 'CategoryController@edit');
Route::post('/admin/updateCategory', 'CategoryController@update');
Route::get('/admin/products', 'ProductController@indexAdmin');
Route::get('/admin/products/{id}', 'ProductController@indexAdminByCategory');
Route::get('/admin/createProduct', 'ProductController@create');
Route::post('/admin/storeProduct', 'ProductController@store');
Route::post('/admin/products/editProduct', 'ProductController@edit');
Route::post('/admin/products/updateProduct', 'ProductController@update');
Route::get('/admin/orders', 'OrderController@indexAdmin');
Route::get('/admin/order/{order}', 'OrderController@show');
Route::post('/admin/order/changeStatus', 'OrderController@changeStatus');
