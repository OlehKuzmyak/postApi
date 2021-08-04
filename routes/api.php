<?php

use App\Http\Controllers\Account\AdvertisementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/auth'], function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::middleware('api_token')->get('/logout', [LogoutController::class, 'logout']);
});

Route::group(['prefix' => '/advetisement', 'middleware' => 'api_token'], function () {
    Route::get('/', [AdvertisementController::class, 'index']);
    Route::post('/create', [AdvertisementController::class, 'create']);
    Route::put('/update', [AdvertisementController::class, 'update']);
    Route::delete('/delete', [AdvertisementController::class, 'delete']);
    Route::post('/set-active', [AdvertisementController::class, 'setActive']);
    Route::post('/set-inactive', [AdvertisementController::class, 'setInActive']);
});