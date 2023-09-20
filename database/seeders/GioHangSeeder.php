<?php

namespace Database\Seeders;

use App\Models\GioHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GioHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GioHang::unguard();
        $sqlPath = public_path('assets/sql/gio_hangs.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
