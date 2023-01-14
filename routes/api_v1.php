<?php

use App\Http\Controllers\V1\CategoryController;
use App\Http\Controllers\V1\RecordController;
use App\Http\Controllers\V1\UserController;
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

Route::resource('users', UserController::class)
    ->only(['store']);
Route::resource('categories', CategoryController::class)
    ->only(['index', 'store']);
Route::resource('records', RecordController::class)
    ->only(['index', 'store']);
