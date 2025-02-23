<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('quan-tri')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/cap-nhat', [DashboardController::class, 'edit'])->name('dashboard.edit');
        Route::get('/test', [DashboardController::class, 'test'])->name('dashboard.test');
    });
});
