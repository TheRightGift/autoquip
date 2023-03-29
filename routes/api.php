<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware'=>'auth:api'], function(){
    Route::resource('/carts', CartController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UserController::class);


    Route::get('/userCartItems/{userId}', [CartController::class, 'userCartItems'])->name('userCartItems');
    Route::get('/userUnpaidCartItems/{userId}', [CartController::class, 'userUnpaidCartItems'])->name('userUnpaidCartItems');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('showProduct');
