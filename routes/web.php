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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('ovhBills', 'OvhBillController@index');
Route::post('ovhBills', 'OvhBillController@index');
Route::get('ovhBills/{ovhBill}', 'OvhBillController@show');
Route::get('ovhBills/{ovhBill}/document', 'OvhBillController@document');
Route::resource('ovhConfigs', 'OvhConfigController');
