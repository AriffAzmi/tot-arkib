<?php

use App\Http\Controllers\Lkp\LkpBahagianController;
use App\Http\Controllers\Lkp\LkpSeksyenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/auth/login',[AuthController::class,'login'])->name('check-login');
Route::post('/auth/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/home', function () {
    return view('home');
});

// Auth::routes();

// Route::get('/booking/{id}/edit', 'BookingController@edit');
Route::resource('lkp-bahagian', LkpBahagianController::class);
Route::resource('lkp-seksyen', LkpSeksyenController::class);
Route::resource('pengguna', UserController::class);
