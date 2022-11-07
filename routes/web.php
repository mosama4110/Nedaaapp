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
    return view('auth.login');
});
Auth::routes();
Route::resource('/home', 'App\Http\Controllers\HomeController');
Route::resource('/exports',  'App\Http\Controllers\ExportsController');
Route::resource('/recipient',  'App\Http\Controllers\RecipientController');
Route::resource('/map_size',  'App\Http\Controllers\MapSizeController');
Route::resource('/school',  'App\Http\Controllers\SchoolController');
Route::resource('users','App\Http\Controllers\UserController');
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles','App\Http\Controllers\RoleController');
Route::resource('users','App\Http\Controllers\UserController');
});
Route::resource('/student',  'App\Http\Controllers\StudentController');
Route::resource('/call',  'App\Http\Controllers\CallstdController');
Route::resource('/cal_std',  'App\Http\Controllers\CallstdController@call');
Route::get('/{page}',  'App\Http\Controllers\AdminController@index');
