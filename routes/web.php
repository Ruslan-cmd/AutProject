<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/','MainController@showHistoryForm')->name('show_history_form');
Route::post('/sendId','MainController@sendIdAndGetHistory')->name('send_id');
Route::post('/sendFullName','MainController@sendFullNameAndGetHistory')->name('send_full_name');

