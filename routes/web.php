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

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');

Route::resource('company', 'CompanyController');
Route::get('company/delete/{company}', 'CompanyController@delete')->name('company.delete');

Route::resource('employee', 'EmployeeController');
Route::get('employee/delete/{employee}', 'EmployeeController@delete')->name('employee.delete');