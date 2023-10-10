<?php

use App\Http\Controllers\Admin\Auth;
use Illuminate\Support\Facades\Route;

Route::get('validate-token/{token}', [Auth::class, 'validateToken'])->name('api-validate-token');;
require __DIR__ . '/v1.php';
