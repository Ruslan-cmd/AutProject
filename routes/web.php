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

Route::get('/', 'MainController@showHistoryForm')->name('show_history_form');
Route::post('/sendId', 'MainController@sendIdAndGetHistory')->name('send_id');
Route::post('/sendFullName', 'MainController@sendFullNameAndGetHistory')->name('send_full_name');
Route::get('/showFormForCreatingNewPass', 'CreateNewPassController@showFormForCreatingNewPass')->name('show_form_for_create_new_pass');
Route::put('/createNewPass', 'CreateNewPassController@createNewPass')->name('create_new_pass');
Route::get('/showFormDeletePass', 'DeletePassController@showDeleteForm')->name('show_delete_form');
Route::put('/deletePass', 'DeletePassController@deletePass')->name('delete_pass');
Route::get('/showFormFiredEmployee', 'FiredEmployeeController@showFormForFiredEmployee')->name('show_form_fired_employee');
Route::put('/fireEmployee', 'FiredEmployeeController@fireEmployee')->name('fire_employee');
Route::get('/showFormCreateNewEmployee', 'NewEmployeeController@showFormCreateNewEmployee')->name('show_form_create_new_employee');
Route::put('/createEmployee', 'NewEmployeeController@createEmployee')->name('create_employee');
