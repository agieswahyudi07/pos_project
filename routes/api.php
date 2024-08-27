<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

// AUTH ROUTE 
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// AUTH ROUTE 

// USER ROUTE 
// Route::middleware('auth:sanctum', function () {
Route::resource('users', UsersController::class)->middleware('auth:sanctum');
// });
// USER ROUTE 

Route::get('/test_api', function () {
    return "testapi";
});
