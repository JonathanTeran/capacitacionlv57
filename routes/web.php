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

Route::group(['prefix'=>'publicaciones',
              'middleware'=>'auth'],function(){
    Route::resource('books','BookController');
});

/*
Route::get('test',function(){
    return "hola mundo";
});
Route::get('test/{id}',function($id){
    return "hola mundo $id";
});
Route::get('test/{id?}',function($id=0){
    return "hola mundo $id";
});

Route::get('test/{id}',function($id=0){
    return "hola mundo $id";
})->where(['id'=>'[0-9]+'])->name('test');
*/
