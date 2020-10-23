<?php

use Illuminate\Support\Facades\Route;

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

// backend area
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','auth'], 'namespace' => 'backend'], function () {
    Route::resource('questions', 'QuestionController');
    Route::get('questions/status/change/{question}', 'QuestionController@statusChange')->name('status.change');
    Route::resource('options', 'OptionController');
    Route::get('maths/learn', 'learning\LearnController@allQuestion')->name('learn.maths');
    Route::get('maths/questions/{question}', 'learning\LearnController@mathQuestion')->name('math.questions');
});

