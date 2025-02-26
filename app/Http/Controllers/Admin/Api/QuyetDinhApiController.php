<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\QuyetDinh;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuyetDinhApiController extends Controller
{
    public function getAll(): JsonResponse
    {
        return response()->json([
            'data' => QuyetDinh::all()->sortByDesc('nam', SORT_REGULAR),
        ]);
    }

    public function getById(int $id): JsonResponse
    {
        return response()->json([
            'data' => QuyetDinh::query()->findOrFail($id)
        ]);
    }
}
