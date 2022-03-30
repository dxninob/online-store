<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/computers', 'App\Http\Controllers\ComputerController@index')->name("computer.index");
Route::get('/computers/{id}', 'App\Http\Controllers\ComputerController@show')->name("computer.show");

Route::get('/order', 'App\Http\Controllers\OrderController@index')->name("order.index");
Route::get('/order/delete', 'App\Http\Controllers\OrderController@delete')->name("order.delete");
Route::post('/order/add/{id}', 'App\Http\Controllers\OrderController@add')->name("order.add");

Route::middleware('auth')->group(function () {
    Route::get('/order/purchase', 'App\Http\Controllers\OrderController@purchase')->name("order.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\OrderController@list')->name("order.list");
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    
    Route::get('/admin/computers', 'App\Http\Controllers\Admin\AdminComputerController@index')->name("admin.computer.index");
    Route::post('/admin/computers/store', 'App\Http\Controllers\Admin\AdminComputerController@store')->name("admin.computer.store");
    Route::delete('/admin/computers/{id}/delete', 'App\Http\Controllers\Admin\AdminComputerController@delete')->name("admin.computer.delete");
    Route::get('/admin/computers/{id}/edit', 'App\Http\Controllers\Admin\AdminComputerController@edit')->name("admin.computer.edit");
    Route::put('/admin/computers/{id}/update', 'App\Http\Controllers\Admin\AdminComputerController@update')->name("admin.computer.update");

    Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name("admin.category.index");
    Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name("admin.category.store");
    Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name("admin.category.delete");
    Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name("admin.category.edit");
    Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name("admin.category.update");
});

Auth::routes();
