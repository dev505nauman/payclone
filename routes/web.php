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


// Route::get('/test', 'test@splitpay');


// route::get('drag' , function(){
// 	return view('drag');
// });


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

/* Account Controller Routes Start */

Route::get('/settings', 'AccountController@settings')->name('settings');

Route::post('/update-profile', 'AccountController@updateProfile')->name('update-profile');

/* Account Controller Routes End */

/* PaymentGateway Controller Routes Start */
Route::get('/payment-gateways', 'PaymentGatewayController@index')->name('payment-gateways');


/* PaymentGateway Controller Routes End */

/* Customer Controller Routes Start */
Route::get('/customers', 'CustomerController@index')->name('customers');


/* Customer Controller Routes End */


/* Merchant Controller Routes Start */
Route::get('/merchant-signup', 'MerchantController@signup')->name('signup-merchant');


/* Merchant Controller Routes End */


