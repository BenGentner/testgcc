<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/nav-items", [\App\Http\Controllers\NavController::class, 'show']);

Route::get("/posts/amount", [\App\Http\Controllers\WfBasicFunctionPackage\PostController::class, "amount"]);

Route::get("/", [\App\Http\Controllers\WfBasicFunctionPackage\PostController::class, 'getPosts']);
