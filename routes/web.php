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

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('emp_detail','Emp_detail@index');

// Route::post('employees/add_employee', 'Emp_detail@add_employee')->name('employees.add_employee');

// Route::get('employees/getdata', 'Emp_detail@getdata')->name('employees.getdata');

// Route::post('/autocomplete/fetch', 'Emp_detail@fetch')->name('autocomplete.fetch');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
