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

//Auth
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Employee
Route::resource('/employee', 'EmployeeController');
Route::group(['prefix' => 'employees'], function () {
    Route::post('{employee_id}', 'EmployeeController@ajax')->name('employees.ajax');
});

//Menus_category
Route::resource('/menus_categories', 'Menus_categoryController');
Route::group(['prefix' => 'menus_categories'], function () {
    Route::post('{menus_category_id}', 'Menus_categoryController@ajax')->name('menus_categories.ajax');
});

//Menus
Route::resource('/menus', 'MenuController');
Route::group(['prefix' => 'menus'], function () {
    Route::post('{menu_id}', 'MenuController@ajax')->name('menus.ajax');
});


//Sales
Route::group(['prefix' => 'sales'], function () {
    Route::get('', 'SaleController@index')->name('sales.index');
    Route::post('{menus_category}', 'SaleController@ajax')->name('sales.ajax');
    Route::post('', 'SaleController@store')->name('sales.store');
    Route::get('{search}', 'SaleController@search')->name('sales.search');
});

//Store
Route::group(['prefix' => 'stores'], function () {
    Route::get('', 'StoreController@index')->name('stores.index');
    Route::get('/ajax', 'StoreController@ajax')->name('stores.ajax');
});

//Customers
Route::group(['prefix' => 'customers'], function () {
    Route::get('', 'CustomerController@index')->name('customers.index');
});
