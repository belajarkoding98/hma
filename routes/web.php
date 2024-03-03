<?php

use App\Http\Controllers\UserController;
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

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('logout', 'App\Http\Controllers\DashboardController@logout')->name('logout');

#Route Users
Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login', 'App\Http\Controllers\LoginController@login_action')->name('login.action');
// Route::get('user-create', 'App\Http\Controllers\UserController@create')->name('user.create');
// Route::post('user-store', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::get('user-detail/{id}', 'App\Http\Controllers\UserController@detail')->name('user.detail');
Route::delete('user-delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
Route::resource('user', UserController::class);
