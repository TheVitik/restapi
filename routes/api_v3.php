<?php

use App\Http\Controllers\V3\AccountController;
use App\Http\Controllers\V3\CategoryController;
use App\Http\Controllers\V3\RecordController;
use App\Http\Controllers\V3\AuthController;
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

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('categories', CategoryController::class)
        ->only(['index', 'store']);
    Route::resource('records', RecordController::class)
        ->only(['index', 'store']);
    Route::resource('accounts', AccountController::class)
        ->only(['index', 'update']);
});
