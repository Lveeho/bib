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

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});


/*bij surfen naar public/role/create wordt een nieuwe rol aangemaakt indien het nog niet bestond*/
Route::get('role/create', function () {
    $myroles=['admin','ontlener'];
    $testRol=Role::all(); /*hier zitten alle rollen in van de database uit de tabel rol*/
    $teller=0;
    foreach ($myroles as $myrole){

        foreach ($testRol as $rol){
            if($myrole==$rol->name){
                $teller++;
            }
        }
        if ($teller ==0){
            $role=new Role();
            $role->name=$myrole;
            $role->save();
        }
        $teller=0;
    }
});

/* bij surfen naar public/multipleroles krijgt user_id 2 beide rollen*/
Route::get('/multipleroles',function(){
    $user=User::findOrFail(2);
    $user->roles()->sync([1,2]);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin','HomeController@index');
    Route::resource('/admin/users','UsersController');



});


