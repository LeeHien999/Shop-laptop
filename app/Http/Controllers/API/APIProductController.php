<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProdRequest;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIProductController extends Controller
{
    //
    public function store(CreateProdRequest $request)
    {

        //gán id chức năng cho route chức năng tương ứng rồi check sau
        $id_chuc_nang = 100;
        $user_login = Auth::guard('admin')->user();

        //check thằng tài khoản này được cấp quyền gì trước r sau đó kiểm tra chức năng được cho phép của quyền đó
        $check = QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();

        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }


        DB::beginTransaction();
        try {
            $data = $request->sanpham;
            // if (Product::where('ten_san_pham', $data["ten_san_pham"])->first()) {
            //     return response()->json([
            //         'status' => 0,
            //         'message' => 'sản phẩm đã tồn tại !',
            //     ]);
            // }        //đã có request nên không cần bắt ở đây nữa

            $sanpham = Product::create($data);

            if ($sanpham) {
                $options = $request->options;
                foreach ($options as $k => $v) {
                    ProductVariants::create([
                        'product_id' => $sanpham->id,
                        'cau_hinh_id' => $v["cau_hinh_id"],
                        'mau_sac_id'    => $v["mau_sac_id"],
                        'so_luong'      => $v["so_luong"],
                        'hinh_anh'      => $v["hinh_anh"],
                        'gia_dieu_chinh'=> $v['gia_dieu_chinh']
                    ]);
                }
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Thêm mới thành công',
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Thêm mới thất bại',
                ]);
        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }

    public function cauhinh (Request $request)
    {
        $data = ProductVariants::where('product_id', $request->product_id)
            ->where('mau_sac_id', $request->mau_sac_id)
            ->join('cau_hinhs', 'product_variants.cau_hinh_id', 'cau_hinhs.id')
            ->select('product_variants.*', 'product_variants.cau_hinh_id', 'cau_hinhs.ten_cau_hinh')
            ->get();

        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data,
            ]);
        } else
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra',
            ]);
    }

    public function status(Request $request)
    {

        //gán id chức năng cho route chức năng tương ứng rồi check sau
        $id_chuc_nang = 102;
        $user_login = Auth::guard('admin')->user();

        //check thằng tài khoản này được cấp quyền gì trước r sau đó kiểm tra chức năng được cho phép của quyền đó
        $check = QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();

        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $sanpham = Product::find($request->id);
            if ($sanpham) {
                $sanpham->tinh_trang = !$sanpham->tinh_trang;
                $sanpham->save();
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Cập nhật trạng thái thành công',
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Cập nhật trạng thái thất bại!!',
                ]);
        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }

    public function update(Request $request)
    {

        //gán id chức năng cho route chức năng tương ứng rồi check sau
        $id_chuc_nang = 105;
        $user_login = Auth::guard('admin')->user();

        //check thằng tài khoản này được cấp quyền gì trước r sau đó kiểm tra chức năng được cho phép của quyền đó
        $check = QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();

        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $prod = $request->product;
            $sanpham = Product::find($prod["id"]);
            if ($sanpham) {
                $sanpham->update($prod);
                ProductVariants::where('product_id', $sanpham->id)->delete();
                foreach ($request->options as $k => $v) {
                    ProductVariants::create([
                        'product_id' => $sanpham->id,
                        'cau_hinh_id' => $v["cau_hinh_id"],
                        'mau_sac_id'    => $v["mau_sac_id"],
                        'so_luong'      => $v["so_luong"],
                        'hinh_anh'      => $v["hinh_anh"],
                    ]);
                }
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Cập nhật thành công',
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Cập nhật thất bại!!',
                ]);
        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }

    public function destroy(Request $request)
    {

        //gán id chức năng cho route chức năng tương ứng rồi check sau
        $id_chuc_nang = 104;
        $user_login = Auth::guard('admin')->user();

        //check thằng tài khoản này được cấp quyền gì trước r sau đó kiểm tra chức năng được cho phép của quyền đó
        $check = QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();

        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $sanpham = Product::find($request->id);
            if ($sanpham) {
                ProductVariants::where('product_id', $sanpham->id)->delete();
                $sanpham->delete();

                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Xóa thành công',
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Xóa thất bại!!',
                ]);
        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }

    public function data(Request $request)
    {
        //gán id chức năng cho route chức năng tương ứng rồi check sau
        $id_chuc_nang = 101;
        $user_login = Auth::guard('admin')->user();

        //check thằng tài khoản này được cấp quyền gì trước r sau đó kiểm tra chức năng được cho phép của quyền đó
        $check = QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();

        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        $data = Product::join('danh_mucs', 'products.danh_muc_id', 'danh_mucs.id')
            ->join('thuong_hieus', 'products.thuong_hieu_id', 'thuong_hieus.id')
            ->select('products.*', 'thuong_hieus.ten_thuong_hieu', 'danh_mucs.ten_danh_muc')
            ->paginate(10);

        return response()->json([
            'data' => $data
        ]);
    }
}
