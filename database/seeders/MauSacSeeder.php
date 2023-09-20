<?php

namespace Database\Seeders;

use App\Models\MauSac;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MauSacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MauSac::unguard();
        $sqlPath = public_path('assets/sql/mau_sacs.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
