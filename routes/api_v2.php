<?php

use App\Http\Controllers\V2\AccountController;
use App\Http\Controllers\V2\CategoryController;
use App\Http\Controllers\V2\RecordController;
use App\Http\Controllers\V2\UserController;
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
Route::resource('accounts', AccountController::class)
    ->only(['index', 'update']);
