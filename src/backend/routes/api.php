<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentsController;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users/register', [UserController::class, 'store']);
Route::post('/auth/login', [JWTController::class, 'login']);
Route::get('/', function () {
    return "Build success...";
});

Route::group(['middleware' => 'auth:api'], function($router) {
    Route::group(['prefix' => 'users'], function ($router) {
        Route::get('/list', [UserController::class, 'index']);
        Route::get('/show/{id}', [UserController::class, 'show']);
        Route::put('/update/{id}', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'books'], function ($router) {
        Route::post('/register', [BookController::class, 'store']);
        Route::get('/list', [BookController::class, 'index']);
        Route::get('/show/{id}', [BookController::class, 'show']);
        Route::put('/update/{id}', [BookController::class, 'update']);
        Route::delete('/delete/{id}', [BookController::class, 'destroy']);
    });

    Route::group(['prefix' => 'rents'], function ($router) {
        Route::post('/new', [BookRentsController::class, 'new']);
        Route::post('/delivery/{id}', [BookRentsController::class, 'delivery']);
        Route::get('/report', [BookRentsController::class, 'allOngoingRents']);

    });

    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('/logout', [JWTController::class, 'logout']);
        Route::post('/refresh', [JWTController::class, 'refresh']);
        Route::post('/profile', [JWTController::class, 'profile']);
    });
});




