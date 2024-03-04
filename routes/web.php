<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('logout', 'App\Http\Controllers\DashboardController@logout')->name('logout');

// Route::post('api/login', [AuthController::class, 'login']);

#Route Users
Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login', 'App\Http\Controllers\LoginController@login_action')->name('login.action');
Route::get('user-detail/{id}', 'App\Http\Controllers\UserController@detail')->name('user.detail');
Route::delete('user-delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
Route::resource('user', UserController::class);
