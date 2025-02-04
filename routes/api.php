<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

//Route::get('/category', [CategoryController::class, 'index']);
//Route::get('/category/{id}', [CategoryController::class, 'show']);
//Route::post('/category', [CategoryController::class, 'store']);
//Route::put('/category/{id}', [CategoryController::class, 'update']);
//Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::ApiResource('/category', CategoryController::class);
Route::ApiResource('/product', ProductController::class);
