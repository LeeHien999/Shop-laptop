<?php

namespace Database\Seeders;

use App\Models\Quyen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quyen::unguard();
        $sqlPath = public_path('assets/sql/quyens.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
