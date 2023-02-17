<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->namespace('Api')->group( function (){

    Route::prefix('user')->name('user.')->group( function (){
        Route::post('/register', [\App\Http\Controllers\Api\AuthController::class , 'register'])->name('register');
        Route::post('/login', 'AuthController@login')->name('login');
    });


    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
});
