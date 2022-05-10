<?php

use App\Http\Controllers\PageController;
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

Route::get('/{page:slug}', [PageController::class, 'index'])->name('page');
Route::get('/test/{page:slug}', function (\App\Models\Page $page) {
    $media = $page->getMedia("page-header");

    if ($media->hasAny(0))
    {
        $image = $media[0]->getFullUrl();
    }
    return $image;
});
