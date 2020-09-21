<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fashion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NormalExport;

class FashionController extends Controller
{
    /**
     * 导出商品列表
     */
    public function exportFashions()
    {
        $data = Fashion::all(['code', 'real_name']);
        $data = $data->toArray();

        array_unshift($data, [
            '产品编码', '产品名称'
        ]);

        return Excel::download(new NormalExport($data), '产品数据.xlsx');
    }
}
