<?php

namespace Database\Seeders;

use App\Models\DonHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DonHang::unguard();
        $sqlPath = public_path('assets/sql/don_hangs.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
