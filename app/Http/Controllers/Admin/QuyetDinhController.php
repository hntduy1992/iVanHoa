<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuyetDinhRequest;
use App\Models\QuyetDinh;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class QuyetDinhController extends Controller
{
    public function index()
    {
        $data = DB::table("ql_quyet-dinh")->orderBy("nam", "desc")->paginate(2);
        return Inertia::render('Admin/DanhMuc/QuyetDinh/QuyetDinhIndex', ['data' => $data]);
    }

    public function create()
    {
        return Inertia::render('Admin/DanhMuc/QuyetDinh/QuyetDinhUpdate');
    }

    public function store(QuyetDinhRequest $request)
    {
        $request->validated();
        $fields = $request->all();

        if ($request->hasFile('path')) {
            $fields['path'] = Storage::disk('public')->put('QD', $request->file('path'));
        }

        $quyetDinh = QuyetDinh::create($fields);

        return to_route('quyet-dinh.create');
    }
}
