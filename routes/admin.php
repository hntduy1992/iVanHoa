<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuyetDinhController;
use Illuminate\Support\Facades\Route;

Route::prefix('quan-tri')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/cap-nhat', [DashboardController::class, 'edit'])->name('dashboard.edit');
        Route::get('/test', [DashboardController::class, 'test'])->name('dashboard.test');
    });

    Route::prefix('danh-muc')->group(function () {
        Route::get('/quyet-dinh', [QuyetDinhController::class, 'index'])->name('quyet-dinh.index');
        Route::post('/quyet-dinh/create', [QuyetDinhController::class, 'create'])->name('quyet-dinh.create');
    });
});


