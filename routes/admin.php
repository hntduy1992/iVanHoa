<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('quan-tri')->group(function () {
    Route::get('dashboard',function () {
        return Inertia::render('Admin/Dashboard/DashboardIndex');
    });
});
