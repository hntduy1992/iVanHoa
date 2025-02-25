<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuyetDinhRequest;
use App\Models\QuyetDinh;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuyetDinhController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/DanhMuc/QuyetDinh/QuyetDinhIndex');
    }

//    public function create(QuyetDinhRequest $request): JsonResponse
//    {
//        $request->validated();
//        $newRow = QuyetDinh::create($request->all());
//        return response()->json([
//            'success' => true,
//            'data' => $newRow
//        ]);
//    }
}
