<?php
use Inani\Larapoll\Traits\Poll;
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
Route::get('/create_poll', function(){
	$poll = new Poll([
            'question' => 'What is the best PHP framework?'
]); 

// attach options and how many options you can vote to
// more than 1 options will be considered as checkboxes
$poll->addOptions(['Laravel', 'Zend', 'Symfony', 'Cake'])
                     ->maxSelection() // you can ignore it as well
                     ->generate();
$poll->isRadio(); // true
$poll->isCheckable(); // false
$poll->optionsNumber(); // 4
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
