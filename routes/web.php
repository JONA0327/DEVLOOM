<?php

use App\Http\Controllers\SuperAdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Superadmin panel — protected by EnsureSuperAdmin middleware
Route::middleware('superadmin')->group(function () {
    Route::get('/devloom_panel', [SuperAdminAuthController::class, 'dashboard'])
        ->name('superadmin.dashboard');
});

require __DIR__.'/auth.php';
