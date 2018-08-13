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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{provider}/auth', 'SocialsController@auth')->name('social.auth');

Route::get('/{provider}/redirect', 'SocialsController@auth_callback')->name('social.callback');

Route::group(['middleware' => 'auth'], function(){

    Route::get('discussion/{slug}', 'DiscussionsController@show')->name('discussion.show');

    Route::post('discussions/store', 'DiscussionsController@store')->name('discussion.store');

    Route::get('discussions/create', 'DiscussionsController@create')->name('discussion.create');
    // create crud evertings route
    Route::resource('channels', 'ChannelsController');
});
