<?php

namespace Database\Seeders;

use App\Models\QuyenChucNang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuyenChucNangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuyenChucNang::unguard();
        $sqlPath = public_path('assets/sql/quyen_chuc_nangs.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
