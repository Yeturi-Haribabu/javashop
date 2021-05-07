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

// Route::get('/', function () {
//     return view('welcome');
// });

/*
* Admin Routes
*/

Route::prefix('admin')->group(function(){


Route::middleware('auth:admin')->group(function(){

Route::get('/','DashboardController@index');

Route::resource('/products','ProductController');

//Orders
Route::resource('/orders','OrderController');

Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
Route::get('/pending/{id}','OrderController@pending')->name('order.pending');


//Users
Route::resource('/users','UsersController');

//logout

 Route::get('/logout','AdminUserController@logout');

});





//Admin Login

// Route::get('/admin/login',function(){

// 	return view('admin.login');

// });


//Admin Login

Route::get('/login','AdminUserController@index');
Route::post('/login','AdminUserController@store');


});

/*

* Front Routes

*/

// Route::get('/',function(){

// return view('front.index');

// });

Route::get('/','Front\HomeController@index');


//User Registrationadmin/orders

Route::get('/user/register','Front\RegistrationController@index');
Route::post('/user/register','Front\RegistrationController@store');

// User Login

Route::get('/user/login','Front\SessionsController@index');
Route::post('/user/login','Front\SessionsController@store');

// User Logout
Route::get('/user/logout','Front\SessionsController@logout');

// Route::get('/user/profile',function(){
// return 'WelcomeUser';
// });

Route::get('/user/profile','Front\UserProfileController@index');

Route::get('/user/order/{id}','Front\UserProfileController@show');

// Cart

Route::get('/cart','Front\CartController@index');
Route::post('/cart','Front\CartController@store')->name('cart');


Route::delete('/cart/remove/{product}','Front\CartController@destroy')->name('cart.destroy');
Route::post('/cart/saveLater/{product}','Front\CartController@saveLater')->name('cart.saveLater');

//Save for later

Route::delete('/saveLater/destroy/{product}','Front\SaveLaterController@destroy')->name('saveLater.destroy');
Route::post('/cart/moveToCart/{product}','Front\SaveLaterController@moveToCart')->name('moveToCart');


//Checkout

Route::get('/checkout','Front\CheckoutController@index');

Route::get('/empty',function (){
Cart::instance('default')->destroy();
});







