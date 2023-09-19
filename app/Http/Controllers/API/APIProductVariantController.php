<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Http\Request;

class APIProductVariantController extends Controller
{
    //
    public function data(Request $request)
    {

        $data = ProductVariants::where('product_id', $request->id)
                                ->join('cau_hinhs', 'product_variants.cau_hinh_id', 'cau_hinhs.id')
                                ->join('mau_sacs', 'product_variants.mau_sac_id', 'mau_sacs.id')
                                ->select('product_variants.*', 'cau_hinhs.ten_cau_hinh', 'mau_sacs.ten_mau_sac')
                                ->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
