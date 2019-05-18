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

Route::get('/poll_home', ['uses' => 'PollController@home', 'as' => 'poll.home']);

Route::get('/create_poll', ['uses' => 'PollController@create', 'as' => 'poll.create']);

Route::post('/store/polls', ['uses' => 'PollController@store', 'as' => 'poll.store']);

Route::get('/poll/index', ['uses' => 'PollController@index', 'as' => 'poll.index']);