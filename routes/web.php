<?php

use App\Http\Controllers\PageController;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/termine", [\App\Http\Controllers\AppointmentController::class, 'show']);

Route::get('/{page:slug}', [PageController::class, 'index'])->name('page');

Route::post("/kontakt", [\App\Http\Controllers\contactController::class, 'sendMail']);




