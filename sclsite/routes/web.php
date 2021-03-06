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

Auth::routes();

Route::get('/', 'FeedController@index')->name('feed.index');

Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/followedposts', 'FollowerController@show')->name('follows.show');

    Route::post('profile/{user}/follow', 'FollowerController@followUser')->name('user.follow');
    Route::post('profile/{user}/unfollow', 'FollowerController@unFollowUser')->name('user.unfollow');
    
    Route::get('/posting', 'PostController@create')->name('post.create');
    Route::post('/posting', 'PostController@store');

    Route::post('/update-profile/{user}', 'ProfileController@update')->name('profile.update');

    Route::get('/update-post/{post}', 'PostController@edit')->name('post.edit');
    Route::post('/update-post/{post}', 'PostController@update');

    Route::post('/delete-post/{post}', 'PostController@destory')->name('post.delete');

    Route::post('/comment-post/{post}', 'PostController@comment')->name('post.comment');

    Route::post('/comment-reply/{comment}', 'CommentController@comment') ->name('comment.reply');

    Route::post('/vote-post/{post}', 'VotesController@votePost')->name('post.vote');
});