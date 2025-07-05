<?php

use App\Http\Controllers\Admin\Auth;
use Illuminate\Support\Facades\Route;

// Public API routes
Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/login', [Auth::class, 'loginProcess'])->name('login');
    Route::get('/validate-token/{token}', [Auth::class, 'validateToken'])->name('validate-token');
});

// Protected API routes
Route::middleware('harisa-auth-api')->prefix('v1')->name('api.v1.')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('/logout', [Auth::class, 'logout'])->name('logout');
        Route::post('/refresh', [Auth::class, 'refreshToken'])->name('refresh');
    });
    
    // Add more protected routes here
    // Route::apiResource('articles', ArticleController::class);
    // Route::apiResource('settings', SettingController::class);
});

// Include versioned routes
require __DIR__ . '/v1.php';
