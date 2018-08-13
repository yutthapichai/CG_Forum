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

Route::get('/discuss', function () {
    return view('discuss');
});

Auth::routes();

Route::get('/forum', 'ForumsController@index')->name('forum');

Route::get('{provider}/auth', 'SocialsController@auth')->name('social.auth');

Route::get('/{provider}/redirect', 'SocialsController@auth_callback')->name('social.callback');

Route::get('discussion/{slug}', 'DiscussionsController@show')->name('discussion.show');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/reply/unlike/{id}', 'RepliesController@unlike')->name('reply.unlike');

    Route::get('/reply/like/{id}', 'RepliesController@like')->name('reply.like');

    Route::post('discussion/{id}', 'DiscussionsController@reply')->name('discussion.reply');

    Route::post('discussions/store', 'DiscussionsController@store')->name('discussion.store');

    Route::get('discussions/create', 'DiscussionsController@create')->name('discussion.create');
    // create crud evertings route
    Route::resource('channels', 'ChannelsController');
});
