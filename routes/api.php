<?php

use App\Http\Controllers\Admin\Api\QuyetDinhApiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuyetDinhController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::prefix('quyet-dinh')->group(function () {
        Route::get('/danh-sach', [QuyetDinhApiController::class, 'getAll'])->name('api.quyet-dinh.getAll');

    });

    Route::prefix('danh-muc')->group(function () {
        Route::get('/quyet-dinh', [QuyetDinhController::class, 'index'])->name('quyet-dinh.index');
        Route::post('/quyet-dinh/create', [QuyetDinhController::class, 'create'])->name('quyet-dinh.create');
    });
});


