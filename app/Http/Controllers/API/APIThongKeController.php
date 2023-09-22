<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class APIThongKeController extends Controller
{
    //
    public function topview(Request $request)
    {
        $xxx = Product::orderBy('luot_xem', 'DESC')
            ->limit(5)
            ->get();
        $arr_1  =   [];
        $arr_2  =   [];

        foreach ($xxx as $key => $v) {
            array_push($arr_1, $v->ten_san_pham);
            array_push($arr_2, $v->luot_xem);
        }

        return response()->json([
            'status'    => 1,
            'data'      => $arr_2,  // chứa lượt xem
            'labels'    => $arr_1,  // chứa tên sản phẩm
        ]);
    }
}
