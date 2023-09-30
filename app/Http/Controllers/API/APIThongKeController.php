<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThongKeRequest;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIThongKeController extends Controller
{
    //
    public function topview(ThongKeRequest $request)
    {
        $xxx = Product::orderBy('luot_xem', 'DESC')
            ->whereDate('products.created_at', '>=', $request->begin)
            ->whereDate('products.created_at', '<=', $request->end)
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

    public function verenue(Request $request)
    {
        $xxx = DonHang::where('trang_thai', 4)
        ->whereDate('don_hangs.created_at', '>=', $request->begin)
        ->whereDate('don_hangs.created_at', '<=', $request->end)
        ->get();

        $arr_1  =   [];
        $arr_2  =   [];

        foreach ($xxx as $key => $v) {
            array_push($arr_1, $v->created_at->format('d.m'));
            array_push($arr_2, $v->tong_tien);
        }

        return response()->json([
            'status'    => 1,
            'data'      => $arr_2,  //ngày
            'labels'    => $arr_1,  //tổng tiền
        ]);
    }

    public function topsale(ThongKeRequest $request)
    {
        $xxx = ChiTietDonHang::join('don_hangs', 'don_hangs.id', '=', 'chi_tiet_don_hangs.don_hang_id')
            ->join('product_variants', 'product_variants.id', '=', 'chi_tiet_don_hangs.san_pham_id')
            ->join('products', 'products.id', '=', 'product_variants.product_id')
            ->join('cau_hinhs', 'cau_hinhs.id', '=', 'product_variants.cau_hinh_id')
            ->where('don_hangs.trang_thai', 4)
            ->whereDate('chi_tiet_don_hangs.created_at', '>=', $request->begin)
            ->whereDate('chi_tiet_don_hangs.created_at', '<=', $request->end)
            ->select('chi_tiet_don_hangs.san_pham_id', 'products.ten_san_pham', 'cau_hinhs.ten_cau_hinh', DB::raw('SUM(chi_tiet_don_hangs.so_luong) as san_pham_count'))
            ->groupBy('chi_tiet_don_hangs.san_pham_id', 'products.ten_san_pham', 'cau_hinhs.ten_cau_hinh')
            ->orderBy('san_pham_count', 'desc')
            ->take(5)
            ->get();

        $arr_1  =   [];
        $arr_2  =   [];

        foreach ($xxx as $key => $v) {
            array_push($arr_1, $v->ten_san_pham . $v->ten_cau_hinh);
            array_push($arr_2, $v->san_pham_count);
        }

        return response()->json([
            'status'    => 1,
            'data'      => $arr_2,  // chứa số lượng
            'labels'    => $arr_1,  // chứa tên sản phẩm
        ]);
    }
}
