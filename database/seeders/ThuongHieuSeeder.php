<?php

namespace Database\Seeders;

use App\Models\ThuongHieu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThuongHieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThuongHieu::unguard();
        $sqlPath = public_path('assets/sql/thuong_hieus.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
