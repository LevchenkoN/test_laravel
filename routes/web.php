<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('/', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('/login', [\App\Http\Controllers\UserController1::class, 'post']);
Route::get('/signup', [\App\Http\Controllers\UserController1::class, 'signup']);
Route::get('/message', [\App\Http\Controllers\MessagesController1::class, 'index']);
Route::post('/message', [\App\Http\Controllers\MessagesController1::class, 'store']);
Route::get('/posts', [\App\Http\Controllers\UserController1::class, 'index']);


