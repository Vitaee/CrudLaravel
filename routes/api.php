<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DirectionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProvinceController;
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
        Route::post('/register', [AuthController::class , 'register'])->name('register');
        Route::post('/login', [AuthController::class, 'login'])->name('login');

        Route::middleware('auth:sanctum')->group( function () {
            Route::get('/', [UserController::class, 'getProfile'])->name('user');
        });

    });

    Route::prefix('city')->name('city.')->group( function () {
        Route::post('/', [CityController::class, 'createCity'])->name('createCity');
        Route::get('/provinces', [CityController::class, 'getCityProvinces'])->name('getCityProvinces');
        Route::get('/', [CityController::class, 'getCities'])->name('getCities');
    });


    Route::prefix('province')->name('province.')->group( function (){
        Route::post('/', [ProvinceController::class, 'createProvince'])->name('createProvince');
        Route::get('/', [ProvinceController::class, 'getProvince'])->name('getProvinces');
        Route::get('/direction-way', [ProvinceController::class, 'getProvinceDirections'])->name('getProvinceDirections');
    });

    Route::prefix('direction')->name('direction.')->group( function (){
        Route::post('/', [DirectionController::class, 'createDirection'])->name('createDirection');
        Route::get('/', [DirectionController::class, 'getDirection'])->name('getDirection');
    });


});
