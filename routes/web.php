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
//login
Route::get('/','AuthController@showLoginForm')->name('show_login_form');
Route::get('/showRegisterForm','AuthController@showRegisterForm')->name('show_register_form');
Route::post('/register','AuthController@register')->name('register');
Route::post('/login','AuthController@login')->name('login');
//reset password
Route::get('/resetPassword','AuthController@resetPassword')->name('reset_password');
Route::put('/getCode','AuthController@getCode')->name('get_code');
Route::get('/sendCode','AuthController@sendCode')->name('send_code');
Route::post('/sendNewPassword','AuthController@sendNewPassword')->name('send_new_password');

//history
Route::get('/showHistoryForm', 'HistoryController@showHistoryForm')->name('show_history_form');
Route::get('/sendId', 'HistoryController@sendIdAndGetHistory')->name('send_id');
Route::get('/sendFullName', 'HistoryController@sendFullNameAndGetHistory')->name('send_full_name');
Route::get('/sendNumberOfPass', 'HistoryController@sendNumberOfPass')->name('send_number_of_pass');
//new pass
Route::get('/showFormForCreatingNewPass', 'CreateNewPassController@showFormForCreatingNewPass')->name('show_form_for_create_new_pass');
Route::put('/createNewPass', 'CreateNewPassController@createNewPass')->name('create_new_pass');
//delete pass
Route::get('/showFormDeletePass', 'DeletePassController@showDeleteForm')->name('show_delete_form');
Route::put('/deletePass', 'DeletePassController@deletePass')->name('delete_pass');
//fired employee
Route::get('/showFormFiredEmployee', 'FiredEmployeeController@showFormForFiredEmployee')->name('show_form_fired_employee');
Route::put('/fireEmployee', 'FiredEmployeeController@fireEmployee')->name('fire_employee');
//new employee
Route::get('/showFormCreateNewEmployee', 'NewEmployeeController@showFormCreateNewEmployee')->name('show_form_create_new_employee');
Route::put('/createEmployee', 'NewEmployeeController@createEmployee')->name('create_employee');
