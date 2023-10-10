<?php

use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Article;
use App\Http\Controllers\Admin\Setting;
use Illuminate\Support\Facades\Route;



Route::controller(Auth::class)->group(function () {
    // Route::get('/orders/{id}', 'show');
    Route::get('/login', 'login')->name('admin-login');
    Route::post('/login', 'loginProcess')->name('admin-login-process');
});
// ================== MUST LOGIN  ==============================
// Route::middleware(['admin.login'])->group(function () {
    Route::controller(Dashboard::class)->group(function () {
        // Route::get('/orders/{id}', 'show');
        Route::get('/', 'index')->name('admin');
    });
    
    Route::controller(Article::class)->group(function () {
        Route::get('/article', 'index')->name('admin-article');
        Route::get('/article/add', 'add')->name('admin-article-add');
        Route::middleware(['middleware' => 'harisa-auth-api'])->post('/article/add', 'addProcess')->name('admin-article-save');
    });
   
    Route::controller(Setting::class)->group(function () {
        Route::get('/setting', 'index')->name('admin-setting');
    });
// });
