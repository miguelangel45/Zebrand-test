<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\JWTTokenIsValid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('/me', 'me');
});

Route::middleware([JWTTokenIsValid::class])->group(function (){
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products/new', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
});

Route::get('/products', ProductController::class.'@index');
Route::get('/brands', BrandController::class.'@index');
