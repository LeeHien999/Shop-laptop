<?php

namespace Database\Seeders;

use App\Models\ProductVariants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProductVariants::unguard();
        $sqlPath = public_path('assets/sql/product_variants.sql');
        DB::unprepared(file_get_contents($sqlPath));
    }
}
