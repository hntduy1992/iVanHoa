<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Dashboard/DashboardIndex');
    }

    public function edit(): \Inertia\Response
    {
        return Inertia::render('Admin/Dashboard/KetQuaChamDiemEdit');
    }

    public function test(): JsonResponse
    {
        return response()->json(['message'=>'Hello Axios']);
    }
}
