<?php

namespace Database\Seeders;

use App\Models\CauHinh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CauHinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CauHinh::unguard();
        $sqlPath = public_path('assets/sql/cau_hinhs.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
