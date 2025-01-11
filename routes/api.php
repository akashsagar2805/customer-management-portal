<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Protected Routes: Require OAuth2 authentication using Passport
Route::middleware('auth:api')->group(function () {
    // Customer CRUD operations
    Route::apiResource('customers', CustomerController::class);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

