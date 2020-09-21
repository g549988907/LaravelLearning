<?php

namespace App\Http\Controllers;

use App\Exports\NormalExport;
use Illuminate\Http\Request;
use App\School;
use Maatwebsite\Excel\Facades\Excel;

class SchoolController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * 学校列表
     */
    public function index()
    {
        $schools = School::where('status', 1)
            ->limit(20)
            ->orderBy('id', 'desc')
            ->get(['school_code', 'name', 'address']);

        return view('school', ['schools' => $schools]);
    }

    public function exportSchools($num)
    {
        $schools = School::where('status', 1)
            ->limit($num)
            ->orderBy('id', 'desc')
            ->get(['school_code', 'name', 'address']);

        $data = empty($schools)? [] : $schools->toArray();

        array_unshift($data, [
            '学校编码', '学校名称', '地址'
        ]);

        return Excel::download(new NormalExport($data), '学校信息.xlsx');
    }
}
