<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuyetDinhController;
use Illuminate\Support\Facades\Route;

Route::prefix('quan-tri')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::prefix('dashboard')->group(function () {
        Route::get('/cap-nhat', [DashboardController::class, 'edit'])->name('dashboard.edit');
    });

    Route::prefix('quyet-dinh')->group(function () {
        Route::get('/', [QuyetDinhController::class, 'index'])->name('quyet-dinh.index');
        Route::get('/them', [QuyetDinhController::class, 'create'])->name('quyet-dinh.create');
    });
});


