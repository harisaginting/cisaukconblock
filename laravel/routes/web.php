<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing page routes
Route::get('/', [Landing::class, 'index'])->name('landing');

// Article routes with route model binding
Route::get('/articles/{id}', [Landing::class, 'article'])->name('article');

// AJAX routes for dynamic content
Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::get('/articles', [Landing::class, 'getArticles'])->name('articles');
    Route::get('/search', [Landing::class, 'search'])->name('search');
});

// Coming soon page
Route::get('/coming-soon', [Landing::class, 'soon'])->name('coming-soon');