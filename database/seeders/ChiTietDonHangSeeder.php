<?php

namespace Database\Seeders;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietDonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChiTietDonHang::unguard();
        $sqlPath = public_path('assets/sql/chi_tiet_don_hangs.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
