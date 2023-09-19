<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;

class APITrangChuController extends Controller
{
    //
    // public function proDetail(Request $request)
    // {
    //     dd($request->all());
    //     $prod = Product::find($request->id);
    //     if($prod)
    //     {
    //         $pro_variant = ProductVariants::where('product_id', $prod->id)->get();
    //         return response()->json([
    //             'status' => 1,
    //             'product'=> $prod,
    //             'product_variants' => $pro_variant,
    //         ]);
    //     }
    //     else
    //         return redirect('/');
    // }

    public function loaddanhmuc(Request $request)
    {
        $data = DanhMuc::orderBy('ten_danh_muc', 'ASC')
                        ->get();
        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }

    public function loadthuonghieu(Request $request)
    {
        $data = ThuongHieu::orderBy('ten_thuong_hieu', 'ASC')
                        ->get();
        return response()->json([
            'status' => 1,
            'data'   => $data,
        ]);
    }

    public function danhMucProducts(Request $request)
    {

        $data = Product::where('danh_muc_id', $request->id)->paginate(8);
        return response()->json([
            'data' => $data,
            'status' => 1,
        ]);
    }

    public function thuongHieuProducts(Request $request)
    {

        $data = Product::where('thuong_hieu_id', $request->id)->paginate(8);
        return response()->json([
            'data' => $data,
            'status' => 1,
        ]);
    }

    public function sortProducts(Request $request)
    {
        $products = $request->data["data"];
        $sortedProducts = [];

        $filter = $request->select;
        switch ($filter) {
            case "PRICEDESC":
                $sortedProducts = collect($products)->sortBy('gia')->values()->all();
                break;
            case "PRICEASC":
                $sortedProducts = collect($products)->sortByDesc('gia')->values()->all();
                break;
            case "NAMEAZ":
                $sortedProducts = collect($products)->sortBy('ten_san_pham')->values()->all();
                break;
            case "NAMEZA":
                $sortedProducts = collect($products)->sortByDesc('ten_san_pham')->values()->all();
                break;
            case "DATENEW":
                $sortedProducts = collect($products)->sortBy('created_at')->values()->all();
                break;
            case "DATEOLD":
                $sortedProducts = collect($products)->sortByDesc('created_at')->values()->all();
                break;
            case "BESTSALE":
                $sortedProducts = collect($products)->sortByDesc('luot_xem')->values()->all();
                break;
            default:
                $sortedProducts = $products;
                break;
        }
        return response()->json([
            'data' => $sortedProducts,
        ]);
    }

    public function topview(Request $request)
    {
        $data = Product::orderBy('luot_xem', 'DESC')->limit(4)->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function allProduct(Request $request)
    {

        $data = Product::paginate(8);
        return response()->json([
            'data' => $data,
            'status' => 1,
        ]);
    }

    public function increaseProductV(Request $request)
    {
        $product = Product::find($request->id);
        $product->luot_xem += 1;
        $product->save();
        return response()->json([
            'status' => 1,
        ]);
    }
}
