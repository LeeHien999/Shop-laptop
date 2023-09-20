<?php

namespace Database\Seeders;

use App\Models\DanhSachTaiKhoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhSachTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DanhSachTaiKhoan::unguard();
        $sqlPath = public_path('assets/sql/danh_sach_tai_khoans.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
