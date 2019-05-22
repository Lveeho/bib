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
    return view('auth.login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Frontcontroller@index');
Route::get('/shop', 'Frontcontroller@shop');
Route::get('/cart', 'Frontcontroller@cart');

Route::group(['middleware'=>'client'],function(){
Route::get('/mijnrentals','FrontController@rentals');
    Route::get('/account','FrontController@account');
});


Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin','HomeController@index');
    Route::resource('/admin/users','UsersController');
    Route::resource('/admin/books','BookController');
    Route::resource('/admin/books/barcodes','BarcodeController');
    Route::resource('/admin/authors','AuthorController');



});


