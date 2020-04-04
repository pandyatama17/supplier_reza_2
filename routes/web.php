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

// Route::get('/', 'ItemsController@index');
//
Route::get('/login', "UsersController@showLogin");
Route::any('/dologin', "UsersController@doLogin");
Route::get('/logout', "UsersController@logout");
Route::get('/register', "UsersController@showRegister");
Route::post('/doRegister', "UsersController@doRegister");
//
// Route::get('/products', 'ItemsController@products');
// Route::get('/category/{data}', 'ItemsController@category');
// Route::get('/product/{id}', 'ItemsController@product');
//
// Route::get('/cart', 'ItemsController@showCart');
// Route::get('/add-to-cart/{id}', 'ItemsController@addToCart');
// Route::patch('/update-cart', 'ItemsController@updateCart');
// Route::get('/remove-from-cart/{id}', 'ItemsController@removeFromCart');
//
// Route::get('/checkout', 'PurchasementController@checkout');
// Route::post('/checkout/store', 'PurchasementController@store');
// Route::get('/rental/{id}', 'PurchasementController@show');
//
// Route::post('/add-to-cart-with-qty', 'ItemsController@addToCartForm');
//
// Route::get('/admin/rents/pending', 'AdminController@showPendingRents');
// Route::get('/admin/rents/confirmed', 'AdminController@showConfirmedRents');
// Route::get('/admin/rents/confirm/{id}', 'AdminController@confirmRent');
// Route::get('/admin/items', 'AdminController@showItems');
// Route::get('/admin/item/add', 'AdminController@addItem');
// Route::get('/admin/item/edit/{id}', 'AdminController@editItem');
// Route::get('/admin/item/delete/{id}', 'AdminController@deleteItem');
// Route::post('/admin/item/add/store', 'AdminController@storeItem');
// Route::post('/admin/item/edit/update', 'AdminController@updateItem');
//
Route::get('/flush', function()
{
  session()->forget('cart');
  return Redirect::to('/test-cart');;
});
Route::get('/session-check', function()
{
  dd(Auth::user());
});
Route::get('/', 'HomeController@home');
Route::get('/gallery', "HomeController@gallery");
Route::get('/gallery/{id}', "HomeController@singleGallery");
Route::get('/events', "HomeController@events");
Route::get('/event/{id}', "HomeController@event");

Route::post('/event/store', "EventController@storeEvent");
Route::get('/event/order/{code}', "EventController@showEvent");

Route::get('/cart', 'HomeController@cart');
Route::get('/clothing/remove-from-cart/{id}', 'ClothingOrderController@removeFromCart');
Route::post('/clothing/add-to-cart/', 'ClothingOrderController@addToCartForm');

Route::get('/clothing', "HomeController@clothing");
Route::post('/clothing/order', "ClothingOrderController@storeOrder");
Route::get('/clothing/order/{code}', "ClothingOrderController@showOrder");

Route::get('/test-cart', function()
{
  dd(Session::get('cart'));
});
Route::get('/clean', "ClothingOrderController@clean");

Route::get('/admin/clothing_orders', 'AdminController@showClothingOrders');
Route::get('/admin/clothing_orders/pending', 'AdminController@showPendingClothingOrders');
Route::get('/admin/clothing_orders/confirmed', 'AdminController@showConfirmedClothingOrders');
Route::get('/admin/clothing_order/confirm/{id}', 'AdminController@confirmClothingOrder');
Route::get('/admin/clothing_order/finish/{id}', 'AdminController@finishClothingOrder');

Route::get('/admin/bookings', 'AdminController@showEventOrders');
Route::get('/admin/bookings/pending', 'AdminController@showPendingEventOrders');
Route::get('/admin/bookings/confirmed', 'AdminController@showEventOrders');
Route::get('/admin/booking/confirm/{id}', 'AdminController@confirmEventOrder');
Route::get('/admin/booking/finish/{id}', 'AdminController@finishEventOrder');

Route::get('/admin/gallery/add', 'AdminController@addGallery');
Route::post('/admin/gallery/store', 'AdminController@storeGallery');
