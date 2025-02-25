<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dang-nhap', function () {
    return Inertia::render('Auth/Login', []);
});
