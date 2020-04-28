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


Route::get('/', 'FeedController@index')->name('feed.index');

Route::get('/post/{post}', 'PostController@show')->name('post.show');


Route::group(['middleware' => 'auth'], function() {
    
Route::get('/posting', 'PostController@create')->name('post.create');
Route::post('/posting', 'PostController@store');

Route::get('/update-post/{post}', 'PostController@edit')->name('post.edit');
Route::post('/update-post/{post}', 'PostController@update');

Route::post('/delete-post/{post}', 'PostContoller@destory')->name('post.delete');

});



Auth::routes();