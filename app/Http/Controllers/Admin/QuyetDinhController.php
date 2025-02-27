<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuyetDinhCreateRequest;
use App\Http\Requests\QuyetDinhUpdateRequest;
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
        return Inertia::render('Admin/DanhMuc/QuyetDinh/QuyetDinhCreate');
    }

    public function store(QuyetDinhCreateRequest $request)
    {
        $request->validated();
        $fields = $request->all();

        if ($request->hasFile('path')) {
            $fields['path'] = Storage::disk('public')->put('QD', $request->file('path'));
        }

        $quyetDinh = QuyetDinh::create($fields);

        return to_route('quyet-dinh.create');
    }

    public function edit($id)
    {
        $data = QuyetDinh::find($id);
        return Inertia::render('Admin/DanhMuc/QuyetDinh/QuyetDinhUpdate', ['data' => $data]);
    }

    public function update(QuyetDinhUpdateRequest $request, $id)
    {
        $request->validated();
        $fields = $request->all();
        $row = QuyetDinh::find($id);

        if ($request->hasFile('path')) {
            Storage::disk('public')->delete($row->path);
            $fields['path'] = Storage::disk('public')->put('QD', $request->file('path'));
        }
        $row->update($fields);
        return to_route('quyet-dinh.update', ['id' => $id]);
    }
}
