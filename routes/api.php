<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/users', [UserController::class, 'store']);

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::apiResource('/products', ProductController::class);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/products/search/{name}', [ProductController::class, 'search']);
    Route::get('/users/search/{name}', [UserController::class, 'search']);
    Route::get('/users', [UserController::class, 'index']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});
