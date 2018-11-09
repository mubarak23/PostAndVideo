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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function(){
		return view('home');
})->name('home');

Route::get('/add_post', 'PostController@index');

Route::post('/process_post', 'PostController@create');	
/*
Route::get('/add_post', function(){
		return view('AddPost');
});*/

Route::get('/add_video', function(){
		return view('AddVideo');
});
