<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Secret login URL — only superadmins know this path
Route::middleware('guest')->group(function () {
    Route::get('devloom_access_login_restringed', [AuthenticatedSessionController::class, 'create'])
        ->name('superadmin.login');

    Route::post('devloom_access_login_restringed', [AuthenticatedSessionController::class, 'store'])
        ->name('superadmin.login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('devloom_panel/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('superadmin.logout');
});
