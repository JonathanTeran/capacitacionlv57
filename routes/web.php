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


Route::get('/imagen/{name}',function($name){
    $fileContent = Storage::disk('public')
                    ->get("PORTADAS/$name");

    return Response::make($fileContent, '200');
})->name('portadas');

require __DIR__.'/guest.php';

Route::get('books-comments/{book}','BookController@showComments')
->name('books.comments')->middleware('auth');

Route::get('books-like/{book}','BookController@like')
->name('books.like')->middleware('auth');

Route::get('books-dislike/{book}','BookController@dislike')
->name('books.dislike')->middleware('auth');

Route::post('category-suscription/{id}',
'SuscriptionController@suscription')
->middleware('auth')->where(['id'=>'[0-9]+']);

Route::post('category-unsuscription/{id}',
'SuscriptionController@unsuscription')
->middleware('auth')->where(['id'=>'[0-9]+']);

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
