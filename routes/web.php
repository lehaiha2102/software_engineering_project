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

Route::get('/admin', function () {
    return view('admin.home.index');
});

Route::get('/admin/danh-muc-san-pham', 'CategoryController@index')->name('category');
Route::post('/admin/danh-muc-san-pham', 'CategoryController@store')->name('categoryadd');
Route::delete('/admin/danh-muc-san-pham/delete/{CategorySlug}', 'CategoryController@destroy')->name('categorydelete');
Route::get('/admin/danh-muc-san-pham/edit/{CategorySlug}', 'CategoryController@edit')->name('editcategory');
Route::PATCH('/admin/danh-muc-san-pham/update/{CategorySlug}', 'CategoryController@update');

Route::get('/admin/san-pham', 'ProductController@index')->name('product');
Route::post('/admin/san-pham', 'ProductController@store')->name('addproduct');
Route::get('/admin/san-pham/edit/{ProductSlug}', 'ProductController@edit')->name('editproduct');
Route::PATCH('/admin/san-pham/update/{ProductSlug}', 'ProductController@update');
Route::DELETE('/admin/san-pham/delete/{ProductSlug}', 'ProductController@destroy');

Route::get('/admin/danh-sach-don-hang', 'ProductController@listproduct')->name('listproduct');
Route::get('/admin/chi-tiet-don-hang/{id}/edit', 'ProductController@productdetail')->name('productdetail');
Route::PATCH('/admin/don-hang/{id}', 'ProductController@update')->name('handling');

Route::get('/menu', 'MenuController@index')->name('menu');

Route::get('/checkout', 'AdminBillController@getCheckOut');
Route::post('/checkout', 'AdminBillController@postCheckOut');
Route::get('/gio-hang', 'CartController@index')->name('cart');
Route::get('/them-vao-gio-hang/{id}', 'CartController@AddCart')->name('AddCart');
Route::get('/xoa-san-pham/{id}', 'CartController@DeleteItemCart')->name('DeleteItemCart');
Route::get('/xoa-san-pham-trong-gio-hang/{id}', 'CartController@DeleteListItemCart')->name('DeleteListItemCart');
Route::get('/luu-san-pham-trong-gio-hang/{id}/{quantity}', 'CartController@SaveListItemCart')->name('SaveListItemCart');
Route::post('/luu-tat-ca-san-pham-trong-gio-hang', 'CartController@SaveAllListItemCart')->name('SaveAllListItemCart');

Route::post('/tim-kiem', 'CartController@search')->name('Search');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
