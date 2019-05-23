<?php

use App\Author;
use Illuminate\Support\Facades\Input;
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

Route::get('/', 'Frontcontroller@index');
Route::any('/search','FrontController@searchAuthor');
Route::get('/rental', array('as' => 'rental', 'uses' => 'FrontController@rentBook'));
Route::get('/hires', array('as' => 'rental', 'uses' => 'FrontController@returnBook'));

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'client'],function(){

});
Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin','HomeController@index');
    Route::resource('/admin/users','UsersController');
    Route::resource('/admin/books','BookController');
    Route::resource('/admin/books/barcodes','BarcodeController');
    Route::resource('/admin/authors','AuthorController');
    Route::resource('/admin/rentals','RentalController');
    Route::resource('/admin/logs','LogsController');
});


