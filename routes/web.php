<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => 'student'], function () {
    Route::get("/", ['as' => 'studentIndex', 'uses' => 'StudentController@index']);
    Route::get("index", ['as' => 'studentIndex', 'uses' => 'StudentController@index']);
    Route::get("edit", ['as' => 'studentEdit', 'uses' => 'StudentController@edit']);
    Route::get("show/{id}", ['uses' => 'StudentController@show']);
    Route::post("save", ['uses' => 'StudentController@save']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
