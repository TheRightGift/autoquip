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
// GUEST
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/singleProduct', [App\Http\Controllers\HomeController::class, 'singleProduct'])->name('singleProduct');
Route::get('/repairs', [App\Http\Controllers\HomeController::class, 'repairs'])->name('repairs');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/warehouse', [App\Http\Controllers\HomeController::class, 'warehouse'])->name('warehouse');

// AUTH
Route::prefix('auth')->group(function () {
    Route::get('/getstarted', [App\Http\Controllers\Auth\AuthController::class, 'getstarted'])->name('getstarted');
    Route::get('/signin', [App\Http\Controllers\Auth\AuthController::class, 'signin'])->name('signin');
    Route::get('/forgotpassword', [App\Http\Controllers\Auth\AuthController::class, 'forgotpassword'])->name('forgotpassword');

    Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register');
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
});

// Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/isLoggedIn', [App\Http\Controllers\HomeController::class, 'isLoggedIn'])->name('isLoggedIn');
// 