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

//Post Route
Route::get('/posts', 'PostController@index')->name('posts');
//Route::get('/post/{$id}', 'PostController@show');

Route::get('/post/{id}', 'PostController@show');

Route::get('/add_post', 'PostController@addPost');
Route::post('/process_post', 'PostController@create');
Route::get('/edit_post/{id}', 'PostController@edit');
Route::post('process_edit/{id}', 'PostController@update');
Route::get('/delete/{id}', 'PostController@destroy');

//post comment
Route::post('/post_comment', 'PostCommentController@store');


//Video Route
Route::get('/videos', 'VideoController@index')->name('videos');
Route::get('/video/{id}', 'VideoController@show');
Route::get('/add_video', 'VideoController@AddVideo');
Route::post('/process_video', 'VideoController@create');
Route::get('/edit_video/{id}', 'VideoController@create');
Route::post('/process_editvideo/{id}', 'VideoController@update');
Route::get('/delete/{id}', 'VideoController@destroy');
//video comment
Route::post('/comment_video', 'VideoCommentController@store');

