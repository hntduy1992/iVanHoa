<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuyetDinhController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/DanhMuc/QuyetDinh/QuyetDinhIndex');
    }
}
