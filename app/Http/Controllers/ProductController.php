<?php

namespace App\Http\Controllers;

use App\Models\CauHinh;
use App\Models\DanhMuc;
use App\Models\KichThuoc;
use App\Models\MauSac;
use App\Models\Product;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function addProduct()
    {
        $cauhinhs = CauHinh::orderBy('ten_cau_hinh', 'desc')->get();
        $mausacs = MauSac::all();
        $danhmucs = DanhMuc::all();
        $thuonghieus = ThuongHieu::all();
        return view('admin.page.san-pham.test', compact('cauhinhs', 'mausacs', 'danhmucs', 'thuonghieus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
