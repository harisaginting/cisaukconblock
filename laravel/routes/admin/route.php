<?php

use App\Http\Controllers\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

// ================== 	BACKEND  ==============================
Route::controller(Dashboard::class)->group(function () {
    // Route::get('/orders/{id}', 'show');
    Route::get('/', 'index');
});