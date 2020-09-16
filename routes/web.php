<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CategoryItemsController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\ItemsController;
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

Route::get('/',[CategoriesController::class,'index'] );
Route::post('/jssession',[ItemsController::class,'jssession'] );
Route::get('/jssession2',[ItemsController::class,'jssession'] );
Route::get('/test',[ItemsController::class,'jssession'] );
/*
Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoriesController@index')
         ->name('categories.category.index');
    Route::get('/create','CategoriesController@create')
         ->name('categories.category.create');
    Route::get('/show/{category}','CategoriesController@show')
         ->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit','CategoriesController@edit')
         ->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', 'CategoriesController@store')
         ->name('categories.category.store');
    Route::put('category/{category}', 'CategoriesController@update')
         ->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}','CategoriesController@destroy')
         ->name('categories.category.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'orders',
], function () {
    Route::get('/', 'OrdersController@index')
         ->name('orders.orders.index');
    Route::get('/create','OrdersController@create')
         ->name('orders.orders.create');
    Route::get('/show/{orders}','OrdersController@show')
         ->name('orders.orders.show')->where('id', '[0-9]+');
    Route::get('/{orders}/edit','OrdersController@edit')
         ->name('orders.orders.edit')->where('id', '[0-9]+');
    Route::post('/', 'OrdersController@store')
         ->name('orders.orders.store');
    Route::put('orders/{orders}', 'OrdersController@update')
         ->name('orders.orders.update')->where('id', '[0-9]+');
    Route::delete('/orders/{orders}','OrdersController@destroy')
         ->name('orders.orders.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'category_items',
], function () {
    Route::get('/', 'CategoryItemsController@index')
         ->name('category_items.category_items.index');
    Route::get('/create','CategoryItemsController@create')
         ->name('category_items.category_items.create');
    Route::get('/show/{categoryItems}','CategoryItemsController@show')
         ->name('category_items.category_items.show')->where('id', '[0-9]+');
    Route::get('/{categoryItems}/edit','CategoryItemsController@edit')
         ->name('category_items.category_items.edit')->where('id', '[0-9]+');
    Route::post('/', 'CategoryItemsController@store')
         ->name('category_items.category_items.store');
    Route::put('category_items/{categoryItems}', 'CategoryItemsController@update')
         ->name('category_items.category_items.update')->where('id', '[0-9]+');
    Route::delete('/category_items/{categoryItems}','CategoryItemsController@destroy')
         ->name('category_items.category_items.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'order_items',
], function () {
    Route::get('/', 'OrderItemsController@index')
         ->name('order_items.order_items.index');
    Route::get('/create','OrderItemsController@create')
         ->name('order_items.order_items.create');
    Route::get('/show/{orderItems}','OrderItemsController@show')
         ->name('order_items.order_items.show')->where('id', '[0-9]+');
    Route::get('/{orderItems}/edit','OrderItemsController@edit')
         ->name('order_items.order_items.edit')->where('id', '[0-9]+');
    Route::post('/', 'OrderItemsController@store')
         ->name('order_items.order_items.store');
    Route::put('order_items/{orderItems}', 'OrderItemsController@update')
         ->name('order_items.order_items.update')->where('id', '[0-9]+');
    Route::delete('/order_items/{orderItems}','OrderItemsController@destroy')
         ->name('order_items.order_items.destroy')->where('id', '[0-9]+');
});
Route::group([
    'prefix' => 'items',
], function () {
    Route::get('/', 'ItemsController@index')
         ->name('items.items.index');
    Route::get('/create','ItemsController@create')
         ->name('items.items.create');
    Route::get('/show/{items}','ItemsController@show')
         ->name('items.items.show')->where('id', '[0-9]+');
    Route::get('/{items}/edit','ItemsController@edit')
         ->name('items.items.edit')->where('id', '[0-9]+');
    Route::post('/', 'ItemsController@store')
         ->name('items.items.store');
    Route::put('items/{items}', 'ItemsController@update')
         ->name('items.items.update')->where('id', '[0-9]+');
    Route::delete('/items/{items}','ItemsController@destroy')
         ->name('items.items.destroy')->where('id', '[0-9]+');
});

*/