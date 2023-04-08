<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\buyerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});
Route::get('/buyer', [buyerController::class, 'index'] )->middleware('isLoggedIn');
Route::post('/buyer', [buyerController::class, 'store'] );
Route::get('/buyerlogin', [buyerController::class, 'login'] );
Route::post('login-user', [buyerController::class, 'loginUser'] )->name('login-user');
Route::get('/logout', [buyerController::class, 'logout'] );
Route::get('/editbuyer/{id}', [buyerController::class, 'editB'] );
Route::post('/updatebuyer', [buyerController::class, 'updateB'] );
Route::get('/deletebuyer/{id}', [buyerController::class, 'deleteB'] );


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
