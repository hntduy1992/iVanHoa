<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $x = 123;
    return Inertia::render('Index', [
        'x' => $x,
    ]);
});
Route::get('/tin-tuc', function () {
    return Inertia::render('TinTuc', []);
});
Route::get('/chuyen-muc', function () {
    return Inertia::render('ChuyenMuc', []);
});
include 'auth.php';
include 'admin.php';

