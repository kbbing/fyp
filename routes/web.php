<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Product Routes
Route::get('/product',  'ProductController@index')->name('product.index');
Route::get('/product/add',  'ProductController@add')->name('product.add');
Route::post('/product/store',  'ProductController@store')->name('product.store');
Route::get('/product/edit/{id}',  'ProductController@edit')->name('product.edit');
Route::post('/product/update',  'ProductController@update')->name('product.update');
Route::get('/product/delete/{id}',  'ProductController@delete')->name('product.delete');
Route::get('/product/search',  'ProductController@search')->name('product.search');

// Product Details Routes
Route::get('/product_detail/{id}',  'ProductDetailController@index')->name('productDetail.index');
Route::get('/product_detail/{product_id}/add',  'ProductDetailController@add')->name('productDetail.add');
Route::post('/product_detail/store',  'ProductDetailController@store')->name('productDetail.store');
Route::post('/product_detail/edit/{id}',  'ProductDetailController@edit')->name('productDetail.edit');
Route::post('/product_detail/rent/{id}',  'ProductDetailController@rent')->name('productDetail.rent');
Route::get('/product_detail/return/{id}',  'ProductDetailController@return')->name('productDetail.return');

// Category Routes
Route::get('/category',  'CategoryController@index')->name('category.index');
Route::get('/category/add',  'CategoryController@add')->name('category.add');
Route::post('/category/store',  'CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}',  'CategoryController@edit')->name('category.edit');
Route::post('/category/update/',  'CategoryController@update')->name('category.update');
Route::get('/category/delete/{id}',  'CategoryController@destroy')->name('category.delete');
Route::get('/category/search',  'CategoryController@search')->name('category.search');

